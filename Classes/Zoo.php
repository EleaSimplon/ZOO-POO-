<?php

class Zoo {

    protected string $name;
    protected object $worker;
    protected int $nbMaxEnclos = 25;
    protected array $allEnclos = [];
    protected $id;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    /* HYDRATE */

    public function hydrate($donnees){
        foreach ($donnees as $key =>$value) {
        
            $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
        }
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getWorker(){
        return $this->worker;
    }

    public function setWorker($worker){
        $this->worker = $worker;
    }

    public function getnbMaxEnclos(){
        return $this->nbMaxEnclos;
    }

    public function setNbMaxEnclos($nbMaxEnclos){
        $this->nbMaxEnclos = $nbMaxEnclos;
    }


    public function nbAnimalsZoo() :int {
        $countAnimal = 0;
        foreach ($this->allEnclos as $enclos){
            $countAnimal += $enclos->nbAnimalsInside();
        }
        return $countAnimal;
    }

    public function addEnclos(Enclosure $enclosure) :void {
        if (count($this->allEnclos) < $this->nbMaxEnclos) {
            array_push($this->allEnclos, $enclosure);
        }
    }

    public function contenuAllEnclos() :array {
        return $this->allEnclos;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

}