<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeControleur;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/ajouterEmploye', function(){
    return view('vues/formEmployeAjouter');
});
Route::post('/postEmploye', [EmployeControleur::class, 'postAjouterEmploye']);

Route::get('/listerEmploye', [EmployeControleur::class,'listerEmployes']);

Route::get('/modifierEmploye/{id}', [EmployeControleur::class, 'modifier']);

Route::post('/postmodifierEmploye/{id}',
    array(
        'uses'=> 'App\Http\Controllers\EmployeControleur@postmodificationEmploye',
        'as'=> 'postmodifierEmploye',
    )

);
Route::get('/rechercherEmploye', [EmployeControleur::class,'rechercherEmploye']);

Route::post('/unEmploye',     array(
        'uses'=> 'App\Http\Controllers\EmployeControleur@afficherUnEmploye',
        'as'=> 'unEmploye',
    )

);

