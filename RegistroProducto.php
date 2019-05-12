<?php require_once 'consultasBD/Conexion.php'; ?>

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
</head>
</head>

<body>
    <?php include 'BarraNavegacion.php'; ?>
    <!-- Modal -->
    <div class="modal fade" id="listadoProdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listado Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Listado de Productos</h2>
                    <table id="tablaProductos" class="table" cellspacing="0" width="100%" name="tableListadoProductos">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>ITBIS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryUsr = "SELECT * FROM Producto";
                            $resultado = mysqli_query($Conexion, $queryUsr);
                            while ($row = $resultado->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['Id'] . "</td>";
                                echo "<td>" . $row['Nombre'] . "</td>";
                                echo "<td>" . $row['Precio'] . "</td>";
                                echo "<td>" . $row['ITBIS'] . "</td>";
                                //echo "<td><input id='btnEditar' type='submit' value='Editar' class='btnEditar btn btn-warning' onClick='Editar()'/></td>";
                                //echo "<td><input id='btnEliminar' type='submit' value='Eliminar' class='btnEliminar btn btn-danger' onClick='Editar()'/></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--FORMULARIO DE REGISTRO DE-->
    <div class="container div-registroproducto">
        <h2>Registro de Productos</h2>
        <form action="<?php $_PHP_SELF ?>" method="POST" id="formRegistroProd">
            <div class="form-group">
                <label for="">Nombre</label>
                <input id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Referencia</label>
                <input id="txtReferencia" name="txtReferencia" type="text" placeholder="Referencia" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Categoria</label>
                <input id="txtCategoria" name="txtCategoria" type="text" placeholder="Categoria" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Cantidad Inicial</label>
                <input id="txtCantidadInicial" name="txtCantidadInicial" type="number" placeholder="Cantidad Inicial" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ubicacion</label>
                <input id="txtUbicacion" name="txtUbicacion" type="text" placeholder="Ubicacion" class="form-control">
            </div>
            <div class="form-group">
                <label for="">ITBIS</label>
                <input id="txtITBIS" name="txtITBIS" type="number" placeholder="ITBIS" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Costo </label>
                <input id="txtCosto" name="txtCosto" type="number" placeholder="Costo" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Precio Venta</label>
                <input id="txtPrecio" name="txtPrecio" type="number" placeholder="Precio" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                <button type="button" id="btnModal" class="btn btn-success" data-toggle="modal" data-target="#listadoProdModal">Listado de Productos</button>
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
                $nombre = filter_input(INPUT_POST, 'txtNombre');
                $referencia = filter_input(INPUT_POST, 'txtReferencia');
                $categoria = filter_input(INPUT_POST, 'txtCategoria');
                $cantidadInicial = filter_input(INPUT_POST, 'txtCantidadInicial');
                $ubicacion = filter_input(INPUT_POST, 'txtUbicacion');
                $ITBIS = filter_input(INPUT_POST, 'txtITBIS');
                $costo = filter_input(INPUT_POST, 'txtCosto');
                $precio = filter_input(INPUT_POST, 'txtPrecio');

                $query = "INSERT INTO Producto(Nombre,Referencia,Categoria,CantidadInicial,Ubicacion,ITBIS,Costo,Precio)VALUES('$nombre','$referencia','$categoria','$cantidadInicial','$ubicacion','$ITBIS','$costo','$precio')";
                $insertar = mysqli_query($Conexion, $query);

                if ($insertar) {
                        echo "<script>alert('Datos guardados correctamente.');</script>";
                    } else {
                        echo "<script>alert('Error al intentar guardar los datos.');</script>" . mysqli_error($Conexion);
                    }
            }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="js/registroProducto.js"></script>
</body>

</html>