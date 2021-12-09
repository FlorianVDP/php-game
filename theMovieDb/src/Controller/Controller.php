<?php
namespace App\Controller;


use App\View\View;
use App\APIClient\TheMovieDb\{MovieApiSearcher,PeopleApiSearcher, TvShowApiSearcher};

class Controller{
    public function listCommand(){
        $command = readline("Liste des commandes [searchMovie] [searchPeople] [searchTVShow] : ");
        $this->executCommand($command);
    }
    public function executCommand($command){
        if ($command === 'searchMovie'){
            $query = readline("Quel est le nom du film ? ");
            $this->searchMovie($query);
        }
        elseif ($command === 'searchPeople'){
            $query = readline("Quel est le nom de la personne ? ");
            $this->searchPeople($query);
        }
        elseif ($command === 'searchTVShow'){
            $query = readline("Quel est le nom du TV Show ? ");
            $this->searchTVShow($query);
        }
        else{
            echo "\e[0;31;40mLa commande envoyée n'existe pas.\e[0m\n";
            die();
        }
    }

    public function searchMovie($query){
        $movieSearcher = new MovieApiSearcher();
        $movies = $movieSearcher->searchMovie($query);
        foreach ($movies as $movie){
            View::render($movie);
        }
    }
    public function searchPeople($query){
        $peopleSearcher = new PeopleApiSearcher();
        $peoples = $peopleSearcher->searchPeople($query);
        foreach ($peoples as $people){
            View::render($people);
        }
    }
    public function searchTVShow($query){
        $tvShowhSearcher = new TvShowApiSearcher();
        $tvShows = $tvShowhSearcher->searchTVShow($query);
        foreach ($tvShows as $tvShow){
            View::render($tvShow);
        }
    }
}