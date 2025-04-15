<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     */
    public function index(Request $request)
    {
        $query = Car::query();
        
        // Filter by car type
        if ($request->filled('car_type') && $request->car_type != 'all') {
            $query->where('car_type', $request->car_type);
        }
        
        // Filter by fuel type
        if ($request->filled('fuel_type') && $request->fuel_type != 'all') {
            $query->where('fuel_type', $request->fuel_type);
        }
        
        // Filter by price range
        if ($request->filled('min_price') && is_numeric($request->min_price)) {
            $query->where('price_per_day', '>=', (float) $request->min_price);
        }
        if ($request->filled('max_price') && is_numeric($request->max_price)) {
            $query->where('price_per_day', '<=', (float) $request->max_price);
        }
        
        // Only show available cars by default
        if (!$request->boolean('show_all')) {
            $query->where('available', true);
        }
        
        $cars = $query->paginate(12);
        
        return view('cars.index', [
            'cars' => $cars,
            'car_types' => Car::distinct()->pluck('car_type'),
            'fuel_types' => Car::distinct()->pluck('fuel_type'),
        ]);
    }

    /**
     * Display the specified car.
     */
    public function show(Car $car)
    {
        return view('cars.show', [
            'car' => $car,
            'similar_cars' => Car::where('car_type', $car->car_type)
                ->where('id', '!=', $car->id)
                ->where('available', true)
                ->take(3)
                ->get()
        ]);
    }
}
