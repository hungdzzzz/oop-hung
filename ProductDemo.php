<?php

namespace demo;

require_once 'Product.php';
use entity\Product;

class ProductDemo{
    public function createProductTest() {
        $product = new Product(1, 'Product test', 10.5);
        return $product;
    }

    public function printProduct(Product $product) {
        echo "ID: " . $product->getId() . "\n";
        echo "Name: " . $product->getName() . "\n";
        echo "Category: " . $product->getCategoryId() . "\n";
    }
}