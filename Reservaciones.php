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
    <div class="row ml-2 mr-2">
        <div class="col-md-4">
            <div class="row">
                <label for="">Cliente </label>
                <div class="input-group">
                    <input type="text" id="idCliente" class="form-control" readonly>
                    <button class="btn btn-success" data-toggle="modal" data-target="#modalCliente">Buscar</button>
                </div>
            </div>
            <div class="row mt-2">
                <table class="table table-sm thReservacion">
                    <tr>
                        <th >Nombre</th>
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
        <div class="col-md-4">
            <label for="">Mesa</label>
            <div class="input-group">
                <input type="text" id="idMesa" class="form-control" readonly>
                <button class="btn btn-success">Buscar</button>
            </div>
        </div>
        <div class="col-md-4">
            <label for="">Fecha </label>
            <div class="input-group">
                <input type="date" id="fecha" class="form-control">
                <button class="btn btn-success">Buscar</button>
            </div>
        </div>
    </div>
    
    <div class="row mt-3 ml-2 mr-2">
        <div class="col">
            <form action="BD/Reservacion/registroReservacion" method="POST">
                <button class="btn btn-primary">Registrar</button>
                <button class="btn btn-danger">Cancelar</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Busqueda de clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="js/reservaciones.js"> </script>
</body>

</html>