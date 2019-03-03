<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Client::paginate(15));
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     *
     * @return Response
     */
    public function show(Client $client): Response
    {
        return response(['data' => $client->toArray()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request): void
    {
        $client = new Client($request->all());
        $client->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Client $client
     */
    public function update(Request $request, Client $client): void
    {
        $client->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     *
     * @throws \Exception
     */
    public function destroy(Client $client): void
    {
        $client->delete();
    }
}
