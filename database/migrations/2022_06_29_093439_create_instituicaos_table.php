<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->id();
            $table->string("nomeCurto");
            $table->string("nomeLongo");
            $table->string("logo")->nullable();
            $table->string("missao")->nullable();
            $table->string("iban")->nullable();
            $table->string("nif")->nullable();
            $table->string("telefone1")->nullable();
            $table->string("telefone2")->nullable();
            $table->string("email1")->nullable();
            $table->string("email2")->nullable();
            $table->string("endereco")->nullable();
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
        Schema::dropIfExists('instituicaos');
    }
}
