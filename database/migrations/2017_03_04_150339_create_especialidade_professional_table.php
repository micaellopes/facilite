<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadeProfessionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabela Associativa de Especialidades e Profissionais
        Schema::create('especialidade_professional', function (Blueprint $table){
            $table->increments('id');
            $table->integer('especialidade_id')->unsigned();
            $table->integer('professional_id')->unsigned();
            $table->timestamps();

            // Chaves estrangeiras referenciando as duas tabelas
            $table->foreign('especialidade_id')
                    ->references('id')
                    ->on('especialidades')
                    ->onDelete('cascade');

            $table->foreign('professional_id')
                    ->references('id')
                    ->on('professionals')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidade_professional');
    }
}
