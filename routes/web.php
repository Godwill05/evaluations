<?php

use App\Http\Controllers\Blogcontroller;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::get('/', function () {
    return view('/blog/index');
});
Route::fallback(function () {
    return response()->view('errors.pagenotfound', [], 404);
});

Route::prefix('blog')->name('blog')->controller(Blogcontroller::class)->group(function(){
    Route::get('/addemploye', 'addemploye')->name('addemploye');
    //renvoie la page d'ajout
    Route::get('/addemploye', 'findService')->name('addemploye');
    Route::get('/addservice','addservice')->name('addservice');
    //ajouter
    Route::post('/addemploye', 'addemployetodatabase')->name('fonctionfaisantlajout');
    Route::post('/addservice', 'addservicetodatabase')->name('fonctionfaisantlajout');
    //liste
    Route::get('/employelist', 'employelist')->name('listedesemploye');
    Route::get('/servicelist', 'findServices')->name('listdesservice');
    //supression
    Route::get('/suppemploye/{id}','suppemploye')->name('suppresiondemployer');
    Route::get('/blogsuppresionservice/{id}', 'blogsuppresionservice')->name('blogsuppresionservice');
    //modification
    Route::get('/modemploye/{id}/{idemploye}', 'modemploye')->name('modifieremployer');
    Route::post('/modemploye/{id}/{idemploye}', 'modemployeupdate')->name('modifieremployer');
    Route::get('modservice/{id}', 'modservice')->name('modierservice');
    Route::post('modservice/{id}', 'modserviceupdate')->name('modifierleservice');
});
