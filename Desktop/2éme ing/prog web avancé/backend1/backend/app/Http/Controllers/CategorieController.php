<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            $categories= Categorie::all();
            return response()->json($categories);
        } catch (\Exception $e) {
            //throw $th;
            return response()-> json("categories non disponible");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $categorie = new Categorie([
                'nomcategorie' => $request->input('nomcategorie'),
                'imagecategorie' => $request->input('imagecategorie')
                ]);
                $categorie->save();
                return response()->json($categorie);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
            // return response()-> json("impossible ajouter une categorie");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try {
            //code...
            $categorie = Categorie::findOrFail($id);
            return response()->json($categorie);
        } catch (\Exception $e) {
            //throw $th;
            return response()-> json("impossible de trouver cette categorie !! innexistante");
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            //code...
            $categorie = Categorie::find($id);
            $categorie->update($request->all());
            return response()->json('Catégorie MAJ !');
        } catch (\Exception $e) {
            //throw $th;
            return response()-> json("impossible de modifier cette categorie");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $categorie = Categorie::find($id);
            $categorie->delete();
            return response()->json('Catégorie supprimée !');
        } catch (\Exception $e) {
            //throw $th;
            //return response()-> json("impossible de supprimer cette categorie");
            return response()->json(['error' => $e->getMessage()], $e->getCode());

    }
    }
}
