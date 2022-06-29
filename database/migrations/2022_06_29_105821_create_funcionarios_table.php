<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser')->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('idFuncao')->nullable();
            $table->foreign('idFuncao')->references('id')->on('funcaos')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string("nome");
            $table->string("foto")->nullable();
            $table->string("genero");
            $table->date("dataNascimento");
            $table->string("estadoCivil");
            $table->string("localNascimento");
            $table->string("nacionalidade");
            $table->string("numBi");
            $table->string("filPai");
            $table->string("filMae");
            $table->string("iban");
            $table->string("endereco");
            $table->string("telefone");
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
        Schema::dropIfExists('funcionarios');
    }
}
