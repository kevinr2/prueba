<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta autor="Kevin Revelo" description="cafeteria prueba para Konecta">

    <title>Cafeteria</title>
</head>

<body>

    <table>
        <tr>
            <th>id</th>
            <th>nombre producto</th>
            <th>refencia</th>
            <th>precio</th>
            <th>peso</th>
            <th>categoria</th>
            <th>stock</th>
            <th>fecha</th>

            <?php foreach ($productos as $producto) : ?>
        <tr>
            <td><?php echo $producto->id; ?></td>
            <td><?php echo $producto->nombre_producto; ?></td>
            <td><?php echo $producto->referencia; ?></td>
            <td><?php echo $producto->precio; ?></td>
            <td><?php echo $producto->peso; ?></td>
            <td><?php echo $producto->categoria; ?></td>
            <td><?php echo $producto->stock; ?></td>
            <td><?php echo $producto->fecha_creacion; ?></td>


        </tr>
    <?php endforeach; ?>

    </tr>
    </table>



</body>

</html>