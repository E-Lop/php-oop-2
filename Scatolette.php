<?php
require_once __DIR__ . '/CiboProdotto.php';

class Scatolette extends CiboProdotto {

    public function __construct($_productName, $_productPrice) {
        $this->productName = $_productName;
        $this->productPrice = $_productPrice;
    }
}

?>