<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Facturacion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/EstiloPrincipal.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
  <div id="facturacion">
    <a class="navbar-brand active" href="#">Facturacion y Restaurante</a>
  </div>

  <?php include 'BarraNavegacion.html'; ?>
  <!--CAROUSEL-->
  <div id="carouselExampleIndicators" class="container carousel slide" data-interval="5000" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="imagen d-block w-100" src="Resources/plato1.jpg" alt="Primer Plato">

      </div>
      <div class="carousel-item">
        <img class="imagen d-block w-100" src="Resources/plato2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="imagen d-block w-100" src="Resources/plato3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <div id="contenido" class="contenido row" style="margin-top:20px;text-align:center;">
    <div class="col">
      <h2>Platos del Dia</h2>
      <a href="Platos.php">
        <img src="Resources/plato1.jpg" class="imagenRedonda" heigth="200px" width="200px" title="Platos del dia" />
        <p>Tenemos los mejores platos del pais al mejor precio.</p>
      </a>
    </div>
    <div class="col">
      <h2>Reservaciones</h2>
      <a href="Reservaciones.php">
        <img src="Resources/reservacion.jpg" class="imagenRedonda" heigth="200px" width="200px" title="Reservaciones" />
        <p>Haga sus reservaciones a tiempo.</p>
      </a>
    </div>
    <div class="col">
      <h2>Facturación</h2>
      <a href="Facturacion.php">
        <img src="Resources/plato1.jpg" class="imagenRedonda" heigth="200px" width="200px" title="Facturación" />
        <p>Facturacion de servicios.</p>
    </div>
  </div>
  <div class="footer">
    <div class="row">
      <div class="col">
        <h2></h2>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
</body>

</html>