<?php

include_once "models/Venta.php";
class VentaController
{
    public function index()
    {
        $venta = Venta::all();
        view("venta.index", ["ventas" => $venta]);
    }
    public function find()
    {
        $data = $_GET['id'];
        $product = Venta::findOne($data);
        echo json_encode($product);
    }
    public function venta()
    {
    }
}
