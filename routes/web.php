<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/navegar', [GameController::class, 'index'])->name('games.index');
Route::get('/single-game', [GameController::class, 'show'])->name('games.show');
// Route::get('/', [GameController::class, 'filter'])->name('games.filter');


Route::middleware('auth')->group(function () {
    ////Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    ////Wishlist
    Route::get('/wishlist', [GameController::class, 'showFavorite'])->name('favorites');
    Route::post('/add-favorite', [GameController::class, 'store'])->name('favorite.create');
    Route::delete('/wishlist-destroy', [GameController::class, 'destroyFavorite'])->name('favorite.destroy');
    Route::resource('favorite', FavoriteController::class);
    ////ShoppingCart
    Route::get('/shopping-cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/add-ao-cart', [CartController::class, 'addToCart'])->name('cart.create');
    Route::delete('/remove-fromCart', [CartController::class, 'removeFromCart'])->name('cart.destroy');
    Route::post('/status-cart', [CartController::class, 'statusCart'])->name('cart.status');

});

require __DIR__.'/auth.php';

// Route::get('/wishlist', function () {
//     return Inertia::render('Wishlist');
// })->middleware(['auth', 'verified'])->name('Wishlist');
