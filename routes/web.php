<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Models\Items;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/items', [ItemsController::class, 'index'])->name('items.list');
    Route::get('/items/new', [ItemsController::class, 'create'])->name('items.create');
    Route::get('/items/{id}', [ItemsController::class, 'show'])->name('items.show');
    Route::get('/items/{id}/edit', [ItemsController::class, 'edit'])->name('items.edit');
    Route::put('/items/{id}', [ItemsController::class, 'update'])->name('items.update');
    Route::delete('/items/{id}', [ItemsController::class, 'destroy'])->name('items.destroy');
    Route::post('/items', [ItemsController::class, 'store'])->name('items.store');

    Route::get('/view-data/{data}', function ($data) {
        $data = DB::table($data)->get(); // Cambia 'users' por el nombre de tu tabla
        return $data;
    });
});

require __DIR__.'/auth.php';
