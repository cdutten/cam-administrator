<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_users', function (Blueprint $table) {
            //Attributes
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('user_id');

            //Primary Key
            $table->primary(['client_id', 'user_id']);

            //Relations
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_users');
    }
}
