<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Garden')->unsigned();
            $table->integer('HarvestType')->unsigned();
            $table->integer('Harvest')->unsigned();
            $table->integer('FertilizerRequirements')->unsigned();
            $table->decimal('Price',19,4);
            $table->boolean('InStock');
            $table->timestamps();

            $table->foreign('Garden')->references('id')->on('gardens')->onDelete('cascade');
            $table->foreign('HarvestType')->references('id')->on('harvest_type');
            $table->foreign('FertilizerRequirements')->references('id')->on('fertilizercatalog')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harvest');
    }
}
