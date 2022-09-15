<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesTableCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id',false, true);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('offre_id',false, true);
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('diffusion_id',false, true);
            $table->foreign('diffusion_id')->references('id')->on('diffusions')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date_commande');
            $table->string('nom_emetteur');
            $table->string('nom_recepteur');
            $table->float('net_a_payer');
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
        Schema::dropIfExists('commandes');
    }
}
