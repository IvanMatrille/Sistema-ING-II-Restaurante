<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/EstiloPrincipal.css">
    <link rel="stylesheet" type="text/css" href="css/Registros.css">
</head>

<body>
    <?php include 'BarraNavegacion.html'; ?>

    <div class="divModulo">
        <h4>Facturar</h4>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Cajero/ra</label>
                        <select type="text" class="form-control" id="cajero">
                            <!-- JS -->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Mesa</label>
                        <select type="text" class="form-control" id="mesa">
                            <!-- JS -->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Mesero</label>
                        <select type="text" class="form-control" id="mesero">
                            <!-- JS -->
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3 table-responsive">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <button class="btn btn-outline-success" id="btnCliente" data-toggle="modal" data-target="#modalCliente">Buscar cliente</button>
                        </div>
                        <div class="mt-1">
                            <table class="table table-sm">
                                <thead>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="idCliente"></td>
                                        <td id="tdNombre"></td>
                                        <td id="tdApellido"></td>
                                        <td id="tdTelefono"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <div class="float-right mr-2">
                            <table class="thFacturacion">
                                <tr>
                                    <th>Propina RD$: </th>
                                    <td id="tdPropina"> </td>
                                </tr>
                                <tr>
                                    <th>Precio productos RD$: </th>
                                    <td id="tdPrecioProductos"></td>

                                    <th>Total RD$: </th>
                                    <td id="tdPrecioTotal"> </td>
                                </tr>
                            </table>
                        </div>
                        <button class="btn btn-outline-success" id="btnPlatos" data-toggle="modal" data-target="#modalPlatos">Agregar platos</button>
                        <table class="table table-sm mt-1" id="tablaVenta">
                            <thead>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio RD$</th>
                                <th>Total RD$</th>
                                <th>Accion</th>
                            </thead>
                            <tbody id="tbodyVenta">
                                <!-- JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-facturar mb-1">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
        </div>
    </div>

    <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Seleccionar el cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body table-responsive">
                    <input type="text" id="busquedaCliente" class="form-control mb-1" placeholder="Buscar" autocomplete="off">
                    <table class="table table-sm">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Accion</th>
                        </thead>
                        <tbody id="tbodyClientes">
                            <!-- JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalPlatos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar platos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
                <div class="modal-body table-responsive">
                    <div class="row">
                        <div class="col-md-8">
                        <input type="text" id="busquedaPlato" class="form-control mb-1" placeholder="Buscar" autocomplete="off">
                            </div>
                        <div class="col-md-4">
                            <input type="number" id="cantidad" class="form-control mb-1" placeholder="Cantidad" autocomplete="off">
                        </div>
                    </div>
                    <table class="table table-sm">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </thead>
                        <tbody id="tbodyPlatos">
                            <!-- JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/facturacion.js">
    </script>
</body>

</html>