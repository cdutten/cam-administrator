<?php

use App\Location;
use Illuminate\Database\Seeder;

class CamerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * @throws Exception
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
     *
     * @throws \Exception
     */
    public static function getRandomLocationId(): int
    {
        $location = Location::inRandomOrder()->first();
        if (empty($location)) {
            throw new \Exception('I can\'t get a Location from database');
        }

        return $location->id;
    }
}
