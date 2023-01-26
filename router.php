<?php
include_once "./utils/enrutador.php";
include_once "models/DB.php";
include_once "controllers/ProductsController.php";
include_once "controllers/VentaController.php";

$controller = $_GET['controller'];
$action = $_GET['action'];
$id = $_GET['id'];


if (empty($action)) {
    $action = "index";
}


$ctrlName = $controller . "Controller";
$ctrl = new $ctrlName;
$ctrl->{$action}();
