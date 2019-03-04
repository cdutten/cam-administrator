<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_location', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('location_id');

            $table->primary(['client_id', 'location_id']);

            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_locations');
    }
}
