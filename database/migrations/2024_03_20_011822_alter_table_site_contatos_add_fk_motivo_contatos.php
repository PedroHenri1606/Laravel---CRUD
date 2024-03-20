<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //adicionando a coluna motivo contatos id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato'); //com o metodo statement é possivel executar querys dentro do banco de dados

        //Criando Foreign Key (FK)
        Schema::table('site_contatos', function(Blueprint $table){
            //a coluna nova motivo_contatos_id, vai ser referenciada pela coluna id da tabela motivo_contatos;
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos'); 
            //Deletando a coluna motivo_contato
            $table->dropColumn('motivo_contato');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Criando Foreign Key (FK)
        Schema::table('site_contatos', function(Blueprint $table){
            //Recriando a coluna motivo_contato
            $table->integer('motivo_contato');
            //Retirando a foreign key da tabela - ao excluir uma foreign key, deve ser considerado como parametro (<nomeTabela>_<nomeColuna>_<foreign>)
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign'); 
        });

        //Revertendo motivo_contatos_id para motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id'); 

        //Removendo a coluna motivo contatos id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
            
    }
};
