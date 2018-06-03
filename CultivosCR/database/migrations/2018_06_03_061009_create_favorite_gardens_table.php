<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteGardensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_gardens', function (Blueprint $table) {
            $table->integer('IdClient')->unsigned();
            $table->integer('IdGarden')->unsigned();
            
            $table->primary(['IdClient', 'IdGarden']);
            $table->foreign('IdClient')->references('id')->on('users');
            $table->foreign('IdGarden')->references('id')->on('gardens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_gardens');
    }
}
