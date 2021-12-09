<?php
namespace App\APIClient\TheMovieDb;
use App\Model\People;

class PeopleApiSearcher{
    const baseUrl = "https://api.themoviedb.org/3";
    const searchMovieSlug = "/search/person";
    const apiKey = "5ebe0843b2e373ffa159f5683b21b7de";
    const lang = "en-US";
    const page = "1";
    public function searchPeople($peopleName) : array // La function s'attend à retourner un array (TypeCasting)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl, [
                CURLOPT_URL => self::baseUrl.self::searchMovieSlug."?api_key=".self::apiKey."&language=".self::lang."&query=".$peopleName."&page=".self::page,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]
        );
        curl_setopt(
            $curl,
            CURLOPT_RETURNTRANSFER,
            1
        );
        $reponse = json_decode(curl_exec($curl), true);
        $peoples = [];
        /*
         * for($i=0; $i <= 4; $i++){
            $movie = new Movie($reponse["results"][$i]["title"],$reponse["results"][$i]["overview"]);
            $movies[] = $movie;
        }
        */
        foreach ($reponse["results"] as $key => $people) {
            $peoples[] =  new People($people["name"],$people["known_for_department"]);
            if($key > 3) break;
        }
        return $peoples;
    }
}