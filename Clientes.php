<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facturacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Registros.css">
    <link rel="stylesheet" href="css/EstiloPrincipal.css">
</head>

<body>
    <?php include 'BarraNavegacion.php'; ?>
    <div class="clientes">
        <h4>Clientes del restaurante</h4>
    </div>
    <div class="clientes row mb-1">
        <button class="btn btn-primary ml-1" id="btnNuevo" 
            data-toggle="modal" data-target="#modalRegistro">Nuevo</button>
    </div>

    <table class="table table-sm">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="tbodyClientes">
            <!-- Generado por js -->
        </tbody>
    </table>

    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro del cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="frmRegistro">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="txtID" id="txtID">
                            <div class="col-md-6">
                                <label for="">Nombre</label>
                                <input id="txtNombre" name="txtNombre" required type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Apellido</label>
                                <input id="txtApellido" name="txtApellido" required type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="">Cedula</label>
                                <input id="txtCedula" name="txtCedula" required type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Telefono</label>
                                <input id="txtTelefono" name="txtTelefono" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Email</label>
                            <input id="txtEmail" name="txtEmail" required type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <input id="txtDireccion" name="txtDireccion" required type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/cliente.js"></script>
</body>

</html>