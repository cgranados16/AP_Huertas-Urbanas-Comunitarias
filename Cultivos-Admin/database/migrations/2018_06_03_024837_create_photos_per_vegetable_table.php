<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosPerVegetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_per_vegetable', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdVegetable')->unsigned();
            $table->string('Photo',255);
            $table->timestamps();

            $table->foreign('IdVegetable')->references('id')->on('vegetables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos_per_vegetable');
    }
}
