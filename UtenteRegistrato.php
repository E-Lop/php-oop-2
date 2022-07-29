<?php

require_once __DIR__ . '/Utente.php';
require_once __DIR__ . '/CartaPrepagata.php';

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

    // override
    public function getInfo() {
        return "$this->name $this->lastname - email: $this->email";
    }

    
}

?>