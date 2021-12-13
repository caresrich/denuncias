<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->bigIncrements('idDenuncia')->unsigned();
            $table->date('fechaIngreso')->nullable();
            $table->string('radicatoria')->nullable();
            $table->string('distrito')->nullable();
            $table->string('numeroRegistro')->nullable();
            $table->string('juzgadoDiciplinario')->nullable();
            $table->string('denunciante')->nullable();
            $table->string('denunciado')->nullable();
            $table->string('cargoDenunciado')->nullable();
            $table->string('faltaIncurre')->nullable();
            $table->string('sancion')->nullable();
            $table->string('estadoActualDenuncia')->nullable();
            $table->string('primeraInst')->nullable();
            $table->string('segundaInst')->nullable();
            $table->string('resolucionSegInst')->nullable();
            $table->string('numeroResolucion')->nullable();
            $table->string('numeroCuerpoFojas')->nullable();
            $table->date('fechaDevolucion')->nullable();
            $table->string('personalRegistra')->nullable();
            $table->longText('obsDenuncia')->nullable();
            $table->boolean('estadoDenuncia');

            $table->bigInteger('idFalta')->unsigned();

            $table->foreign('idFalta')->references('idFalta')->on('faltas');


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
        Schema::dropIfExists('denuncias');
    }
}
