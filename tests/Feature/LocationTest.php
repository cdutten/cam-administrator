<?php

namespace Tests\Feature;

use App\Location;
use Tests\TestCase;

class LocationTest extends TestCase
{
    public function testListAllTheLocations()
    {
        $response = $this->get('api/locations');
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['*' => ['id', 'name', 'address', 'latitude', 'longitude']]])
            ->assertJsonStructure([
                'current_page',
                'first_page_url',
                "from",
                "last_page",
                "last_page_url",
                "next_page_url",
                "path",
                "per_page",
                'prev_page_url',
                "to",
                "total",
            ]);
    }

    /**
     * Location show entity endpoint test
     *
     * @throws \Exception
     */
    public function testShowOneLocation()
    {
        $location = factory(Location::class)->create();
        $response = $this->get("api/locations/{$location->id}");
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'name', 'address', 'latitude', 'longitude']]);
    }

    /**
     * Location create entity endpoint test
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testCreateALocation()
    {
        $location = factory(Location::class)->make();
        $response = $this->post(
            'api/locations',
            [
                'name' => $location->name,
                'address' => $location->address,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude
            ]
        );
        $response->assertStatus(200);

        $this->assertDatabaseHas(
            with(new Location)->getTable(),
            [
                'name' => $location->name,
                'address' => $location->address,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude
            ]
        );
    }

    public function testUpdateLocationAttributes()
    {
        /** @var Location $location */
        $location = factory(Location::class)->create();
        $newAttributes = (factory(Location::class)->make())->getAttributes();
        $response = $this->patch("api/locations/{$location->id}", $newAttributes);
        $response->assertStatus(200);
        $this->assertDatabaseMissing(with(new Location)->getTable(), $location->getAttributes());
        $this->assertDatabaseHas(with(new Location)->getTable(), $newAttributes);
    }

    public function testDestroyOneLocation()
    {
        /** @var Location $location */
        $location = factory(Location::class)->create();
        $response = $this->delete("api/locations/{$location->id}");
        $response->assertStatus(200);

        $this->assertSoftDeleted(
            with(new Location)->getTable(),
            $location->getAttributes()
        );
    }
}
