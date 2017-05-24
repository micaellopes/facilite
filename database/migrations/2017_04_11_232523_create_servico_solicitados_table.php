<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoSolicitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servico_solicitados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('servico_id')->unsigned();
            $table->integer('professional_id')->unsigned();
            $table->date('data');
            $table->time('horario');
            $table->string('numero');
            $table->text('mensagem');
            $table->string('notificacao')->default('nao_visualizada');

            // Chaves estrangeiras referenciando as duas tabelas
              $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('servico_id')
                    ->references('id')
                    ->on('servicos')
                    ->onDelete('cascade');

            $table->foreign('professional_id')
                    ->references('id')
                    ->on('professionals')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('servico_solicitados');
    }
}
