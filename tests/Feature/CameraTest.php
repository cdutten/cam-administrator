<?php

namespace Tests\Feature;

use App\Camera;
use Tests\TestCase;

class CameraTest extends TestCase
{
    /**
     * Camera list all cameras entity endpoint test
     *
     * @return void
     */
    public function testListAllTheCameras()
    {
        $response = $this->get('api/cameras');
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['*' => ['id', 'name',]]]);
    }

    /**
     * Camera create entity endpoint test
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testCreateACamera()
    {
        $camera = factory(Camera::class)->make(['location_id' => \CamerasTableSeeder::getRandomLocationId()]);
        $response = $this->post('api/cameras', ['name' => $camera->name, 'location_id' => $camera->location_id]);
        $response->assertStatus(200);

        $this->assertDatabaseHas(
            with(new Camera)->getTable(),
            ['name' => $camera->name, 'location_id' => $camera->location_id]
        );
    }

    /**
     * Camera show entity endpoint test
     *
     * @throws \Exception
     */
    public function testShowOneCameraById()
    {
        $camera = factory(Camera::class)->create(['location_id' => \CamerasTableSeeder::getRandomLocationId()]);
        $response = $this->get("api/cameras/{$camera->id}");
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ["name", "location_id"]]);
    }

    /**
     * Camera show entity endpoint test
     *
     * @throws \Exception
     */
    public function testDestroyOneCameraById()
    {
        $camera = factory(Camera::class)->create(['location_id' => \CamerasTableSeeder::getRandomLocationId()]);
        $response = $this->delete("api/cameras/{$camera->id}");
        $response->assertStatus(200);

        $this->assertSoftDeleted(
            with(new Camera)->getTable(),
            [
                'id' => $camera->id,
                'name' => $camera->name,
                'location_id' => $camera->location_id
             ]
        );
    }
}
