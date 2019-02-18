<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cinefa</title>

  <link rel="stylesheet" href="./css/style.css">
  <!-- Bootstrap CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap /JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="./assets/CINEFA-logo.png" width="120px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Films</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actors.php">Acteurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="directors.php">Réalisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my-account.php">Mon Compte
              </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" autocomplete="off" id="myinput" onkeyup="searchFunction()" placeholder="Chercher un film" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
          </form>
        </div>
      </div>
    </nav>

  <div class="container">

    <header class="jumbotron my-4">
      <h1 class="display-3">Les Films à l'affiche</h1>
      <p class="lead">Retrouvez sur toutes les dernières sorties . </p>
    </header>

    <!-- BODY -->
  <div class="row text-center">

<?php

require 'connectmysql.php';

while($movie = mysqli_fetch_assoc($movie_result)) {
echo '
<ul class="col-lg-3 col-md-6 mb-4" id="wrapper">
  <div class="card h-100">
  <img class="card-img-top" src="' . $movie['cover'] . '" height="325vh" alt="">
    <div class="card-body">
    <li class="card-title">' . $movie["title"] .'</li>
      <p class="card-text">Sortie le : '. $movie['release_date'] .'</p>
    </div>
    <div class="card-footer">
      <a href="movie_detail.php?idOfMovie='. $movie['id_movie'] .'" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
</ul>
';
}

mysqli_free_result($movie_result);
mysqli_close($db_handle);

?>

    </div>
  </div>

  <!-- Footer -->
  <footer class="py-5 bg-light">
    <div class="container">
      <p class="m-0 text-center text-black">Copyright &copy; Cinefa</p>
    </div>
  </footer>

  <!-- Bootstrap / JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/javascript.js"></script>

</body>
</html>
