<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestSalesTrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdClient')->unsigned();
            $table->decimal('TotalPrice');
            $table->timestamps();
            $table->integer('IdGarden')->unsigned();
            $table->foreign('IdClient')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('IdGarden')->references('id')->on('gardens')->onDelete('cascade');;
        });

        Schema::create('HarvestBySale', function (Blueprint $table) {
            $table->integer('IdSale')->unsigned();
            $table->integer('IdHarvest')->unsigned();
            $table->integer('Quantity');
            $table->foreign('IdHarvest')->references('id')->on('Harvest')->onDelete('cascade');;
            $table->foreign('IdSale')->references('id')->on('Sale')->onDelete('cascade');;
        });

        Schema::create('Trade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdClient')->unsigned();
            $table->timestamps();
            $table->integer('IdGarden')->unsigned();
            $table->foreign('IdClient')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('IdGarden')->references('id')->on('gardens')->onDelete('cascade');;
        });

        Schema::create('HarvestByTrade', function (Blueprint $table) {
            $table->integer('IdTrade')->unsigned();
            $table->integer('IdHarvest')->unsigned();
            $table->integer('Quantity');
            $table->boolean('Receiving');
            $table->foreign('IdHarvest')->references('id')->on('Harvest')->onDelete('cascade');;
            $table->foreign('IdTrade')->references('id')->on('Trade')->onDelete('cascade');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sale');
        Schema::dropIfExists('HarvestBySale');
        Schema::dropIfExists('Trade');
        Schema::dropIfExists('HarvestByTrade');
    }
}
