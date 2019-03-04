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
    public function testListAllCameras()
    {
        $response = $this->get('api/cameras');
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['*' => ['id', 'name',]]])
            ->assertJsonStructure([
                'current_page',
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ]);
    }

    /**
     * Camera show entity endpoint test
     *
     * @throws \Exception
     */
    public function testShowOneCamera()
    {
        $camera = factory(Camera::class)->create(['location_id' => \CamerasTableSeeder::getRandomLocationId()]);
        $response = $this->get("api/cameras/{$camera->id}");
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ["id", "name", "location_id"]]);
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
     * Camera update entity endpoint test
     *
     * @throws \Exception
     */
    public function testUpdateCameraAttributes()
    {
        /** @var Camera $camera */
        $camera = factory(Camera::class)->create(['location_id' => \CamerasTableSeeder::getRandomLocationId()]);
        $newAttributes = factory(Camera::class)->make([
            'location_id' => \CamerasTableSeeder::getRandomLocationId()
        ])->getAttributes();
        $response = $this->patch("api/cameras/{$camera->id}", $newAttributes);
        $response->assertStatus(200);
        $this->assertDatabaseMissing(with(new Camera)->getTable(), $camera->getAttributes());
        $this->assertDatabaseHas(with(new Camera)->getTable(), array_merge(['id' => $camera->id], $newAttributes));
    }

    /**
     * Camera show entity endpoint test
     *
     * @throws \Exception
     */
    public function testDestroyOneCamera()
    {
        /** @var Camera $camera */
        $camera = factory(Camera::class)->create(['location_id' => \CamerasTableSeeder::getRandomLocationId()]);
        $response = $this->delete("api/cameras/{$camera->id}");
        $response->assertStatus(200);
        $this->assertSoftDeleted(with(new Camera)->getTable(), $camera->getAttributes());
    }
}
