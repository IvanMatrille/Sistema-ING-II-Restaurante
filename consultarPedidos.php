<?php
//header('Location:Meseros.php');
//die();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Facturacion</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <style type="text/css">
    * {
      font-size: 20px;
    }

    select,
    input[type="text"] {
      font-size: 20px;
    }

    .form-group {
      width: 20%;
    }

    #btnEnviar {
      background-color: red;
    }

    #descripcion span {
      margin-left: 30px;
    }

    th,
    tr,
    td {}
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"></a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="registroPedidos">Inicio</a></li>
          <li><a href="consultarPedidos.php">Consultar Pedidos</a></li>
          <li><a href="crearProducto.php">Registrar Producto</a></li>
          <li><a href="#">Ver Estado Pedidos</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <div>

    <div class="container" style="width: 100%; height: 60%; border: solid black 1px;  border-radius:10px; margin:auto; float:left; margin-right:50px">
      <form action="consultarPedidos.php" method="get" onsubmit="">
        <div class="form-group">
          <label for="" style="font-size:15px">mesero:</label>
          <input style="float:left" disabled type="number" class="form-control" id="idMesero" name="idMesero">
        </div>
        <div class="form-group">
          <label for="" style="font-size:15px">fecha:</label>
          <input id="fecha" style="float:left" disabled class="form-control" id="idFecha" name="fecha">
        </div>
        <br>

        <div class="form-group">
          <h4>Digite el numero del pedido</h4>
          <input id="numeroPedido" required style="float:left" placeholder="pedido a consultar" class="form-control" name="numeroPedido">
        </div>
        <br>
        <br>
        <div class="form-group">
          <button onclick="mostrarPedido()" class="btn btn-primary" id="buscar">Ver pedido </button>
          <button class="btn btn-primary" id="mostrarPedidos">Ver todos Los Pedidos </button>
        </div>
        <div class="container" style="width: 100%; border: solid black 1px;  border-radius:10px; margin:auto; float:left;">


          <table id="table2" class="table">
            <thead>
              <tr>
                <th class="col">Pedido</th>
                <th class="col">Descripcion</th>
              </tr>
            </thead>
            <tbody table-striped name="asdad">
              <tr>

                <?php
                if (isset($_GET['numeroPedido'])) {
                  $numeroPedido = $_GET['numeroPedido'];
                }

                include 'Conexion.php';

                $query2 = "SELECT  * FROM pedido";
                $sql = mysqli_query($Conexion, $query2);
                while ($row = $sql->fetch_assoc()) {

                  echo "<tr> <td>  $row[id] </td>   <td> $row[descripcion] </td>    <tr> ";
                }
                ?>
              </tr>


            </tbody>
          </table>
        </div>

        <br>

        <div id="table" class="container" style="width: 100%; border: solid black 1px;  border-radius:10px; margin:auto; float:left;">
          <table class="table">
            <thead>
              <tr>
                <th class="col">idPedido</th>
                <th class="col">Mesa</th>
                <th>Nombre del plato</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody table-striped name="asdad">
              <tr>
                <?php
                if (isset($_GET['numeroPedido'])) {
                  $numeroPedido = $_GET['numeroPedido'];
                }

                include 'Conexion.php';

                if (!empty($numeroPedido)) {
                  $query = "SELECT  dp.id,dp.idMesa,pr.Nombre,dp.cantidad FROM detallesPedido AS dp INNER JOIN producto as pr ON pr.id = dp.idPlato WHERE dp.id = $numeroPedido";
                  $sql = mysqli_query($Conexion, $query);
                  if ($sql->num_rows < 1)
                    echo "<script> alert('pedido no encontrado');</script>";
                  while ($row = $sql->fetch_assoc()) {

                    echo "<tr> <td>  $row[id] </td>   <td> $row[idMesa] </td>  <td> $row[Nombre] </td>  <td> $row[cantidad] </td>  <tr> ";
                  }
                }
                ?>
              </tr>
            </tbody>
          </table>
        </div>
        <div>
      </form>
    </div>
</body>
<script type="text/javascript">
  )
  var d = new Date();
  var month = d.getMonth() + 1;
  var day = d.getDate();
  var output = d.getFullYear() + '/' +
    (month < 10 ? '0' : '') + month + '/' +
    (day < 10 ? '0' : '') + day;

  $("#fecha").val(output);
  $("#numeroPedido").focus();
</script>

</html>