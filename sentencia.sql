
/* producto con mas stock*/
SELECT nombre_producto,MAX(stock) FROM inventario;

/* producto mas vendido*/
SELECT  SUM(cantidad) FROM venta GROUP  BY id_producto
ORDER  BY MAX(cantidad) DESC LIMIT 1;