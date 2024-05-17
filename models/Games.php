<?php
require_once __DIR__ . '/Product.php';

class Games extends Product {

    public $material;


    public function __construct($_name, $_price, $_category,$_material) {
        parent::__construct($_name, $_price, $_category);
        $this->material = $_material;
    }
}
?>