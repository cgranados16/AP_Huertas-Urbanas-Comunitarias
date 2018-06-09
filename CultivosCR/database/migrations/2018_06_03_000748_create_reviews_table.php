<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdGarden')->unsigned();
            $table->integer('IdClient')->unsigned();
            $table->dateTime('Date');
            $table->integer('Score');
            $table->text('Description');
            $table->timestamps();

            $table->unique(['IdGarden', 'IdClient']);
            $table->foreign('IdGarden')->references('id')->on('gardens');
            $table->foreign('IdClient')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
