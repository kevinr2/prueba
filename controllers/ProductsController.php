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
        $data = $_GET['id'];
        $product = Product::findOne($data);
        echo json_encode($product);
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
        $data = json_decode(file_get_contents('php://input'));

        $product = new Product();
        $product->id = $data->id;
        $product->nombre_producto = $data->nombre_producto;
        $product->referencia = $data->referencia;
        $product->precio = $data->precio;
        $product->peso = $data->peso;
        $product->categoria = $data->categoria;
        $product->stock = $data->stock;
        $product->fecha_creacion = $data->fecha;
        $product->update();
    }
    public function delete()
    {
        $data = $_GET['id'];
        $product = new Product();
        $product->id = $data;
        $product->delete();
    }
}
