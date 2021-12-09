<?php
namespace App\Model;
class TVShow{
    private $name;
    private $date;

    /**
     * TVShow constructor.
     * @param $name
     * @param $date
     */
    public function __construct($name, $date)
    {
        $this->name = $name;
        $this->first_air_date = $date;
    }

    public function __toString()
    {
        return "\e[0;32;40mName:\e[0m ". $this->name . " | \e[0;32;40mDate:\e[0m ". $this->first_air_date."\n";
    }

}