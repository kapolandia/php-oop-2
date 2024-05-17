<?php
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/../Traits/Age.php';

class Food extends Product {
    use Age;
    public $weight;
    public $ingredients;

    public function __construct($_name, $_price, $_category, $_ingredients) {
        parent::__construct($_name, $_price, $_category);
        $this->ingredients = $_ingredients;
    }
}
?>