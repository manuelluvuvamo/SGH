<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPaciente')->nullable();
            $table->foreign('idPaciente')->references('id')->on('pacientes')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('idFuncionario')->nullable();
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('idMarcacao')->nullable();
            $table->foreign('idMarcacao')->references('id')->on('marcacao_consultas')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->longText("descricao")->nullable();
            $table->longText("diagnostico")->nullable();
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
        Schema::dropIfExists('consultas');
    }
}
