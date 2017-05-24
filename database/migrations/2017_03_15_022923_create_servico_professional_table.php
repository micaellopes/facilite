<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoProfessionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabela Associativa de Servicos e Profissionais
        Schema::create('servico_professional', function (Blueprint $table){
            $table->increments('id');
            $table->integer('servico_id')->unsigned();
            $table->integer('professional_id')->unsigned();
            $table->timestamps();

            // Chaves estrangeiras referenciando as duas tabelas
            $table->foreign('servico_id')
                    ->references('id')
                    ->on('servicos')
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
        Schema::dropIfExists('servico_professional');
    }
}
