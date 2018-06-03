<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaboratorsPerGardenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators_per_garden', function (Blueprint $table) {
            $table->integer('IdGarden')->unsigned();
            $table->integer('IdCollaborator')->unsigned();
            $table->primary(['IdGarden', 'IdCollaborator']);
            $table->foreign('IdGarden')->references('id')->on('gardens');
            $table->foreign('IdCollaborator')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborators_per_garden');
    }
}
