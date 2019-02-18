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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Films</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actors.php">Acteurs</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="directors.php">Réalisateurs</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my-account.php">Mon Compte
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <div class="container">

    <header class="jumbotron my-4">
    </header>

    <!-- BODY -->
    <div class="row text-center">

<?php

require 'connectmysql.php';

while($director = mysqli_fetch_assoc($director_result)) {
echo '
<div class="col-lg-3 col-md-6 mb-4">
  <div class="card h-100">
  <img class="card-img-top portrait" src="' . $director['portrait'] . '" height="200px" alt="">
    <div class="card-body">
    <h4 class="card-title">' . $director["name"] .'</h4>
    </div>
    <div class="card-footer">
      <a href="director_detail.php?idOfdirector='. $director['id_director'] .'" class="btn btn-primary">En savoir plus</a>
    </div>
  </div>
</div>
';
}

mysqli_free_result($director_result);
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

</body>
</html>
