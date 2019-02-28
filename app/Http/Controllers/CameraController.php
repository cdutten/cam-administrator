<?php

namespace App\Http\Controllers;

use App\Camera;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Camera::paginate(15)->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function store(Request $request): void
    {
        $camera = new Camera(['name' => $request->name, 'location_id' => $request->location_id,]);
        $camera->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Camera $camera
     * @return \Illuminate\Http\Response
     */
    public function show(Camera $camera)
    {
        return response([$camera->toArray()], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Camera $camera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camera $camera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Camera $camera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camera $camera)
    {
        //
    }
}
