<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Classe criada para aprendizado de relacionamento entre tabelas, quando o nome da classe é diferente do nome da tabela do banco de dados
class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos'; // Primeiro passo, ajustar o endereçamento da tabela presente no banco de dados que ira receber e enviar os dados 

    protected $fillable = ['nome','unidade','descricao','peso','unidade_id'];
    
    public function itemDetalhe(){
        return $this->hasOne(ItemDetalhe::class,'produto_id','id'); // Produto possui 1 produtoDetalhe
        // Segundo passo, ajustar a relação entre classes.
        // Terceiro passo, informar o nome da foreign key e a primary key 
        // Na tabela produto_detalhes, busque a coluna produto_id como foreign key, em seguida, na tabela produtos, utilize a coluna id como primary key
    }
}
