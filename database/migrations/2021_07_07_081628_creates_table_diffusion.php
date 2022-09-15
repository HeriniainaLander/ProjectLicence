<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesTableDiffusion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diffusions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id',false, true);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titre');
            $table->date('debut_diffusion');
            $table->date('fin_diffusion');
            $table->string('heure_diffusion');
            $table->integer('nb_diffusion',false,true);
            $table->integer('numQuitance',false,true);
            $table->timestamps();
            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diffusions');
    }
}
