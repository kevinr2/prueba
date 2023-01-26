<?php

include "models/Product.php";
class ProductsController
{
    public function index()
    {
        $product = Product::all();
        var_dump($product);
    }
}
