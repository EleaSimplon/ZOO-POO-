<?php

class Worker {

    protected string $name;
    protected string $sex;
    protected int $age;

    /* CONSTRUCT FUNCTION */

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

    /* GETTERS & SETTERS */

    public function getName()
    {
        return $this->name;
    }

    public function setName ($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge ($age)
    {
        $this->age = $age;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex ($sex)
    {
        $this->sex = $sex;
    }

    /* METHODES OF WORKER */

    // public function inspectEnclos(Enclosure $enclosure) {
    //     $enclosure->animalsFeatures();
    //     $enclosure->features();
    // }

    public function cleanEnclos(Enclosure $enclosure){
        $enclosure->clean();
    }

    public function feed(Animal $animal) {
        $animal->eat();
    }

    // public function addAnimalEnclos(Enclosure $enclos, Animal $animal){
    //     $enclos->addAnimal($animal);
    // }

    public function wakeUpAnimal(Animal $animal){
        $animal->wakeUp();
    }

    // public function removeAnimalEnclos(Enclosure $enclos){
    //     $enclos->removeAnimal();
    // }

    // public function moveAnimalEnclos(Animal $animal, Enclosure $enclosDelete, Enclosure $enclos){
    //     $enclosDelete->moveAnimal($animal, $enclos);
    // }

}