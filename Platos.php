<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Registros.css">
    <link rel="stylesheet" href="css/EstiloPrincipal.css">
</head>

<body>
    <?php include 'BarraNavegacion.html';?>
    <main class="container-fluid">
        <div class="divModulo">
            <h4>Platos o productos de servicio</h4>
        </div>
        <div class="divModulo row my-1">
            <div class="col-md-6 form-group">
                <input type="text" id="busqueda" class="form-control" placeholder="Buscar" autocomplete="off">
            </div>
            <div class="col-auto">

                <button class="btn btn-primary" id="btnNuevo" data-toggle="modal"
                    data-target="#modalRegistro">Nuevo</button>
            </div>
        </div>

        <div class="col-md-12 table-responsive">

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicacion</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody id="tbodyPlatos">
                    <!-- Generado por js -->
                </tbody>
            </table>
        </div>
    </main>
    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro del plato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="frmRegistro">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="txtID" id="txtID">
                            <div class="col-md-6">
                                <label for="">Nombre</label>
                                <input id="txtNombre" name="txtNombre" required type="text" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="">Cantidad</label>
                                <input id="txtCantidad" name="txtCantidad" required type="text" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="">Ubicacion</label>
                                <input id="txtUbicacion" name="txtUbicacion" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="">ITBIS</label>
                                <input id="txtITBIS" name="txtITBIS" type="number" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Costo</label>
                                <input id="txtCosto" name="txtCosto" type="number" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Precio</label>
                                <input id="txtPrecio" name="txtPrecio" required type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="js/plato.js"></script>
</body>

</html>