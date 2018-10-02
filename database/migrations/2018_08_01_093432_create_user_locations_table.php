<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('country_id');  //division field
            $table->string('state_id');     // district field
            $table->string('city_id');     // thana or upozila
            $table->string('post_code');     // thana or upozila
            $table->text('address')->nullable();
            $table->string('geo_tagging')->nullable();
            $table->double('lat')->default('23.810332');
            $table->double('lng')->default('90.412518');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_locations');
    }
}
