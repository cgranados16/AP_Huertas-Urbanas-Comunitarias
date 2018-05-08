<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVegetablePropertiesCatalogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VegetablePropertiesCatalog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 50);
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
        Schema::drop('VegetablePropertiesCatalog');
    }
}
