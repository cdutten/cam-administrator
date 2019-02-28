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
    public function testShowAllTheCameras()
    {
        $response = $this->get('api/cameras');
        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => ['*' => ['id', 'name',]]]);
    }

    public function testCreateACamera()
    {
        $response = $this->post('api/cameras', ['name' => 'azucar', 'location_id' => 1]);
        $response->assertStatus(200);

    }

    public function testShowOneCameraById()
    {
        $response = $this->get('api/cameras/5');
        $response->assertStatus(200);
    }
}
