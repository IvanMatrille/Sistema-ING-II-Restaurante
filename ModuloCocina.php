<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facturacion</title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
        <?php
        include "Conexion.php";
        ?>

    <header>
        <h2>Modulo de Cocina </h2>
    </header>
<form id="formulario">


       <h1 id="primero">Modulo de cocina, Facturacion Restaurante</h1>
  <div class="container" id="container">
  <h1>Consulta de Pedidos  </h1>
  <div class="row" id="raya">
       <div class="col-sm-12" id="Scroll">
           <table id="tabla" class="table table-hover table-condensed table-bordered">
        <thead>
        <tr>
          <th>Codigo</th>
          <th># Mesa</th>
          <th>Platos</th>
          <th>Mesero</th>
          <th>Estado del Plato</th>
        </tr>
      </thead>
           <tbody>
           <?php  
                    ?>
              
                </tbody>
            </table>             
       </div>
   </div> 
</div>

<div id="boton" class="col-md-8 col-md-offset-9">
    <div class="card">
        <div class="card-body">
        
        
        <td >
        <button class="btn btn-warning glyphicon glyphicon-eye-open" name="btnPedidos" id="btnPedidos"> Pedidos</button></td>
        <td><button class="btn btn-success glyphicon glyphicon-ok" id="Actualizar" > Terminado</button></td>
        
        </div>
    </div>
</div>
<hr>


</form>

<footer>
  <p>Footer Pies de Pagina</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

function iiid(e) {
  var result = [];
  
  $('tr').each(function(){
    var fila = [];
    $(this).find('td').each(function(){
      fila.push($(this).html());
    });
    result.push(fila.join());
  });
  return result;
}

$(function(){
  $('#Actualizar').click(function(){
    var data = Array(iiid());
    data.array.forEach(element => {
        alert(element);
    });
  });
});

$("").click(function()
{
    $(this).addClass('selected').siblings().removeClass('selected');
    var valor = $(this).find('td:first').html();
    alert(valor);
});


$('').on('click',function (e) {
    alert($("#tabla tr.selected td:all").html());
});


var tabla = document.getElementById("tabla");
var id = "";
var mesa = "";
var platos = "";
var mesero = "";
var estado = "";

for (let index = 0; index < tabla.rows.length; index++) 
{  
    tabla.rows[index].onclick = function () {
        id = this.cells[0].innerHTML;
        mesa = this.cells[1].innerHTML;
        plato = this.cells[2].innerHTML;
        mesero = this.cells[3].innerHTML;
        estado = this.cells[4].innerHTML;

        var url = "ModuloCocina.php";
        $.ajax({
            type:"POST",
            url:url,
            data : $("#formulario").serialize(),
            success : function (data) {
                alert(data);
            }
        });
    }
}
</script>
</body>
</html>