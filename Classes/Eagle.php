<?php

class Eagle extends Animal {
    
    protected string $type = 'Eagle';

    public function lay() {
        if ($this->gestation === 100 && $this->sex == 'female' ){
            echo  $this->getNameSpecies().' laid eggs';
            
            $this->setGestation(0);
        }
    }

    //***** DO TO : VOIR LE COMPTEUR GESTATION *****

    public function fly() {
        echo $this->getNameSpecies().' is flying';
          
    }
}