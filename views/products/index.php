<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta autor="Kevin Revelo" description="cafeteria prueba para Konecta">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <title>Cafeteria</title>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg d-flex justify-content-around">

            <div>
                <a class="navbar-brand" href="">Cafeteria</a>
            </div>
            <div>
                <button class="btn btn-primary btn-md" id="nuevo">nuevo</button>
            </div>

        </nav>
        <table class="table table-hover  ">
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
                <td><button class="btn btn-success btn-sm editar" id="<?php echo $producto->id; ?>">editar</button></td>
                <td><button class="btn btn-danger btn-sm">X</button></td>

            </tr>
        <?php endforeach;

        ?>

        </tr>
        </table>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row">
                            <div class="col-7">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" require>
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">Refencia</label>
                                <div class="input-group">
                                    <span class="input-group-text">#</span>
                                    <input type="text" class="form-control " id="referencia" name="referencia" require>
                                </div>
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">precio</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control " onkeypress="return isNumberKey(this);" id="precio" name="precio" require>
                                </div>
                            </div>
                            <div class=" col-5">
                                <label for="" class="form-label">peso</label>
                                <div class="input-group">
                                    <input type="number" class="form-control " onkeypress="return isNumberKey(this);" id="peso" name="peso" require>
                                    <span class=" input-group-text">kg</span>
                                </div>

                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">categoria</label>
                                <input type="text" class="form-control " id="categoria" name="categoria" require>
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">stock</label>
                                <input type="number" class="form-control " onkeypress="return isNumberKey(this);" id="stock" name="stock" require>
                            </div>

                        </form>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <button type="button" id="crear" class="btn btn-primary" data-bs-dismiss="modal">Crear</button>
                    <button type="button" id="update" class="btn btn-success" data-bs-dismiss="modal">editar</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    document.querySelector("#nuevo").addEventListener("click", () => {
        const myModal = new bootstrap.Modal(document.getElementById('myModal'))
        myModal.show();
        if (document.getElementById('crear')) {
            document.getElementById('update').classList.add('d-none')
            if (document.getElementById('crear').classList.remove('d-none')) {
                document.getElementById('crear').classList.remove('d-none');

            }
        }
    });
    document.querySelectorAll('.editar').forEach((item, index) => {
        item.addEventListener('click', () => {
            const myModal = new bootstrap.Modal(document.getElementById('myModal'))
            myModal.show()
            if (document.getElementById('update')) {
                if (document.getElementById('update')) {
                    document.getElementById('update').classList.remove('d-none')
                    document.getElementById('crear').classList.add('d-none');
                }
            }
        })
    });

    document.getElementById("crear").addEventListener("click", () => {
        let nombre_producto = document.getElementById('nombre_producto').value
        let referencia = document.getElementById('referencia').value
        let precio = document.getElementById('precio').value
        let peso = document.getElementById('peso').value
        let categoria = document.getElementById('categoria').value
        let stock = document.getElementById('stock').value
        fetch('http://localhost/prueba/products/create', {
            method: 'POST',
            body: JSON.stringify({
                nombre_producto,
                referencia,
                precio,
                peso,
                categoria,
                stock
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        }).then(function(response) {
            return response.json()
        }).then(function(data) {
            console.log(data)
        })
        location.reload();
    })
</script>


</html>