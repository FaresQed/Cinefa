<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cinefa</title>

  <!-- Bootstrap CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap / JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Cinefa</a>
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
              <a class="nav-link" href="#">Acteurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Réalisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my-account.php">Mon Compte
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <!-- BODY -->
  <div class="container">

  <?php

require 'connectmysql.php';

if(isset($_GET['idOfMovie'])){
    
$movie_id = $_GET['idOfMovie'];

$sqlmovieid  = 'SELECT * FROM `Movies` WHERE id_movie ='. $movie_id;
$sqlplaysin  = 'SELECT * FROM  `Plays_in` FULL JOIN  Plays_in  ON Directors(id) = Plays_in(`#id_director`)';
$playsin_result = "SELECT * ROM  `Plays_in` FULL JOIN  Actors ON `Plays_in`.`#id_actor` = Actors.id_actor";

$select_playsin = mysqli_query($db_handle, $playsin_result);
$select_movie_id = mysqli_query($db_handle, $sqlmovieid);


    while($select_movie_id = mysqli_fetch_assoc($select_movie_id)) {
            echo '
        <div class="jumbotron my-4">
        <center>
            <h1 class="display-3">'. $select_movie_id['title'].'</h1>
            <img src="'. $select_movie_id['cover'].'" width="50%" height="80%">
        </center>
        </div>
        <div class="jumbotron my-4">
            <p class="lead">'. $select_movie_id['release_date'].'</p>
            <p class="lead">'. $select_movie_id['#id_director'].'</p>
            <p class="lead">'. $select_playsin['#id_director'].'</p>
            <p class="lead">'. $select_movie_id['synopsis'].'</p>
        </div>
        ';
    }
}

?>

  </div>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Cinefa</p>
    </div>
  </footer>

  <!-- Bootstrap / JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>