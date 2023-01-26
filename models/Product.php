<?php

class Product extends DB
{
    public $id;
    public $nombre_producto;
    public $referencia;
    public $precio;
    public $peso;
    public $categoria;
    public $stock;
    public $fecha_creacion;

    public static function all()
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * From inventario");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_CLASS, Product::class);
    }
    public static function findOne($id)
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * FROM inventario WHERE id = :id");
        $prepare->execute([":id" => $id]);

        return $prepare->fetchObject(Product::class);
    }
    public  function create()
    {
        $prepare = $this->prepare("INSERT INTO 
        inventario(nombre_producto,referencia,precio,peso,categoria,stock,fecha_creacion)
        VALUES (:nombre_producto,:referencia,:precio,:peso,:categoria,:stock,:fecha_creacion)");
        $prepare->execute([
            ":nombre_producto" => $this->nombre_producto, ":referencia" => $this->referencia,
            ":precio" => $this->precio, ":peso" => $this->peso, ":categoria" => $this->categoria, ":stock" => $this->stock,
            ":fecha_creacion" => $this->fecha_creacion
        ]);
    }
    public function update()
    {
        $prepare = $this->prepare("UPDATE inventario SET 
        nombre_producto=:nombre_producto,referencia=:referencia,precio=:precio,peso=:peso,
        categoria=:categoria,stock=:stock,fecha_creacion=:fecha_creacion WHERE id=:id");
        $prepare->execute([
            ":nombre_producto" => $this->nombre_producto, ":referencia" => $this->referencia,
            ":precio" => $this->precio, ":peso" => $this->peso, ":categoria" => $this->categoria, ":stock" => $this->stock,
            ":fecha_creacion" => $this->fecha_creacion, "id" => $this->id
        ]);
    }
    public function delete()
    {
        $prepare = $this->prepare("DELETE FROM inventario WHERE id=:id");
        $prepare->execute(["id" => $this->id]);
    }
}
