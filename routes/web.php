<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/menu', function () {
    return view('pages.menu');
});
Route::get('/cookie', function () {
    return view('pages.legal.cookie');
});
Route::get('/privacy', function () {
    return view('pages.legal.privacy');
});
Route::get('/termini', function () {
    return view('pages.legal.termini');
});