<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->longText('descricao');
            $table->unsignedBigInteger('idCriterio');
            $table->foreign('idCriterio')->references('id')->on('criterio_avaliacaos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('idNivel');
            $table->foreign('idNivel')->references('id')->on('nivel_avaliacaos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('idFuncionario');
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('idCodigo');
            $table->foreign('idCodigo')->references('id')->on('codigos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->softDeletes();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('avaliacaos');
    }
}
