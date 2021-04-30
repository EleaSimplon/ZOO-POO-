<?php

class ZooManager {
    
  private $db;
  
  public function __construct($db)
  {
    $this->db = $db;
  }

    public function add(Zoo $zoo)
  {
    $q = $this->db->prepare('INSERT INTO Zoo(name, nbMaxEnclos) VALUES(:name, :nbMaxEnclos)');
    
    $q->bindValue(':name', $zoo->getname());
    $q->bindValue(':nbMaxEnclos', $zoo->getNbMaxEnclos());
    
    $q->execute();
    
    $zoo->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }

}