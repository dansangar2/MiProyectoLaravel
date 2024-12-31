<?php

use App\Http\Controllers\ProfileController;
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

    Route::get('/items', function () {
        return view('items.items_list');
    })->name('items.list');
    
    Route::get('/items/{id}', function ($id) {
        return view('items.item_view');
    });

    Route::get('/item/new', function () {
        return view('items.item_new');
    });

    Route::post('/items', function () {
        $name = request('name');
        $description = request('description');
        $year = request('year');
        $exists = true;
        Items::create([
            'name' => $name,
            'description' => $description,
            'year' => $year,
            'exists'=>$exists,
            'user_id' => auth()->id(),
        ]);

        session()->flash('status', 'Created!');

        return to_route('items.list');
    });

    Route::get('/view-data/{data}', function ($data) {
        $data = DB::table($data)->get(); // Cambia 'users' por el nombre de tu tabla
        return $data;
    });
});

require __DIR__.'/auth.php';
