<?php

use App\Location;
use Illuminate\Database\Seeder;

class CamerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Camera::class, 25)->create(['location_id' => $this->getRandomLocationId()]);
        factory(App\Camera::class, 15)->create(['location_id' => $this->getRandomLocationId()]);
        factory(App\Camera::class, 25)->create(['location_id' => $this->getRandomLocationId()]);
    }

    /**
     * Get a random location id from database
     *
     * @return mixed
     */
    private function getRandomLocationId(): int
    {
        $location = Location::inRandomOrder()->first();
        return $location->id;
    }
}
