<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Метод для страницы "О нас"
    public function about()
    {
        $currentCity = session('city', 'Не выбран');
        return view('about', compact('currentCity'));
    }

    // Метод для страницы "Новости"
    public function news()
    {
        $currentCity = session('city', 'Не выбран');
        return view('news', compact('currentCity'));
    }
}
