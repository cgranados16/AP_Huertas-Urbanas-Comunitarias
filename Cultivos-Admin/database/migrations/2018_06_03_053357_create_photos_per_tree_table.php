<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosPerTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_per_tree', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdTree')->unsigned();
            $table->string('Photo',255);
            $table->timestamps();

            $table->foreign('IdTree')->references('id')->on('trees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos_per_tree');
    }
}
