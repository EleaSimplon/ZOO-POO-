<?php

abstract class Enclosure {

    protected string $type;
    protected string $clean = 'propre';
    protected int $surface;
    protected int $max;
    protected bool $empty = true;
    // protected array $animalsEnclos = [];
    protected $id;
    protected int $height;
    protected bool $summit;
    protected int $deep;
    protected int $salinity;
    protected int $idZoo;
    protected  $animalEnclos;

    /* CONSTRUCT */

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function getId() {
        return $this->id;
    }

    public function setId ($id){
        $this->id = $id;
    }

    public function getIdZoo (){
        return $this->idZoo;
    }

    public function setIdZoo ($idZoo){
        $this->idZoo = $idZoo;
    }

    public function getAnimalEnclos (){
        return $this->animalEnclos;
    }

    public function setAnimalEnclos ($animalEnclos){
        $this->animalEnclos = $animalEnclos;
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

    /* GETTERS & SETTERS */

    /* RETURN STRING */
    
    public function getType (){
        return $this->type;
    }

    public function setType ($type){
        $this->type = $type;
    }

    public function getClean(){
        return $this->clean;
    }

    public function setClean($clean){
        $this->clean = $clean;
    }

    /* RETURN INT */

    public function getSurface(){
        return $this->surface;
    }

    public function setSurface($surface){
        $this->surface = $surface;
    }


    public function getMax(){
        return $this->max;
    }

    public function setMax($max){
        $this->max = $max;
    }


    // public function getAnimalsEnclos() :array {
    //     return $this->animalsEnclos;
    // }

    // public function setAnimalsEnclos(array $animalsEnclos) :void {

    //     $this->animalsEnclos = $animalsEnclos;
    // }

    /* RETURN BOOL */

    public function isEmpty(){
        return $this->empty;
    }

    public function setEmpty($empty){
        $this->empty = $empty;
    }

    /* CARACTERISTIQUES DE L'ENCLOS */

    public function features() {

        echo '<b>Type of enclosure :</b>'.$this->getType().'<br>';
        echo '<b>Surface :</b>'.$this->getSurface().'<br>';
        echo '<b>Cleanliness :</b>'.$this->getClean().'<br>';
        // echo $this->isEmpty().'<br>';
        echo '<b>Number max of animals :</b>'.$this->getMax().'<br>';
    }

    /* CARACTERISTIQUES DE L'ANIMAL DANS L'ENCLOS */


    // public function nbAnimalsInside() :int {
    //     return count($this->animalsEnclos);
    // }

    // public function addAnimal(Animal $animal){
    //     array_push($this->animalsEnclos, $animal);
    // }
    
    // public function removeAnimal(){
    //     array_pop($this->animalsEnclos);
    // }

    // public function moveAnimal(Animal $animal, Enclosure $enclosure){
    //     $this->removeAnimal();
    //     $enclosure->addAnimal($animal);
    // }

    // public function animalsFeatures(){
    //     foreach ($this->animalsEnclos as $animals) {
    //         echo $animals->features().'<br>';

    //     }
    // }

    public function clean(){
        if ($this->isEmpty() && $this->getClean() == 'dirty') {
            $this->setEmpty(false);
            $this->setClean('clean');
        }
    }



    // Aqua class 
    public function getDeep () :int {
        return $this->deep;
    }

    public function setDeep ($deep) {
        $this->deep = $deep;
    }

    public function getSalinity () :int {
        return $this->salinity;
    }

    public function setSalinity ($salinity) {
        $this->salinity = $salinity;
    }

    // BirdCage class 
    /* RETURN INT */

    public function getHeight () :int {
        return $this->height;
    }

    public function setHeight ($height) :void {
        $this->height = $height;
    }

    /* RETURN BOOL */

    public function isSummit () :int {
        return $this->summit;
    }

    public function setsummit ($summit) {
        $this->summit = $summit;
    }
}