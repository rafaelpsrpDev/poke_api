<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class PokeController extends Controller
{
    public function index() {         

        $pokemons = Array('bulbasaur', 'ivysaur', 'venusaur','charmander', 'charmeleon');

        $getPokemons = $this->getPoke($pokemons);

        $getpoker = [];
        foreach ($getPokemons as $key => $poker) {
            //dd($poker->json());
            $getpoker[$key]['id'] = $poker['id'];
            $getpoker[$key]['types'] = $poker['types'];
            $getpoker[$key]['stats'] = $poker['stats'];
            $getpoker[$key]['moves'] = $poker['moves'];
            array_push($getpoker);
        }     
         dd($getpoker);
    } 

    private function getPoke($pokes = []) {

        $getPoke = [];
        foreach ($pokes as $key => $poke) {
            $getPokemons = Http::get("https://pokeapi.co/api/v2/pokemon/$poke");
            $getPoke[$poke] = $getPokemons;
        }
        return $getPoke;
    }
}
