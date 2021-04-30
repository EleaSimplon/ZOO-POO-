<?php

abstract class Animal {

    protected string $nameSpecies;
    protected string $type;
    protected string $sex;
    protected int $idEnclos;
    protected int $age;
    protected int $weight;
    protected int $size;
    protected bool $sleep = false;
    protected bool $hungry = false;
    protected bool $sick = false;
    protected int $gestation = 0;
    protected $id;
   


    /* CONSTRUCT */

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

    public function getId (){
        return $this->id;
    }

    public function setId ($id){
        $this->id = $id;
    }

    public function getIdEnclos (){
        return $this->idEnclos;
    }

    public function setIdEnclos ($idEnclos){
        $this->idEnclos = $idEnclos;
    }

    /* GETTERS & SETTERS */

    /* RETURN STRING */

    public function getNameSpecies (){
        return $this->nameSpecies;
    }

    public function setNameSpecies ($nameSpecies){
        $this->nameSpecies = $nameSpecies;
    }

    public function getType (){
        return $this->type;
    }

    public function setType ($type){
        $this->type = $type;
    }

    public function getSex (){
        return $this->sex;
    }

    public function setSex($sex){
        $this->sex = $sex;
    }

    /* RETURN INT */

    public function getAge (){
        return $this->age;
    }

    public function setAge ($age){
        $this->age = $age;
    }

    public function getWeight (){
        return $this->weight;
    }

    public function setWeight ($weight){
        $this->weight = $weight;
    }

    public function getSize (){
        return $this->size;
    }

    public function setSize($size){
        $this->size = $size;
    }

    public function getGestation (){
        return $this->gestation;
    }

    public function setGestation ($gestation){
        $this->gestation = $gestation;
    }

    /* RETURN BOOL */

    public function isSleep (){
        return $this->sleep;
    }

    public function setSleep ($sleep){
        $this->sleep = $sleep;
    }

    public function isHungry (){
        return $this->hungry;
    }

    public function setHungry ($hungry){
        $this->hungry = $hungry;
    }

    public function isSick (){
        return $this->sick;
    }

    public function setSick($sick){
        $this->sick = $sick;
    }

    /* METHODES */

    public function eat() {
        if ($this->isHungry()){
            $this->setHungry(false);
        }
    }

    public function sleeping() {
        if ($this->isSleep()==false){
            $this->setsleep(true);
        }
    }

    public function wakeUp() {
        if ($this->isSleep()){
            $this->setsleep(false);
        }
    }

    public function care() {
        if ($this->isSick()){
            $this->setSick(false);
        }
    }

    public function sound() {
        echo 'HOOOUUUU';
    }

    /* CARACTERISTIQUES */

    public function features() {

        echo 'Name of the species: '.$this->getNameSpecies().'<br>';
        echo 'Age: '.$this->getAge().'<br>';
        echo 'Weight: '.$this->getWeight().'<br>';
        echo 'Size: '.$this->getSize().'<br>';
        // echo $this->isSleep().'<br>';
        // echo $this->isSick().'<br>';
        // echo $this->ishungry().'<br>';
    }

}