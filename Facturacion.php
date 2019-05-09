<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/EstiloPrincipal.css"></head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
            $query = "SELECT Id,nombre,apellido,telefono,cedula FROM cliente";
            
            $resultado = mysqli_query($Conexion,$query);
            while($row = mysqli_fetch_array($resultado)) {
                
            echo "<tr>
            <td>". $row['Id'] ."</td>
            <td>". $row['nombre'].' '.$row['apellido']."</td>
            <td>". $row['telefono']."</td>
            <td>". $row['cedula']."</td>
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

    <div class="container">
        <h2>Facturación</h2>
            <form class="form-group" action="<?php $_PHP_SELF?>" method="POST">
                <div style="border: solid 1px; padding: 5px;">
                    <label >Fecha: </label>
                    <input size="25%"   type="datetime" name="txtfecha"  value="<?php echo date("d-m-Y");?>">
                    <label >No. de Turno: </label>
                    <input    type="text" name="txtTurno" value="01">
                    <label >Cajera: </label>
                    <input size="25%"   type="text" name="txtTurno" value="Rosa Maria Burgos">
                </div>
                <br>
                <div style="border: solid 1px; padding: 5px; float: left;">
                    <label for="">Mesa No.</label>
                    <input size="25%" id="txtMesa" name="txtMesa" type="text" placeholder="Mesa" >
                    <button type="button" id="btnCodigoMesas" class="btn btn-primary fas fa-search"></button>

                        <label>Tipo de Comprovante.</label>
                        <select id="disabledSelect" >
                            <option>Consumidor Final</option>
                            <option>Valor Fiscal</option>
                            <option>Gubernamental</option>
                            <option>Regimenes Especiales</option>
                        </select>

                    <br>
                    <label for="">Mesero: </label>
                    <input size="25%"   type="text" name="txtmesero" value="Juan Rubiera">
                    <label id="numerocomprovante" style="margin-left:220px;" for="">B0200003736</label>
                    <br>
                    <br>
                    <br>
                    
                </div>
    
                <div >
                        <label style="margin-left:10px;" >Cliente.</label>
                        <input size="15%" id="txtCodigo" name="txtClienteCodigo" type="text" placeholder="Codigo" >
                        <button type="button" id="btnCodigo" class="btn btn-primary fas fa-search"></button>
                        <br>
                        <label id="nombre" style="margin-left:15px;">-</label><br>
                        <label style="margin-left:15px;">RNC.: </label>
                        <label id="cedula" style="margin-left:15px;" for="">-</label><br>
                        <label style="margin-left:15px;">Tel.: </label>
                        <label id="telefono" style="margin-left:15px;" for="">-</label>
                </div>

                <br>
                <div class="datagrid">
                    <div class="row">
                        <div style="border: solid;" class="col-sm-2">Codigo</div>
                        <div style="border: solid;" class="col-sm-6">Descripción</div>
                        <div style="border: solid;" class="col-sm-4">Precio $RD</div>
                    </div>
                    <div class="row">
                        <div style="border: solid 1px; text-align: left; " class="col-sm-2">1001</div>
                        <div style="border: solid 1px; text-align: left; " class="col-sm-6">Carne Asada</div>
                        <div style="border: solid 1px; text-align: right; " class="col-sm-4">495.00</div>
                    </div>
                    <div  class="row">
                        <div style="border: solid 1px; text-align: left; " class="col-sm-2">1002</div>
                        <div style="border: solid 1px; text-align: left; " class="col-sm-6">Pure de Papa</div>
                        <div style="border: solid 1px; text-align: right; " class="col-sm-4">250.00</div>
                    </div><br>
                    <div  class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                        <div style="text-align: right; " class="col-sm-4"> Total:</div>
                    </div>

                    <div  class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                        <div style="border: solid 1px; text-align: right;" class="col-sm-4">
                            <div>745.00</div>
                            <label>+10% Propina. 74.50</label><br>
                            <label>---------------------</label><br>
                            <label>RD$. 819.50</label>
                        </div>
                    </div>
                </div>


                <br>
                <br>

                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>Registrar</button>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-repeat"></i>Retornar</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i>Cancelar</button>
            </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
</body>

<script type="text/javascript">

$(document).ready(function() {
    //Suscribir los elementos al manejo de eventos
    
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
        //$('#txtMesa').focus();
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

var pickedup;

</script>

</html>