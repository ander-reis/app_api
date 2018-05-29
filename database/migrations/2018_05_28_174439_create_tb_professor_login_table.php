<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbProfessorLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_professor_login', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('pca_id_professor_fk')->default(0);
            //$table->dateTime('dt_ultimo_login');
            $table->timestamp('dt_ultimo_login');
            //$table->timestamps();
            $table->foreign('pca_id_professor_fk')->references('id')->on('tb_professor_cadastro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_professor_login');
    }
}
