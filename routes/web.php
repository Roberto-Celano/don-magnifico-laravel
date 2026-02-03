<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LunchMenuController;



Route::get('/', function () {
    return view('pages.home');
});
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/qrcode/menuqr', [MenuController::class, 'indexqr']);
Route::get('/pranzo', [LunchMenuController::class, 'index'])->name('pranzo');
Route::get('/menu-pranzo', [LunchMenuController::class, 'publicIndex'])->name('menu-pranzo');

Route::get('/cookie', function () {
    return view('pages.legal.cookie');
});
Route::get('/privacy', function () {
    return view('pages.legal.privacy');
});
Route::get('/termini', function () {
    return view('pages.legal.termini');
});

// Autenticazione
Route::get('/admin-login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin-login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Admin - Protetto da autenticazione
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // Password
    Route::put('/admin/password', [AdminController::class, 'updatePassword'])->name('admin.password.update');
    
    // Categorie
    Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::put('/admin/categories/{category}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');
    
    // Piatti
    Route::post('/admin/items', [AdminController::class, 'storeItem'])->name('admin.items.store');
    Route::put('/admin/items/{item}', [AdminController::class, 'updateItem'])->name('admin.items.update');
    Route::delete('/admin/items/{item}', [AdminController::class, 'destroyItem'])->name('admin.items.destroy');
    
    // Menu Pranzo
    Route::post('/admin/lunch-menus', [AdminController::class, 'storeLunchMenu'])->name('admin.lunch-menus.store');
    Route::put('/admin/lunch-menus/{lunchMenu}', [AdminController::class, 'updateLunchMenu'])->name('admin.lunch-menus.update');
    Route::delete('/admin/lunch-menus/{lunchMenu}', [AdminController::class, 'destroyLunchMenu'])->name('admin.lunch-menus.destroy');
    
    // B&B Partner
    Route::post('/admin/beb-partners', [AdminController::class, 'storeBebPartner'])->name('admin.beb-partners.store');
    Route::put('/admin/beb-partners/{bebPartner}', [AdminController::class, 'updateBebPartner'])->name('admin.beb-partners.update');
    Route::delete('/admin/beb-partners/{bebPartner}', [AdminController::class, 'destroyBebPartner'])->name('admin.beb-partners.destroy');
});

// Pagine errore
Route::group( ['prefix'], function () {
    Route::get('/403', function () {
        return view('errors.403');
    });
    Route::get('/404', function () {
        return view('errors.404');
    });
    Route::get('/419', function () {
        return view('errors.419');
    });
    Route::get('/500', function () {
        return view('errors.500');
    });
});