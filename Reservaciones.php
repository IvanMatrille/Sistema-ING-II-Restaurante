<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
                    <button class="btn btn-primary">Buscar</button>
                </div>
            </div>
            <div class="row mt-2">
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <td>Henry</td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td>Liriano</td>
                    </tr>
                    <tr>
                        <th>Cedula</th>
                        <td>402-255</td>
                    </tr>
                </table>
            </div>
            
        </div>
        <div class="col-md-4">
            <label for="">Mesas </label>
            <div class="input-group">
                <input type="text" id="idMesa" class="form-control" readonly>
                <button class="btn btn-primary">Buscar</button>
            </div>
        </div>
        <div class="col-md-4">
            <label for="">Fecha </label>
            <div class="input-group">
                <input type="date" id="fecha" class="form-control">
                <button class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
</body>

</html>