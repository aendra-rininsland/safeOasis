<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('fulfilled');
            $table->string('location_plaintext');
            $table->string('contact_number');
            $table->integer('num_women');
            $table->integer('num_children');
        });
        DB::statement('ALTER TABLE location_requests ADD coords POINT' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('location_requests');
    }
}
