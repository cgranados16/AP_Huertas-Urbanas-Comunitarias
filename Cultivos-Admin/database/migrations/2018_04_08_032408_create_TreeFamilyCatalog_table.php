<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTreeFamilyCatalogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TreeFamilyCatalog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 50);
            $table->text('Description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TreeFamilyCatalog');
    }
}
