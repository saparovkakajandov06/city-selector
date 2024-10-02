<?php

namespace App\Http\Middleware;

use App\Models\City;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CitySelector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $slug = $request->segment(1);
        $city = City::where('slug', $slug)->first();

        if ($city) {
            session(['city' => $city->name]);
        } elseif (!session('city')) {
            return redirect('/moscow');  // Установите город по умолчанию
        }

        return $next($request);
    }

}
