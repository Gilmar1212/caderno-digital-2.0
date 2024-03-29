<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cadastroAnotacoes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/", [\App\Http\Controllers\indexController::class,"index"])->name("index");
Route::prefix("/login")->group(function(){
    Route::get("/user-area", [\App\Http\Controllers\loginController::class,"login"])->name("login.user-area");    
    Route::post("/user-area", [\App\Http\Controllers\loginController::class,"autenticaLogin"])->name("login.user-area");    
});
Route::get("/cadastro-usuario", [\App\Http\Controllers\cadastroUsuarioController::class,"cadastro"])->name("cadastro.cadastrar");
Route::post("/cadastro-usuario", [\App\Http\Controllers\cadastroUsuarioController::class,"store"]);

Route::get("/cadastro-anotacoes",[\App\Http\Controllers\cadastroAnotacoes::class,"cadastroAnotacoes"])->name("cadastro.anotacoes");
Route::post("/cadastro-anotacoes",[\App\Http\Controllers\cadastroAnotacoes::class,"store"]);

Route::get("/cadastro-materia",[\App\Http\Controllers\cadastroMateriaController::class,"cadastroMateria"])->name("cadastro.materia");
Route::post("/cadastro-materia",[\App\Http\Controllers\cadastroMateriaController::class,"store"]);
Route::get("/deleta-anotacoes",[\App\Http\Controllers\deleteAnotacoes::class,"deleteAnotacoes"])->name("delete.deleteAnotacoes");
Route::delete("/deleta-anotacoes",[\App\Http\Controllers\deleteAnotacoes::class,"destroy"]);