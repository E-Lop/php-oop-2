<?php
class GiocattoloProdotto {

    public $productName;

    public $productType;

    public $productPrice;

    public $productConsumer;

    public function __construct($_productName) {
        $this->productName = $_productName;
    }

}

?>