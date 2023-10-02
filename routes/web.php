<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


// Route::get('/', function () {
//     return Inertia::render("Games/IndexGames");

//     // return Inertia::render('Welcome', [
//     //     'canLogin' => Route::has('login'),
//     //     'canRegister' => Route::has('register'),
//     //     'laravelVersion' => Application::VERSION,
//     //     'phpVersion' => PHP_VERSION,
//     // ]);
// });
Route::get('/', [GameController::class, 'index'])->name('games.index');
Route::get('/SingleGame', [GameController::class, 'show'])->name('games.show');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/wishlist', function () {
//     return Inertia::render('Wishlist');
// })->middleware(['auth', 'verified'])->name('Wishlist');

Route::middleware('auth')->group(function () {
    ////Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    ////Wishlist
    Route::get('/Wishlist', [GameController::class, 'showFavorite'])->name('favorites');
    Route::post('/addFavorite', [GameController::class, 'store'])->name('favorite.create');
    Route::delete('/WishlistDestroy', [GameController::class, 'destroyFavorite'])->name('favorite.destroy');
    ////ShoppingCart
    Route::get('/shoppingCart', [GameController::class, 'showCart'])->name('cart.show');
    Route::get('/addToCart', [GameController::class, 'addToCart'])->name('cart.create');
    Route::get('/removeFromCart', [GameController::class, 'removeFromCart'])->name('cart.destroy');
    Route::post('/statusCart', [GameController::class, 'statusCart'])->name('cart.status');

});

require __DIR__.'/auth.php';
