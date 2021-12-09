<?php
namespace App\Model;

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