<?php

class EnclosureManager {

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

    public function add(Enclosure $enclosure, Zoo $zoo)
    {
      

      $q = $this->db->prepare('INSERT INTO Enclos(type, clean, surface, height, empty, nb_max_animals, summit,salinity, deep, id_zoo) VALUES(:type, :clean, :surface, :height, :empty,  :nb_max_animals, :summit, :salinity, :deep, :id_zoo)');
      
      $q->bindValue(':type', $enclosure->getType());
      $q->bindValue(':clean', $enclosure->getClean());
      $q->bindValue(':surface', $enclosure->getSurface());
      $q->bindValue(':empty', $enclosure->isEmpty());
      $q->bindValue(':nb_max_animals', $enclosure->getMax());
      $q->bindValue(':summit', $enclosure->isSummit());
      $q->bindValue(':salinity', $enclosure->getSalinity());
      $q->bindValue(':deep', $enclosure->getdeep());
      $q->bindValue(':height', $enclosure->getHeight());
      $q->bindValue(':id_zoo', intval($zoo->getId()));
      
      $q->execute();
      
      $enclosure->hydrate([
        'id' => $this->db->lastInsertId()
      ]);
    }


}