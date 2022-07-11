<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idFuncionario')->nullable();
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('idUser')->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');

            $table->unsignedBigInteger('idDepartamento')->nullable();
            $table->foreign('idDepartamento')->references('id')->on('departamentos')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('idFuncao')->nullable();
            $table->foreign('idFuncao')->references('id')->on('funcaos')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string("menu");
            $table->string("nivel");
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
        Schema::dropIfExists('acessos');
    }
}
