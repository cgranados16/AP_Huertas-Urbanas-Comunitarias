<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVegetablesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vegetables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 0);
            $table->integer('Color')->unsigned();
            $table->integer('Type')->unsigned();
            $table->timestamps();
            $table->foreign('Color')->references('id')->on('ColorCatalog');
            $table->foreign('Type')->references('id')->on('VegetableTypeCatalog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vegetables');
    }
}
