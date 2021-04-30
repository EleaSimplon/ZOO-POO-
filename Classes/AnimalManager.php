<?php

class AnimalManager {

  private $db;
  
  public function __construct($db)
  {
    $this->db = $db;
  }


  public function add(Animal $animal, Enclosure $enclosure)
  {
    $q = $this->db->prepare('INSERT INTO Animal(name_species, type, sex, age, weight, size, sleep, hungry, sick, gestation, id_enclos) VALUES(:name_species, :type, :sex, :age, :weight, :size, :sleep, :hungry, :sick, :gestation, :id_enclos)');
    
    $q->bindValue(':name_species', $animal->getNameSpecies());
    $q->bindValue(':sex', $animal->getSex());
    $q->bindValue(':age', $animal->getAge());
    $q->bindValue(':type', $animal->getType());
    $q->bindValue(':weight', $animal->getWeight());
    $q->bindValue(':size', $animal->getSize());
    $q->bindValue(':sleep', (int)$animal->isSleep());
    $q->bindValue(':hungry', (int)$animal->isHungry());
    $q->bindValue(':sick', (int)$animal->isSick());
    $q->bindValue(':gestation', $animal->getGestation());
    $q->bindValue(':id_enclos', $enclosure->getId());
    
    $q->execute();
    
    $animal->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }

}