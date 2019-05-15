<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Registros.css">
    <link rel="stylesheet" href="css/EstiloPrincipal.css">
</head>

<body>
    <?php include 'BarraNavegacion.php'; ?>
    <div class="divModulo">
        <h4>Productos o servicios del restaurante</h4>
    </div>
    <div class="divModulo row mb-1">
        <button class="btn btn-primary ml-1" id="btnNuevo" data-toggle="modal" data-target="#modalRegistro">Nuevo</button>
    </div>

    <table class="table table-sm">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Referencia</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="tbodyProductos">
            <!-- Generado por js -->
        </tbody>
    </table>

    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro del producto</h5>
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
                                <input id="txtNombre" name="txtNombre" required type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Referencia</label>
                                <input id="txtReferencia" name="txtReferencia" required type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="">Categoria</label>
                                <input id="txtCategoria" name="txtCategoria" required type="text" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="">Cantidad Inicial</label>
                                <input id="txtCantidadInicial" name="txtCantidadInicial" required type="text" class="form-control">
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
                                <input id="txtITBIS" name="txtITBIS" required type="number" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Costo</label>
                                <input id="txtCosto" name="txtCosto" required type="number" class="form-control">
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/producto.js"></script>
</body>

</html>