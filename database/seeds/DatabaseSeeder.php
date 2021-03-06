<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(CamerasTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ClientLocationSeeder::class);
        $this->call(ClientUserSeeder::class);
    }
}
