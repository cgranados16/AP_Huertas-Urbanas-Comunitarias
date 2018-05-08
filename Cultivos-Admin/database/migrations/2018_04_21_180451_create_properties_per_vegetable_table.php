<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesPerVegetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_per_vegetable', function (Blueprint $table) {
            $table->integer('Vegetable')->unsigned();
            $table->integer('Property')->unsigned();
            $table->foreign('Vegetable')->references('id')->on('vegetables')->onDelete('cascade');
            $table->foreign('Property')->references('id')->on('VegetablePropertiesCatalog')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties_per_vegetable');
    }
}
