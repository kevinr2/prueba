<?php

include "models/Product.php";
class ProductsController
{
    public function index()
    {
        $product = Product::all();
        var_dump($product);
    }
    public function find()
    {
        $product = Product::findOne(2);
        var_dump($product);
    }
    public function create()
    {
        $product = new Product();
        $product->nombre_producto = "agua";
        $product->referencia = "16b3f6";
        $product->precio = "2500";
        $product->peso = "2";
        $product->categoria = "bebida";
        $product->stock = "200";
        $product->fecha_creacion = "2023-01-08";
        $product->create();
    }

    public function update()
    {
    }
    public function delete()
    {
    }
}
