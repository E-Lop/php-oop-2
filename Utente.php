<?php
require_once __DIR__ . '/CartaPrepagata.php';

class Utente {
   
    

    public $email;
    
    public $age;

    public $gender;

    public $discount = 0;

    protected $selectedProducts = [];

    public function __construct($_email) {
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
    // function to display the name of the products in the cart
    public function selectedProductsList() {
        $productList = [];
        foreach($this->selectedProducts as $oneProductName) {
            $productList [] = $oneProductName->productName;
        }
        return implode(', ',$productList);
    }

    public function totalPrice() {
        // Somma dei prezzi dei prodotti scelti
        $totalAmount = 0;
        foreach($this->selectedProducts as $product) {
            $totalAmount += $product->productPrice;
        }

        // Leviamo lo sconto
        $totalAmount -= $totalAmount * $this->discount / 100;

        return $totalAmount;
    }

    public function getInfo() {
        return "$this->email";
    }

    public function effettuaPagamento($cartaPrepagata) {
        $totaleDaPagare = $this->totalPrice();

        if($cartaPrepagata->saldo < $totaleDaPagare) {
            throw new Exception("Utente: $this->nome: Saldo non disponibile sulla carta");
        } else {
            return 'ok';
        }
    }

}

?>