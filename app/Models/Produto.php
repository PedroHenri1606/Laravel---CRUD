<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdutoDetalhe;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome','unidade','descricao','peso','unidade_id'];
    
    public function produtoDetalhe(){
        return $this->hasOne(ProdutoDetalhe::class); // Produto possui 1 produtoDetalhe
    }
}
