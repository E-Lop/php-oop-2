<?php

require_once __DIR__ . '/NormeSanitarie.php';

class CiboProdotto {
    use NormeSanitarie;

    public $productName;

    public $productType;

    public $productPrice;

    public $productConsumer;

    public function __construct($_productName) {
        $this->productName = $_productName;
    }

}

?>