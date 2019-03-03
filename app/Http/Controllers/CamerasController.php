<?php

namespace App\Http\Controllers;

use App\Camera;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CamerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Camera::paginate(15));
    }

    /**
     * Display the specified resource.
     *
     * @param  Camera $camera
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Camera $camera)
    {
        return response(['data' => $camera->toArray()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function store(Request $request): void
    {
        $camera = new Camera($request->all());
        $camera->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Camera $camera
     */
    public function update(Request $request, Camera $camera)
    {
        $camera->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Camera $camera
     *
     *
     * @throws \Exception
     */
    public function destroy(Camera $camera)
    {
        $camera->delete();
    }
}
