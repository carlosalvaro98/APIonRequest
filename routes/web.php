<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\MenuItemController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MenuItemController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/menu-operations', function () {
    return view('menu_item.menu_operations');
})->middleware(['auth', 'verified'])->name('menu_operations');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //CRUD USERPROFILE
    Route::get('/user_profiles', [UserProfileController::class, 'index'])->name('user_profiles.index');
    Route::get('/user_profiles/{id}', [UserProfileController::class, 'show'])->name('user_profiles.show');
    Route::put('/user_profiles/{id}', [UserProfileController::class, 'update'])->name('user_profiles.update');
    Route::delete('/user_profiles/{id}', [UserProfileController::class, 'destroy'])->name('user_profiles.destroy');

    //CRUD MENUITEM
    Route::resource('menu-items', MenuItemController::class);
    Route::get('/menu-items', [MenuItemController::class, 'index'])->name('menu-items.index');
    Route::get('/menu-items/create', [MenuItemController::class, 'create'])->name('menu-items.create');
    Route::post('/menu-items', [MenuItemController::class, 'store'])->name('menu-items.store');
    Route::get('/menu-items/{menuItem}', [MenuItemController::class, 'show'])->name('menu-items.show');
    Route::get('/menu-items/{menuItem}/edit', [MenuItemController::class, 'edit'])->name('menu-items.edit');
    Route::put('/menu-items/{menuItem}', [MenuItemController::class, 'update'])->name('menu-items.update');
    Route::delete('/menu-items/{menuItem}', [MenuItemController::class, 'destroy'])->name('menu-items.destroy');
});

require __DIR__.'/auth.php';
