<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
     <!--BARRA DE NAVEGACION-->
    <nav class="navbar navbar-expand-lg bg-white" >
        <a class="navbar-brand active" href="Index.php">Facturación y Restaurante</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="Index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Reservaciones.php">Reservaciones</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mantenimientos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="RegistroCliente.php">Registro de Cliente</a>
                    <a class="dropdown-item" href="RegistroProducto.php">Registro de Producto</a>
                    <a class="dropdown-item" href="RegistroMesa.php">Registro de Mesas</a>
                    <a class="dropdown-item" href="RegistroProducto.php">Registro Producto</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="RegistroUsuario.php">Registro Usuario</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Facturacion.php">Facturacion</a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pedidos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="registroPedidos.php">Registrar Pedidos</a>
          <a class="dropdown-item" href="modificarPedido.php">Modificar Pedidos</a>
          <a class="dropdown-item" href="consultarPedidos.php">Consultar Pedidos</a>
        </div>
      </li>
            </ul>
        </div>
    </nav>

    <!--FORMULARIO DE REGISTRO DE-->
    <div class="container div-registroreservaciones">

    <!--Modal de Busqueda-->
    <div class="modal" id="modalClientes">
          <div class="modal-dialog">
     <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Buscar Clientes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <table id="tablaClientes" class="table table-hover table-striped">
       <thead>
       <th>Id</th> 
       <th>Nombre</th> 
       <th>Telefono</th>
       <th>Cédula</th>   
       </thead>
       <tbody>
       
        <?php
             include 'Conexion.php';
             $dataRow = ""; 
             $resultado = "";
              $query = "SELECT Id,Nombre,Apellido,Telefono,Cedula FROM Cliente";
                
              $resultado = mysqli_query($Conexion,$query);
              while($row = mysqli_fetch_array($resultado)) {
                 
                echo " <tr>
                <td>". $row['Id'] ."</td>
                <td>". $row['Nombre'].' '.$row['Apellido']."</td>
                <td>". $row['Telefono']."</td>
                <td>". $row['Cedula']."</td>
                </tr>";
              }
        ?>
       </tbody>
       </table>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button id= "salirModal" type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<!--Modal de Busqueda Finalizado-->


<!--Modal de Busqueda de Mesas-->
<div class="modal" id="modalMesas">
          <div class="modal-dialog">
     <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Buscar Mesas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

<!-- Modal Mesa -->
<div class="modal-body">
       <table id="tablaMesas" class="table table-hover table-striped">
       <thead>
       <th>Id</th> 
       <th>Mesa</th> 
       </thead>
       <tbody>
       
        <?php
             include 'Conexion.php';
             $dataRow = ""; 
             $resultado = "";
              $query = "SELECT Id,descripcion FROM mesa";
                
              $resultado = mysqli_query($Conexion,$query);
              while($row = mysqli_fetch_array($resultado)) {
                 
                echo " <tr>
                <td>". $row['Id'] ."</td>
                <td>". $row['descripcion']."</td>
                </tr>
                
                ";
               
              }
        ?>


       </tbody>
       </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button id= "salirModalMesas" type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
      </div>

    </div>
  </div>
</div>

<!--Modal de Busqueda Finalizado-->

        <h2>Reservaciones</h2>
            <form class="form-group"  method="POST">
                <div>
                    <label for="">Codigo</label>
                    <input id="txtCodigo" name="txtCodigo" type="text" placeholder="Codigo" class="form-control" required>
                    <button type="button" class="btn btn-primary" id="btnCodigo"><i class="fas fa-search"></i>Buscar Cliente</button>
                </div>
                </br>
                <div style="margin-left: 25px;">
                    <label for="">Nombre:</label></br>
                    <label id="nombre" style="padding-left: 25px;" for="ref">-</label></br>

                    <label for="">Cedula:</label></br>
                    <label id="cedula" style="padding-left: 25px;" for="ref">-</label></br>

                    <label for="">Telefono:</label></br>
                    <label id="telefono" style="padding-left: 25px;" for="ref">-</label></br></br>
                </div>
                <div>
                    <label for="">Mesa No.</label>
                       
                    <input id="txtMesa" name="txtMesa" type="text" placeholder="Mesa" class="form-control" required>
                    <button type="button" class="btn btn-primary" id="btnCodigoMesas"><i class="fas fa-search"></i>Buscar Mesa</button>
                </div>
                </br>
                <div style="margin-left: 25px;">
                    <label for="">Mesa:</label></br>
                    <label id="mesa" style="padding-left: 25px;" for="ref">-</label></br>
                </div>
                <label for="">Para la Fecha?</label>
                <input id="txtFecha" name="txtFecha" type="date" placeholder="Fecha" class="form-control" required>
                </br>
                    <button id="enviar"  name="enviar" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Guardar</button>

            </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

