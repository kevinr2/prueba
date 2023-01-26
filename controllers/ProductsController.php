<?php

include "models/Product.php";
class ProductsController
{
    public function index()
    {
        $product = Product::all();
        view("products.index", ["productos" => $product]);
    }
    public function find()
    {
        $product = Product::findOne(2);
        var_dump($product);
    }
    public function create()
    {
        $data = json_decode(file_get_contents('php://input'));

        $product = new Product();
        $product->nombre_producto = $data->nombre_producto;
        $product->referencia = $data->referencia;
        $product->precio = $data->precio;
        $product->peso = $data->peso;
        $product->categoria = $data->categoria;
        $product->stock = $data->stock;
        $product->fecha_creacion = date("Y-m-d");
        $product->create();
    }

    public function update()
    {
        $product = Product::findOne(2);
        $product->nombre_producto = "agua";
        $product->referencia = "16b3f6";
        $product->precio = "4500";
        $product->peso = "8";
        $product->categoria = "bebida";
        $product->stock = "200";
        $product->fecha_creacion = "2023-01-08";
        $product->update();
    }
    public function delete()
    {
        $product = Product::findOne(5);
        $product->delete();
    }
}
