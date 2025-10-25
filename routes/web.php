<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index'); // list all names
Route::get('/new-name', [HomeController::class, 'create'])->name('name.create'); //create new names
Route::post('/names', [HomeController::class, 'store'])->name('name.store'); // save names to db

Route::post('/names/{name}', [HomeController::class, 'show'])->name('name.show'); // show single name
Route::get('/names/{name}/edit', [HomeController::class, 'edit'])->name('name.edit'); // show the edit page

Route::put('/names/{name}', [HomeController::class, 'update'])->name('name.update'); // update the name and save
Route::delete('/names/{name}', [HomeController::class, 'destroy'])->name('name.destroy'); // delete from the db
