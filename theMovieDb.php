<?php
//-----_____-----_____-----_____----- Controller
class Controller{
    public function listCommand(){
        $command = readline("Liste des commandes [searchMovie] [searchPeople] : ");
        $this->executCommand($command);
    }
    public function executCommand($command){
        if ($command === 'searchMovie'){
            $query = readline("Quel est le nom du film ? ");
            return $this->searchMovie($query);
        }
        elseif ($command === 'searchPeople'){
            $query = readline("Quel est le nom de la personne ? ");
            return $this->searchPeople($query);
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
            Vue::render($movie);
        }
    }
    public function searchPeople($query){
        $peopleSearcher = new PeopleApiSearcher();
        $peoples = $peopleSearcher->searchPeople($query);
        foreach ($peoples as $people){
            Vue::render($people);
        }
    }
}

//-----_____-----_____-----_____----- Service
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
        var_dump($reponse);
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

//-----_____-----_____-----_____----- Modele
class Movie{
    private $title;
    private $overview;

    /**
     * Movie constructor.
     * @param $title
     * @param $overview
     */

    public function __construct($title, $overview)
    {
        $this->title = $title;
        $this->overview = $overview;
    }


    public function __toString() // Créé une représentation textuelle de l'objet
    {
        return "\e[0;32;40mTitle:\e[0m ". $this->title . " | \e[0;32;40mOverview:\e[0m ". $this->overview."\n";
    }


}
class People{
    private $name;
    private $knownForDepartment;

    /**
     * People constructor.
     * @param $name
     * @param $knownForDepartment
     */
    public function __construct($name, $knownForDepartment)
    {
        $this->name = $name;
        $this->knownForDepartment = $knownForDepartment;
    }

    public function __toString()
    {
        return "\e[0;32;40mName:\e[0m ". $this->name . " | \e[0;32;40mJob:\e[0m ". $this->knownForDepartment."\n";
    }


}

//-----_____-----_____-----_____----- Vue
class Vue{
    public static function render($object){
        echo $object;
    }
}

$controller = new Controller();
$command = $controller->listCommand();