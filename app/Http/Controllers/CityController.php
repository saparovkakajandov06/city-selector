<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::all();
        $currentCity = session('city', 'default');

        return view('index', compact('cities', 'currentCity'));
    }

    public function selectCity($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail(); // Находим город по slug
        session(['city' => $city->name]); // Сохраняем город в сессии

        return redirect()->route('index'); // Редирект на главную страницу
    }
}
