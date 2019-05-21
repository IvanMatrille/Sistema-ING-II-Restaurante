<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/EstiloPrincipal.css">
    <link rel="stylesheet" type="text/css" href="css/Registros.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<body>
    <?php include 'BarraNavegacion.html'; ?>
    <div class="divModulo">
        <h4>Reservaciones de mesa</h4>
    </div>
    <div class="container col-md-6">
        <div class="card">
            <div class="card-body">
                <label for="">Cliente </label>
                <div class="input-group ">
                    <input type="text" id="idCliente" class="form-control" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-success" id="btnCliente" data-toggle="modal" data-target="#modalCliente">Buscar</button>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-sm thReservacion">
                        <tr>
                            <th>Nombre</th>
                            <td id="tdNombre">
                                <!-- JS -->
                            </td>
                        </tr>
                        <tr>
                            <th>Apellido</th>
                            <td id="tdApellido">
                                <!-- JS -->
                            </td>
                        </tr>
                        <tr>
                            <th>Cedula</th>
                            <td id="tdCedula">
                                <!-- JS -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <label for="">Mesa</label>
                <div class="input-group">
                    <input type="text" id="idMesa" class="form-control" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-success" id="btnMesa" data-toggle="modal" data-target="#modalMesa">Buscar</button>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-sm thReservacion">
                        <tr>
                            <th>Descripcion</th>
                            <td id="tdDescripcion">
                                <!-- JS -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <label for="">Fecha </label>
                <div class="input-group">
                    <input type="date" id="fecha" class="form-control">
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <label for="">Hora </label>
                <div class="input-group">
                    <select id="hora" class="form-control">
                        <!-- JS -->
                    </select>
                    <select id="tipo" class="form-control">
                        <option value="am">a.m.</option>
                        <option value="pm">p.m.</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="registrar mt-3 mb-3">
        <button id="btnRegistrar" class="btn btn-primary">Registrar</button>
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
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
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

    <div class="modal fade" id="modalMesa" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Seleccionar una mesa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <th>Descripcion</th>
                            <th>Accion</th>
                        </thead>
                        <tbody id="tbodyMesas">
                            <!-- JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="js/reservaciones.js"> </script>
</body>

</html>