<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanetRequest;
use App\Http\Requests\UpdatePlanetRequest;
use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Added filter order by: diameter, rotation_period or gravity
        if ($request->has('filter')) {

            $planets = Planet::orderBy($request->get('filter'))->paginate();

            return view('planets')->with(['planets' => $planets]);
        }

        $planets = Planet::latest()->paginate();

        return view('planets')->with(['planets' => $planets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function show(Planet $planet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function edit(Planet $planet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanetRequest  $request
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanetRequest $request, Planet $planet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planet $planet)
    {
        //
    }
}
