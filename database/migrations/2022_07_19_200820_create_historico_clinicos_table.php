<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_clinicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPaciente')->nullable();
            $table->foreign('idPaciente')->references('id')->on('pacientes')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('idPatologia')->nullable();
            $table->foreign('idPatologia')->references('id')->on('patologias')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->longText("descricao")->nullable();
            $table->longText("resultado")->nullable();
            $table->integer('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('historico_clinicos');
    }
}
