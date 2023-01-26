<?php

class Product extends DB
{
    public static function all()
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * From inventario");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Product::class);
    }
}
