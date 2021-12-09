<?php
namespace App\Model;
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