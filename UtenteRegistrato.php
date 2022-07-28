<?php

require_once __DIR__ . '/Utente.php';

class UtenteRegistrato extends Utente {
    public $name;
    
    public $lastname;

    //override
    public $discount = 20;

    public function __construct($_name, $_lastname, $_email) {
        $this->name = $_name;
        $this->lastname = $_lastname;
        $this->email = $_email;
    }

    public function getInfo() {
        return "$this->name $this->lastname - Età: $this->age - Genere: $this->gender";
    }
}

?>