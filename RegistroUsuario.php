<?php
require_once 'consultasBD/Conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/EstiloPrincipal.css">
</head>

<body>
    <?php include 'BarraNavegacion.php'; ?>

    <!--FORMULARIO DE REGISTRO DE USUARIOS-->
    <div class="container div-registrousuario">
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <div class="form-group">
                <label for="">Nombre</label>
                <input id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <input id="txtApellido" name="txtApellido" type="text" placeholder="Apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Usuario</label>
                <input id="txtUsuario" name="txtUsuario" type="text" placeholder="Apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Rol de Usuario</label>
                <select id="txtRol" name="txtRol" class="form-control">
                    <option>Administrador</option>
                    <option>Gerente</option>
                    <option>Cocinero</option>
                    <option>Mesero</option>
                    <option>Cajero</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Contrasena</label>
                <input id="txtContrasena" name="txtContrasena" type="password" placeholder="Apellido" class="form-control" required>
            </div>
            <div>
                <button type="submit" data-dismiss="#miModal" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                <button type="button" id="btnModal" class="btn btn-success" data-toggle="modal" data-target="#listadoUsuarioModal">Listado de Usuarios</button>
            </div>
        </form>
    </div>


    <div class="modal fade" id="listadoUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listado de Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tablaUsuario" class="table " cellspacing="0" width="100%" name="tablaUsuario">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryUsr = "SELECT * FROM Usuario";
                            $resultado = mysqli_query($Conexion, $queryUsr);
                            while ($row = $resultado->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['Id'] . "</td>";
                                echo "<td>" . $row['Nombre'] . "</td>";
                                echo "<td>" . $row['Apellido'] . "</td>";
                                echo "<td>" . $row['NombreUsuario'] . "</td>";
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

    <?php
    if (isset($_POST['submit'])) {
        $nombre = filter_input(INPUT_POST, 'txtNombre');
        $apellido = filter_input(INPUT_POST, 'txtApellido');
        $usuario = filter_input(INPUT_POST, 'txtUsuario');
        $contrasena = filter_input(INPUT_POST, 'txtContrasena');
        $rol = filter_input(INPUT_POST, "txtRol");

        $query = "INSERT INTO Usuario(Nombre,Apellido,NombreUsuario,RolUsuario,Contrasena)VALUES('$nombre','$apellido','$usuario','$rol,','$contrasena')";
        $insertar = mysqli_query($Conexion, $query);

        if ($insertar) {
            echo "<script>alert('Datos guardados correctamente.');</script>";
        } else {
            echo "<script>alert('Error al intentar guardar los datos.');</script>" . mysqli_error($Conexion);
        }
    }

    ?>
    <!--PARA FUTURO-->
    <!--<div id="contenedorTabla" class="contenedorTabla container">
    <table id="table" class="table table-bordered table-hovered">
            <thead>
                    <tr>
                        <th>Id</th>    
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Rol</th>
                    </tr>
                </th>
            </thead>
            <tbody>
                <?php
                require_once 'consultasBD/Conexion.php';
                $queryUsr = "SELECT * FROM Usuario";
                $resultado = mysqli_query($Conexion, $queryUsr);
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Id'] . "</td>";
                    echo "<td>" . $row['Nombre'] . "</td>";
                    echo "<td>" . $row['Apellido'] . "</td>";
                    echo "<td>" . $row['RolUsuario'] . "</td>";
                    echo "<td><input id='btnEditar' type='submit' value='Editar' class='btnEditar btn btn-warning' onClick='Editar()'/></td>";
                    echo "<td><input id='btnEliminar' type='submit' value='Eliminar' class='btnEliminar btn btn-danger' onClick='Editar()'/></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/registroUsuario.js"></script>
</body>

</html>