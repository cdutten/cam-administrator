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
        Schema::create('clients_locations', function (Blueprint $table) {
            //Attributes
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('location_id');

            //Primary Key
            $table->primary(['client_id', 'location_id']);

            //Relations
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
