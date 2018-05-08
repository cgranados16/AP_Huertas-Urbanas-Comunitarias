<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTreesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 50);
            $table->integer('Order')->unsigned();
            $table->boolean('InDanger');
            $table->timestamps();
            $table->foreign('Order')->references('id')->on('TreeOrderCatalog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trees');
    }
}
