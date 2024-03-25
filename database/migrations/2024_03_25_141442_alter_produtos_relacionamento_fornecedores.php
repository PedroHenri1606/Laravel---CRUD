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
        //Criando a relação produto com fornecedores
        Schema::table('produtos', function(Blueprint $table){

            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'fornecedorpadraosg.com.br',
                'uf' => 'PR',
                'email' => 'contato@fornecedorsg.com.br  ',
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');

            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            //Sobre a foreign key fornecedores_id, ela referecia a coluna id, na tabela fornecedores
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColum('forncedor_id');
        });
    }
};
