<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/legal', 'legal');

// Wallaby lived at kimiyu.ch until October 2026, and old emails still link to its pages.
foreach (['login', 'register', 'forgot-password', 'reset-password', 'verify-email', 'expenses', 'profile'] as $path) {
    Route::get("/{$path}/{rest?}", fn (Request $request) => redirect()->away('https://wallaby.kimiyu.ch'.$request->getRequestUri(), 301))
        ->where('rest', '.*');
}
