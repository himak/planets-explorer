<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Planet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlanetsByTerrainController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $countOfPlanet = Planet::count();

        $countOfPlanetWithTerrain = Planet::where('terrain', 'LIKE', '%'.$request->terrain.'%')->count();

        $percentage = $countOfPlanetWithTerrain * 100 / $countOfPlanet;

        return response()->json([
            'searchTerrain' => $request->terrain,
            'countOfPlanet' => $countOfPlanet,
            'countOfPlanetWithTerrain' => $countOfPlanetWithTerrain,
            'percentageOfPlanet' => $percentage
        ]);
    }
}
