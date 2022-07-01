<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idFuncionario')->nullable();
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->date("dataAdmissao");
            $table->string("cargoInicial")->nullable();
            $table->double("salarioInicia");
            $table->integer("numDependentes")->nullable();
            $table->integer("numRegistro")->nullable();
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
        Schema::dropIfExists('admissaos');
    }
}
