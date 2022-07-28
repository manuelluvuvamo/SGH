<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcacaoConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcacao_consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPaciente')->nullable();
            $table->foreign('idPaciente')->references('id')->on('pacientes')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('idEspecialidade')->nullable();
            $table->foreign('idEspecialidade')->references('id')->on('especialidades')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->longText("descricao")->nullable();
            $table->date("data");
            $table->time("hora");
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
        Schema::dropIfExists('marcacao_consultas');
    }
}
