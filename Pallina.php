<?php
require_once __DIR__ . '/GiocattoloProdotto.php';

class Pallina extends GiocattoloProdotto {

    public function __construct($_productName, $_productPrice) {
        $this->productName = $_productName;
        $this->productPrice = $_productPrice;
    }
}

?>