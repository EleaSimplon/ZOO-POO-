<?php

class Fish extends Animal {

    protected string $type = 'Fish';


    public function lay() {
        if ($this->gestation === 100 && $this->sex == 'female' ){
            echo  $this->getNameSpecies().' laid eggs';
            
            $this->setGestation(0);
        }
    }

    //***** DO TO : VOIR LE COMPTEUR GESTATION *****

    public function swim() {
        echo $this->getNameSpecies().' is swimming';
          
    }
}