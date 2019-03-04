<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Location::paginate(15));
    }

    /**
     * Display the specified resource.
     *
     * @param  Location $location
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return response(['data' => $location->toArray()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function store(Request $request): void
    {
        $location = new Location($request->all());
        $location->save();
    }

    /**
     * @param Location $location
     */
    public function update(Request $request, Location $location): void
    {
        $location->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Location $location
     *
     * @throws \Exception
     */
    public function destroy(Location $location): void
    {
        $location->delete();
    }
}
