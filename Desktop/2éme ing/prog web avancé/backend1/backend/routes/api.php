<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Http\Controllers\ArticleController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/categories", [CategorieController::class, "index"]);
Route::post("/categories", [CategorieController::class, "store"]);
Route::get("/categories/{id}", [CategorieController::class, "show"]);
Route::delete("/categories/{id}", [CategorieController::class, "destroy"]);
Route::put("/categories/{id}", [CategorieController::class, "update"]);

// cette fonction remplace les routes ci dessus => permet de les generer tte seule
/*route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
});

/* Les routes de sous categories*/

route::middleware('api')->group(function () {
    Route::resource('scategories', ScategorieController::class);
});
//Une route supplémentaire
Route::get("/scategoriesByCat/{idcat}", [ScategorieController::class, "showSCategorieByCAT"]);


/* Les routes de article*/

route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class);
});

//Une route supplémentaire
Route::get('/listarticles/{idscat}', [ArticleController::class, 'showArticlesBySCAT']);
