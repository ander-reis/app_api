<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbProfessorCadastroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_professor_cadastro', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 100)->default('');
            $table->string('email', 120)->unique();
            $table->string('password', 255);
            $table->string('ds_cpf', 14)->default('');
            $table->string('ds_rg', 15)->default('');
            $table->date('dt_nascimento', 8)->default('1900/01/01');
            $table->string('ds_cep', 9)->default('');
            $table->string('ds_endereco', 63)->default('');
            $table->string('ds_numero', 6)->default('');
            $table->string('ds_complemento', 50)->default('');
            $table->string('ds_bairro', 59)->default('');
            $table->string('ds_cidade', 32)->default('');
            $table->string('ds_uf', 2)->default('SP');
            $table->string('ds_ddd_residencial', 2)->default('11');
            $table->string('ds_fone_residencial', 9)->default('');
            $table->string('ds_ddd_fone_celular', 2)->default('11');
            $table->string('ds_fone_celular', 9)->default('');
            $table->tinyInteger('fl_sexo')->default('0');
            $table->tinyInteger('fl_email_ativo')->default('0');
            $table->tinyInteger('fl_celular_ativo')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('tb_professor_cadastro');
    }
}
