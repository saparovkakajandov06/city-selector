<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\PageController;
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

// Главная страница
Route::get('/', [CityController::class, 'index'])->name('index');

// Маршрут для выбора города
Route::get('/{slug}', [CityController::class, 'selectCity'])->name('selectCity');

// Страницы "О нас" и "Новости"
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/news', [PageController::class, 'news'])->name('news');
