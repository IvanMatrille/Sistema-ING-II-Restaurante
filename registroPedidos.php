<?php require 'consultasBD/Conexion.php'; ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Facturacion</title>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet"
                href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
                crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="css/EstiloPrincipal.css"></head>
            <!-- jQuery library -->

            <!-- Latest compiled JavaScript -->
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
    </style>
        </head>
        <body>
            <?php include 'BarraNavegacion.php'; ?>
            <div class="container" style="margin:20px;border: solid black 1px;
                border-radius:10px; margin:auto; float:left; margin-right:50px">
                <form class="form-" action="registrarPedido.php" method="get"
                    onsubmit="">
                    <div class="form-group">
                        <label for="" style="font-size:15px">num pedido:</label>
                        <input style="float:left" readonly type="number"
                            class="form-control" id="idPedido"
                            name="numeroDelPedido">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-size:15px">mesero:</label>
                        <input style="float:left" readonly type="number"
                            class="form-control" id="idMesero" name="idMesero">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-size:15px">fecha:</label>
                        <input id="fecha" readonly style="float:left"
                            class="form-control" id="idFecha" name="fecha">
                    </div>
                    <br>
                    <label for="email">Mesa numero:</label>
                    <select id="mesasExistentes" class="form-control"
                        name="idMesa">
                        <?php
                            $query="SELECT * FROM mesa" ;
                            $sql= mysqli_query($Conexion,$query);
                            $valor= 0;
                            while ($row= $sql->fetch_assoc())
                            {
                            echo "<option value=\" $valor\">" . $row['id'] ."</option>";
                            $valor++;
                            }
                            ?>
                        </select>
                        <br>
                        <?php $precio= 0;?>
                            <label>Menu:</label>
                            <div>
                                <select style="" class="form-control vacia"
                                    id="listaProducto" class="selectpicker"
                                    name="producto">
                                    <?php
                                        $valor= 0;
                                        $idProducto= [];
                                        $totalID=1;

                                        $query="SELECT DISTINCT id,nombre,precio
                                        FROM producto" ;
                                        $sql= mysqli_query($Conexion,$query);
                                        while ($row= $sql->fetch_assoc())
                                        {
                                        echo "<option value=\" $row[id]\">" .
                                            $row['nombre'] .' '. '$'
                                            .$row['precio'] ."</option>";
                                        $valor++;
                                        }

                                        $query = "SELECT MAX(id) as MAX FROM
                                        pedido";
                                        $sql = mysqli_query($Conexion,$query);
                                        $filas = $sql->num_rows;

                                        if( $filas > 0)
                                        {
                                        while ($row = $sql->fetch_assoc())
                                        {
                                        $totalID = $row[MAX]+1;
                                        }
                                        }
                                        else
                                        {
                                        $totalID = 1;
                                        }
                                        echo" <script> $('#idPedido').val($totalID); </script>";
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Cantidad:</label>
                                    <input type="number" class="form-control"
                                        id="cantidad" value="1">
                                </div>
                                <br>
                                <input id="btnAgregar" type="button"
                                    class="add-row btn btn-primary"
                                    value="Agregar">
                                <button id="btnEnviar" type="submit" class="btn
                                    btn-success">Enviar Pedido</button>
                                <br><br>
                                <div class="container" style="width: 100%;
                                    border: solid black 1px; border-radius:10px;
                                    margin:auto; float:left;">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Borrar</th>
                                                <th>referencia</th>
                                                <th>Plato</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-striped">
                                        </tbody>
                                        <input readonly hidden name='articulos'
                                            id="totalArticulos" />
                                    </table>
                                    <div class="form-group">
                                        <button type="button" class="delete-row
                                            btn btn-primary">Borrar Item</button>
                                    </div>
                                </div>
                                <div>
                                </form>
                            </div>
                            <script
                                src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                                crossorigin="anonymous"></script>
                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                                crossorigin="anonymous"></script>
                            <script
                                src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                                crossorigin="anonymous"></script>
                        </body>

                        <script type="text/javascript">
     var contador = 0;
     var mesa;
     var totalArticulosOrdenados = 0;
     $("#mesasExistentes option:selected").selectedIndex = 0;

    $(document).ready(function () {
        $(".add-row").click(function () {
            var idProducto = $("#listaProducto option:selected").attr('value');
            var nombrePlato = $("#listaProducto option:selected").text();
            var cantidad = $("#cantidad").val();
            mesa =  $("#mesasExistentes option:selected").text();
            var yaExiste = false;
           $("#mesasExistentes").attr("value",mesa);
            if( $("#table tr").length <=1)
            {
                markup = ` <td><input type="checkbox"</td>
                      <td><input class="form-control" type="text" readonly name="fila${contador}[id]" value="${idProducto}"></td>
                      <td><input class="form-control" type="text" readonly name="fila${contador}[nombrePlato]" value="${nombrePlato}"></td>
                      <td><input class="form-control" type="text" readonly name="fila${contador}[cantidad]" value="${cantidad}"></td>`;
               
                let fila = $("<tr>").html(markup);
                $("#table").append(fila);
                contador++;
                totalArticulosOrdenados++;
                document.getElementById("btnEnviar").disabled = false;
                $("#btnEnviar").attr("enabled","true");
            }
            else
            {
                for( var i = 1; i <= totalArticulosOrdenados; i++)
                {
                    if( $("#listaProducto option:selected").attr('value') == $(`#table tr:eq(${i}) input:eq(1)`).val())
                    {
                        yaExiste = true;
                    }
                }
                if (!yaExiste)
                { 
                    markup = ` <td><input type="checkbox"</td>
                      <td><input class="form-control" type="text" readonly name="fila${contador}[id]" value="${idProducto}"></td>
                      <td><input class="form-control" type="text" readonly name="fila${contador}[nombrePlato]" value="${nombrePlato}"></td>
                      <td><input class="form-control" type="text" readonly name="fila${contador}[cantidad]" value="${cantidad}"></td>`;
               
               
                let fila = $("<tr>").html(markup);
                $("#table").append(fila);
                contador++;
                totalArticulosOrdenados++;
                document.getElementById("btnEnviar").disabled = false;
                $("#btnEnviar").attr("enabled","true");
             
                }
            }
            var valor = parseInt(cantidad);
            var valorExiste = false;
            var indice = 0;

            if (cantidad != "" && valor > 0) {

            }
            else if (valor < 1) {
                alert("La cantidad no puede ser negativa ni cero")
            }
            else if (cantidad == "") {
                alert("Digite una cantidad");
                $("#cantidad").focus();
            }
        });

        // Find and remove selected table rows
        $(".delete-row").click(function () {
            $("table tbody").find('input').each(function () {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });
    });

    $("#btnEnviar").on('click',function(){
       $("#totalArticulos").attr("value",totalArticulosOrdenados);

   });

    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var output = d.getFullYear() + '/' +
        (month < 10 ? '0' : '') + month + '/' +
        (day < 10 ? '0' : '') + day;

    $("#fecha").val(output);
    $("#btnEnviar").attr("disabled","true");
</script>
                    </html>