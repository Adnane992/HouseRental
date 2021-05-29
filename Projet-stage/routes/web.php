<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MaisonController;

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

Route::get('/', [MaisonController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



//ESPACE LOCATAIRE
Route::get('/locataire', function () {
    return view('EspaceLocataire.locataire');
})->middleware(['auth']);




//ESPACE PROPRIETAIRE
Route::get('proprietaire', [ProprietaireController::class, 'index'])->middleware(['auth']); 
Route::get('/logout',[ProprietaireController::class,'logout'])->middleware(['auth']);
Route::get('ajouter', [ImageController::class, 'create'])->middleware(['auth'])->name('ajouter');
Route::get('modifier', [ImageController::class, 'create'])->middleware(['auth'])->name('modifier'); 
Route::get('supprimer', [ImageController::class, 'create'])->middleware(['auth'])->name('supprimer'); 
Route::get('details', [ImageController::class, 'create'])->middleware(['auth'])->name('details');  
Route::post('store', [ImageController::class, 'store'])->middleware(['auth'])->name('store');
Route::delete('/delete/{id_maison}',[MaisonController::class,'deleteMaison'])->middleware(['auth'])->name('delete');



require __DIR__.'/auth.php';
