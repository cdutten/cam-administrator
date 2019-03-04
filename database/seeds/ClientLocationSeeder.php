<?php

use App\Location;
use App\Client;
use Illuminate\Database\Seeder;

class ClientLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::inRandomOrder()
            ->limit(25)
            ->each(function (Client $client) {
                $client->locations()->sync([$userId = Location::inRandomOrder()->first()->id]);
            });
    }
}
