<?php
class Venta extends DB
{
    public $id_venta;
    public $id_producto;
    public $cantidad;


    public static function all()
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * From venta");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_CLASS, Venta::class);
    }
    public static function findOne($id_producto)
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * FROM inventario WHERE id = :id");
        $prepare->execute([":id" => $id_producto]);

        return $prepare->fetchObject(Product::class);
    }
    public  function create()
    {
        $prepare = $this->prepare("INSERT INTO venta (id_producto,cantidad) VALUES (:id_producto, :cantidad)");
        $prepare->execute([":id_producto" => $this->id_producto, ":cantidad" => $this->cantidad]);
    }
    public function venta()
    {
        $prepare = $this->prepare("UPDATE venta SET stock=:stock WHERE id=:id ");
        $prepare->execute([":stock" => $this->cantidad, ":id" => $this->id_producto]);
    }
}
