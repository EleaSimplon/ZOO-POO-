<?php

class WorkerManager {

  private $db;
  
  public function __construct($db)
  {
    $this->db = $db;
  }

    public function add(Worker $worker, Zoo $zoo)
  {
    $q = $this->db->prepare('INSERT INTO Worker(name, sex, age, id_zoo) VALUES(:name, :sex, :age, :id_zoo)');
    
    $q->bindValue(':name', $worker->getname());
    $q->bindValue(':sex', $worker->getSex());
    $q->bindValue(':age', $worker->getAge());
    $q->bindValue(':id_zoo', $zoo->getId());
    
    $q->execute();
    
    $worker->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }
}