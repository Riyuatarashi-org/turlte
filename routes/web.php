<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View as FacadeView;

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

Route::get('/', function () {
    return FacadeView::make('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return FacadeView::make('dashboard');
    })->name('dashboard');
});
