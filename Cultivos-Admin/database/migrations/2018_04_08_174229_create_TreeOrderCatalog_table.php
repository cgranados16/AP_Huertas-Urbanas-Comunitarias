<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTreeOrderCatalogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TreeOrderCatalog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdFamily')->unsigned();
            $table->string('Name', 50);
            $table->foreign('IdFamily')->references('id')->on('TreeFamilyCatalog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TreeOrderCatalog');
    }
}
