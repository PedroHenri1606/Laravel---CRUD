<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    //Correção do Eloquent ORM
    protected $table = 'fornecedores';
    protected $fillable = ['nome','site','uf','email'];  //Variavel que faz a autorização de manipulação das variaveis pelo tinker. 
}
