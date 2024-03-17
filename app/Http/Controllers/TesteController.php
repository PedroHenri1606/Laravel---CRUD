<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{

    //Quando for criar as variaveis na view, sempre criar com o nome da variavel do controller 
    public function teste(int $p1, int $p2){
        //return view('site.teste', ['p1' => $p1, 'p1' => $p2] ); -- array associativo
        // return view('site.teste', compact('p1', 'p1') );  -- compact
        return view('site.teste')->with('p1', $p1)->with('p1', $p2); // -- witch 
    }
}
