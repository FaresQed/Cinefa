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
        </div>
      </div>
    </nav>

  <!-- BODY -->
  <div class="container">

  <?php

require 'connectmysql.php';

if(isset($_GET['idOfMovie'])){
    
  $movie_id = $_GET['idOfMovie'];

  $sqlmoviedetail  = 
 'SELECT *, Actors.name AS "act_name"
  FROM `Plays_in` 
  INNER JOIN `Movies` ON `Plays_in`.`#id_movie` = `Movies`.`id_movie` 
  INNER JOIN `Actors` ON `Plays_in`.`#id_actor` = `Actors`.`id_actor` 
  WHERE id_movie ='. $movie_id;

  $sqlmoviedirector = 
 'SELECT *, Directors.name AS "dir_name" 
  FROM `Movies` 
  INNER JOIN `Directors` ON `Movies`.`#id_director` = `Directors`.`id_director`
  WHERE id_movie ='. $movie_id;

  $select_movie_id = mysqli_query($db_handle, $sqlmoviedetail);
  $select_movie_director = mysqli_query($db_handle, $sqlmoviedirector);
  $select_movie_while = mysqli_query($db_handle, $sqlmoviedetail);

  $movie = mysqli_fetch_assoc($select_movie_id);

  echo '
  <div class="jumbotron my-4">
    <center>
      <h1 class="display-3">'. $movie['title'].'</h1>
      <img src="'. $movie['cover'].'" width="50%" height="80%">
    </center>
  </div>
  <div class="jumbotron my-4">
      <p class="lead"> Sortie le : '. $movie['release_date'].'</p>';
      echo '<p class="lead">'. $movie['synopsis'].'</p>';

  echo '<p class="lead"> Casting : ';
  while($movie_while = mysqli_fetch_assoc($select_movie_while)){
    echo '<pre><a href="actor_detail.php?idOfActor='.$movie_while['id_actor'].'">'.$movie_while['act_name'].'</a></pre>';
  }
  echo '</p>';
  echo '<p class="lead"> Réalisateurs: ';
  while($director = mysqli_fetch_assoc($select_movie_director)){
    echo '<pre><a href="director_detail.php?idOfdirector='.$director['id_director'].'">'.$director['dir_name'].'</a></pre>';
  }
  echo '</div>';
}
echo '<div class="jumbotron my-4">
    <center>
      <iframe width="560" height="315" src="'. $movie['bo'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </center>
  </div>'

?>

  </div>

  <!-- Footer -->
  <footer class="py-5 bg-light">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; Cinefa</p>
    </div>
  </footer>

  <!-- Bootstrap / JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>