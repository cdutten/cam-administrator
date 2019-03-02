<?php

use App\Client;
use App\User;
use Illuminate\Database\Seeder;

class ClientUserSeeder extends Seeder
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
                $client->users()->sync([$userId = User::inRandomOrder()->first()->id]);
            });
    }
}
