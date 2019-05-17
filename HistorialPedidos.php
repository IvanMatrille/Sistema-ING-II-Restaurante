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
    <?php include 'BarraNavegacion.html'; ?>
    <div class="divModulo">
        <h4>Pedidos</h4>
    </div>
    <div class="divModulo row mb-1 ml-4 mr-4">
        <input type="text" id="busqueda" class="form-control" placeholder="Buscar pedido" autocomplete="off">
    </div>

    <table class="table table-sm">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>ID</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="tbodyPedidos">
            <!-- Generado por js -->
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/historialPedidos.js"></script>
</body>

</html>