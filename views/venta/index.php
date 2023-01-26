<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta autor="Kevin Revelo" description="cafeteria prueba para Konecta">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Venta Cafeteria</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg d-flex justify-content-around">

            <div>
                <a class="navbar-brand" href="">Cafeteria</a>
            </div>
            <div>
                <button class="btn btn-success btn-md" id="nueva_venta">Nueva venta</button>
            </div>

        </nav>
        <table class="table table-hover  ">
            <tr>
                <th>id</th>
                <th>nombre producto</th>
                <th>cantidad</th>


                <?php foreach ($ventas as $venta) : ?>
            <tr>
                <td><?php echo $venta->id_venta; ?></td>
                <td><?php echo $venta->id_producto; ?></td>
                <td><?php echo $venta->cantidad; ?></td>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">nueva venta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row">
                            <div class="col-7">
                                <label for="" class="form-label">nombre producto</label>
                                <label for="validationCustom04" class="form-label">State</label>
                                <select class="form-select" required>
                                    <option value="">Elige el producto</option>
                                    </option>
                                    <option>nueva venta</option>
                                    <option>otra venta</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="" class="form-label">cantidad</label>
                                <div class="input-group">
                                    <span class="input-group-text">#</span>
                                    <input type="number" class="form-control " id="referencia" name="referencia" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="update" class="btn btn-success" data-bs-dismiss="modal">Vender</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    document.getElementById('nueva_venta').addEventListener("click", () => {
        const myModal = new bootstrap.Modal(document.getElementById('myModal'))
        myModal.show();
    })
</script>

</html>