<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColorCatalogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ColorCatalog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 50);
            $table->text('Description');
            $table->string('ColorHexCode', 7);
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
        Schema::drop('ColorCatalog');
    }
}
