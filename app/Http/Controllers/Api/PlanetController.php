<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanetResource;
use App\Models\Planet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PlanetResource::collection(
            Planet::query()
                ->select('name')
                ->where('diameter', '!=','unknown')
                ->orderByRaw('ABS(diameter) DESC')
                ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get list of names of top largest planets
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function top(Request $request): JsonResponse
    {
        return Planet::where('population', '!=', NULL)->orderBy('population', 'desc')->limit($request->number)->get(['name','population']);
    }

    /**
     * Get count planets with distribution of the specific terrain
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function terrain(Request $request): JsonResponse
    {
        $countOfPlanet = Planet::count();

        $countOfPlanetWithTerrain = Planet::where('terrain', 'LIKE', '%' . $request->terrain . '%')->count();

        $percentage = $countOfPlanetWithTerrain * 100 / $countOfPlanet;

        return response()->json([
            'searchTerrain' => $request->terrain,
            'countOfPlanet' => $countOfPlanet,
            'countOfPlanetWithTerrain' => $countOfPlanetWithTerrain,
            'percentageOfPlanet' => $percentage

        ]);
    }
}