<?php
    include 'Conexion.php'; 
    $hoy = getdate();
        if(isset($_POST["enviar"]))
        {
            $codigoCliente = $_POST["txtCodigo"];
            $MesaNo= $_POST["txtMesa"];
            $Fecha = $_POST["txtFecha"];
           
            $sql = "INSERT INTO reservaciones (codigo, mesa, fecha)
            VALUES ('$codigoCliente', '$MesaNo', '$Fecha')";

        if(validarCliente()==false){
            echo '<script>alert("Cliente no existe"); </script>';
        }else if(validarMesa()==false){
            echo '<script>alert("Mesa no existe"); </script>';
        }else if(validarFecha()==true){
            echo '<script>alert("Ya Existe una reservacion para esta mesa con esta fecha."); </script>';
        }else{
            $fecha_actual = strtotime(date("Y-m-d H:i:00",time()));
            $fecha_entrada = strtotime($Fecha);
            echo $fecha_actual;
            echo $fecha_entrada;
                if($fecha_actual > $fecha_entrada ){
                    echo "<script> alert('Fecha Seleccionada no puede ser menor que fecha actual!'); </script>";
                }else{      
                    if ($Conexion->query($sql)) {
                        echo "<script> alert('Registrado Correctamente'); </script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
        }


    function validarFecha(){
        
        include 'Conexion.php';
        $fecha = $_POST["txtFecha"];
        $idMesa = $_POST["txtMesa"];
        $existe = false;
        $fechaEnRegistro="";
        
       
        $dataRow = ""; 
        $resultado = "";
        $query =  "SELECT mesa,fecha FROM reservaciones WHERE mesa='$idMesa' AND fecha='$fecha'";
        $resultado = mysqli_query($Conexion,$query);
        while($row = mysqli_fetch_array($resultado)) { 
            $fechaEnRegistro = $row['fecha']; 
        }

        if($fechaEnRegistro==$fecha){
            $existe = true;
        }
        
        
        return $existe;   
    }

    function validarCliente(){
        include 'Conexion.php';

        $id = $_POST["txtCodigo"];
        
        $fechaEnRegistro="";
        $existe = false;
        
        $dataRow = ""; 
        $resultado = "";
        $query =  "SELECT id FROM cliente WHERE id='$id'";
        $resultado = mysqli_query($Conexion,$query);
        while($row = mysqli_fetch_array($resultado)) { 
            if($id==$row['id']){
                $existe=true;
            }
        }
        return $existe;   
    }


    function validarMesa(){
        include 'Conexion.php';

        $id = $_POST["txtMesa"];
        $fechaEnRegistro="";
        $existe = false;
       
        $dataRow = "";
        $resultado = "";
        $query =  "SELECT id FROM mesa WHERE id='$id'";
        $resultado = mysqli_query($Conexion,$query);
        while($row = mysqli_fetch_array($resultado)) { 
            if($id==$row['id']){
                $existe=true;
            }
        }
        return $existe;   
    }
?>

<script type="text/javascript">

$(document).ready(function() {
    //Suscribir los elementos al manejo de eventos

    var pickedup = null;
    $( "#modalClientes tbody tr" ).on( "dblclick", function( event ) {
        if (pickedup != null) {
            pickedup.css( "background-color", "transparent" );
        }

        $("#nombre").text($(this).find("td").eq(1).html());
        $("#telefono").text($(this).find("td").eq(2).html());
        $("#cedula").text($(this).find("td").eq(3).html());
        $("#txtCodigo").val($(this).find("td").eq(0).html());
        // Si esta Seleccionado Pintar de Rojo
        $( this ).css( "background-color", "red" );

        pickedup = $( this );

        $('#modalClientes').modal('hide');
        $('#txtMesa').focus();
    });

    $( "#modalMesas tbody tr" ).on( "dblclick", function( event ) {
        if (pickedup != null) {
            pickedup.css( "background-color", "transparent" );
        }

        $("#mesa").text($(this).find("td").eq(1).html());
        $("#txtMesa").val($(this).find("td").eq(0).html());
        // Si esta Seleccionado Pintar de Rojo
        $(this).css( "background-color", "red" );

        pickedup = $( this );

        $('#modalMesas').modal('hide');
        $('#txtFecha').focus();
    });

    $('#txtCodigo').on('keyup', function(evento){
        if(evento.key.toUpperCase()==='F2'){     
            mostrarModal();
        }
        
    });
    $('#txtMesa').on('keyup', function(evento){
        if(evento.key.toUpperCase()==='F2'){     
            mostrarModalMesas();
        }
        
    });
    $('#btnCodigo').on('click', function(evento){
            mostrarModal("modalClientes");
    });
    $('#btnCodigoMesas').on('click', function(evento){
            mostrarModalMesas("modalMesas");
    });
    $( "#txtCodigo" ).focus(function(){
        $(this).attr('placeholder', "Codigo - Presione F2 para Buscar");
    });
    $( "#txtMesa" ).focus(function(){
        $(this).attr('placeholder', "Codigo - Presione F2 para Buscar");
    });
    $( "#txtCodigo" ).blur(function(){
        $(this).attr('placeholder', "Codigo");
    });
    $( "#txtMesa" ).blur(function(){
        $(this).attr('placeholder', "Codigo");
    });
    //Inicializar Tablas con DataTable
    $('#tablaClientes').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Lo Sentimos, no existen registros con los datos especificados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrados de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });

    $('#tablaMesas').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Lo Sentimos, no existen registros con los datos especificados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrados de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
    $('#txtCodigo').focus();
}); 
function mostrarModal(idModal='modalClientes'){
    $('#modalClientes').modal('show');
    $('#txtCodigo').blur();
    $('#modalClientes div.dataTables_filter input').focus();
}

function mostrarModalMesas(idModal='modalMesas'){
    $('#modalMesas').modal('show');
    $('#txtMesas').blur();
    $('#modalMesas div.dataTables_filter input').focus();
}
</script>
                

</html>