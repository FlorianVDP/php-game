<?php

class Pokemon{
    function __construct($name , $hp, $attaque){
        $this->name = (string)$name;
        //$this->type = (string)$type;
        $this->hp = (int)$hp;
        $this->attaque = (int)$attaque;
    }
    function loseHP($hpLose){
        //$this->hp = $this->hp - $hpLose;
    }
}
$pokemons = ["bulbizarre", "carapuce","salameche"];

$question = "Qui choisissez vous ? ";
foreach ($pokemons as $key => $pokemon) {
    $question .= $pokemon . "($key) ";
}

$choixJoueur = (int)readline($question);
$pokemonJoueur = new Pokemon($pokemons[$choixJoueur],rand(20,60),rand(5,10));
$pokemonIA = new Pokemon($pokemons[rand(0,sizeof($pokemons) - 1)],rand(20,60),rand(5,10));

class Arene{
    function __construct($pokemon1,$pokemon2){
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }
    function fight(){
        
    }
}