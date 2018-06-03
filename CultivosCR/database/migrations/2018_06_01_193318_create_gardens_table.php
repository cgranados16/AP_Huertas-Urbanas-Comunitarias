<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGardensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gardens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 50);
            $table->integer('IdManager')->unsigned();
            $table->text('Directions');
            $table->decimal('Latitude', 12,9);
            $table->decimal('Longitude',12,9);
            $table->timestamps();
            
            $table->foreign('IdManager')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gardens');
    }
}
