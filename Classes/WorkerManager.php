<?php

class WorkerManager {

    public function add(Worker $worker)
  {
    $q = $this->db->prepare('INSERT INTO Worker(`name`, sex, age, id_zoo) VALUES(:`name`, :sex, :age, :id_zoo)');
    
    $q->bindValue(':name', $worker->getname());
    $q->bindValue(':sex', $worker->getSex());
    $q->bindValue(':age', $worker->getAge());
    $q->bindValue(':id_zoo', $worker->getIdZoo());
    
    $q->execute();
    
    $worker->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }
}