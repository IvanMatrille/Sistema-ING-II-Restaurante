<?php

function BarraNavegacion()
{
        echo ' <nav class="navbar navbar-expand-lg bg-white" >
    <a class="navbar-brand active" href="Index.php">Facturacion y Restaurante</a>
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
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="RegistroUsuario.php">Registro Usuario</a>
            </div>
        </li>
        </ul>
    </div>
    </nav>'; 
}


function Footer()
{
        echo '  <footer class="footer">
    <!-- Footer -->
    <div class="footer">
        <div class="container">
        <div class="row">
            <div class="col">
                <h5>Redes Sociales</h5>
                <p><i class="fas fa-twitter">Twitter</i></p>
                <p><i class="fas fa-facebook-official">Facebook</i></p>
            </div>
            <div class="col">
                <h2></h2>
            </div>
            <div class="col">
                <h2></h2> 
            </div>
        </div>
        </div>
    </div>
    </footer>';
}
