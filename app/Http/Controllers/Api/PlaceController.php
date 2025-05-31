<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Получить список всех мест для отдыха.
     * GET /api/places
     */
    public function index()
    {
        $places = Place::all();
        return response()->json($places, 200);
    }

    /**
     * Добавить новое место для отдыха.
     * POST /api/places
     * 
     * Параметры: 
     * - name (уникальное название)
     * - latitude (широта)
     * - longitude (долгота)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|unique:places,name',
            'latitude'  => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $place = Place::create($validated);

        return response()->json($place, 201);
    }
}
