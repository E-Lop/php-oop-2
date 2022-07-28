<?php

class Utente {
   

    public $email;
    
    public $age;

    public $gender;

    public $discount = 0;

    protected $selectedProducts = [];

    public function __construct($_email) {
        $this->name = $_name;
        $this->lastname = $_lastname;
        $this->email = $_email;
    }

    

    // function to add a product to the cart
    public function addProduct($product) {
        $this->selectedProducts[] = $product;
    }

    // function to display the products in the cart
    public function getSelectedProducts() {
        return $this->selectedProducts;
    }

}

?>