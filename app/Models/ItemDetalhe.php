<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//Classe criada para aprendizado de relacionamento entre tabelas, quando o nome da classe é diferente do nome da tabela do banco de dados
class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura','unidade_id'];

    public function item(){
        return $this->belongsTo(Item::class,'produto_id','id'); //belongsTo = "Pertence a" ProdutoDetalhe pertence a um produto
        //Como é definido os parametros belongsTo(classe,'fk'pk')
        //Na tabela produtoDetalhe, busque a coluna produto_id como a foreign key, na tabela produtos, busque a coluna id como primary key
    }
}
