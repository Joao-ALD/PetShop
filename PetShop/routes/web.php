<?php

use App\Http\Controllers\BreedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\SpecieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//? Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//? Rotas para Owners (Tutores)
Route::get('/tutores', [OwnerController::class, 'index'])->name('owners.index');
Route::get('/tutores/create', [OwnerController::class, 'create'])->name('owners.create');
Route::post('/tutores', [OwnerController::class, 'store'])->name('owners.store');
//* editar/excluir
Route::get('/tutores/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
Route::put('/tutores/{owner}', [OwnerController::class, 'update'])->name('owners.update');
Route::delete('/tutores/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy');

//? Rotas para Species (Espécies)
Route::get('/especies', [SpecieController::class, 'index'])->name('species.index');
Route::get('/especies/create', [SpecieController::class, 'create'])->name('species.create');
Route::post('/especies', [SpecieController::class, 'store'])->name('species.store');
// * editar/excluir
Route::get('/especies/{specie}/edit', [SpecieController::class,'edit'])->name('species.edit');
Route::put('/especies/{specie}', [SpecieController::class,'update'])->name('species.update');
Route::delete('/especies/{specie}', [SpecieController::class,'destroy'])->name('species.destroy');

//? Rotas para Breeds (Raças)
Route::get('/racas', [BreedController::class, 'index'])->name('breeds.index');
Route::get('/racas/create', [BreedController::class, 'create'])->name('breeds.create');
Route::post('/racas', [BreedController::class, 'store'])->name('breeds.store');
// * editar/excluir
Route::get('/racas/{breed}/edit', [BreedController::class,'edit'])->name('breeds.edit');
Route::put('/racas/{breed}', [BreedController::class,'update'])->name('breeds.update');
Route::delete('/racas/{breed}', [BreedController::class,'destroy'])->name('breeds.destroy');

//? Rotas para Pets
Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');
Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
// * editar/excluir
Route::get('/pets/{pet}/edit', [PetController::class,'edit'])->name('pets.edit');
Route::put('/pets/{pet}', [PetController::class,'update'])->name('pets.update');
Route::delete('/pets/{pet}', [PetController::class,'destroy'])->name('pets.destroy');