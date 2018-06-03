<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosPerGardenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_per_garden', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdGarden')->unsigned();
            $table->string('Photo', 255);
            $table->timestamps();
            $table->foreign('IdGarden')->references('id')->on('gardens')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos_per_garden');
    }
}
