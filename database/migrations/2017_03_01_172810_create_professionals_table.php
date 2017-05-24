<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            // $table->string('avatar')->default('default.jpg');
            $table->string('tel', 20);
            $table->string('cpf', 20);
            $table->string('city', 100)->nullable();
            $table->string('url_perfil', 30)->unique()->nullable();
            $table->string('status', 10)->default('inactive');
            $table->text('description', 400)->nullable();
            $table->timestamps();

            // Chave estrangeira que representa o Usuário
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('professionals');
    }
}
