<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CameraTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('api/cameras');

        //TODO: harcoded
        $response->assertStatus(200);
        //TODO: Algo a ver es si queremos tener este data en los jsons...
        // Aunque en ciertos casos sirva y puede ser mas dinamico es un poco feo
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ]
            ]
        ]);
    }
}
