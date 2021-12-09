<?php
namespace App\APIClient\TheMovieDb;
use App\Model\Movie;

class MovieApiSearcher{
    const baseUrl = "https://api.themoviedb.org/3";
    const searchMovieSlug = "/search/movie";
    const apiKey = "5ebe0843b2e373ffa159f5683b21b7de";
    const lang = "en-US";
    const page = "1";
    public function searchMovie($movieName) : array // La function s'attend à retourner un array (TypeCasting)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl, [
                CURLOPT_URL => self::baseUrl.self::searchMovieSlug."?api_key=".self::apiKey."&language=".self::lang."&query=".$movieName."&page=".self::page,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]
        );
        curl_setopt(
            $curl,
            CURLOPT_RETURNTRANSFER,
            1
        );
        $reponse = json_decode(curl_exec($curl), true);
        $movies = [];
        /*
         * for($i=0; $i <= 4; $i++){
            $movie = new Movie($reponse["results"][$i]["title"],$reponse["results"][$i]["overview"]);
            $movies[] = $movie;
        }
        */
        foreach ($reponse["results"] as $key => $movie) {
            $movies[] =  new Movie($movie["title"],$movie["overview"]);
            if($key > 3) break;
        }
        return $movies;
    }
}
