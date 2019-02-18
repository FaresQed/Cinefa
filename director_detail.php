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
              <a class="nav-link" href="#">Acteurs</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Réalisateurs</a>
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

  <!-- BODY -->
  <div class="container">

<?php

function gender($sql){
    if($sql == 'M'){ 
        return 'Masculin';
    }else if($sql == 'F'){
        return 'Féminin';
    }
}

require 'connectmysql.php';

if(isset($_GET['idOfdirector'])){
    
  $director_id = $_GET['idOfdirector'];
  

  $sql_director_detail = 'SELECT * FROM Directors WHERE id_director ='. $director_id;
  $sql_director_movie  = 
 'SELECT *
  FROM `Movies` 
  INNER JOIN `Directors` ON `Movies`.`#id_director` = `Directors`.`id_director` 
  WHERE id_director ='. $director_id;


  $select_director_id = mysqli_query($db_handle, $sql_director_detail);
  $select_director_movie = mysqli_query($db_handle, $sql_director_movie);

  $director = mysqli_fetch_assoc($select_director_id);

  $director_gender = $director['gender'];


  echo '
  <div class="jumbotron my-4">
    <center>
      <h1 class="display-3">'. $director['name'].'</h1>
      <img src="'. $director['portrait'].'" width="50%" height="80%">
    </center>
  </div>
  <div class="jumbotron my-4">
      <p class="lead"> Age : '. $director['age'].' Ans </p>
      <p class="lead"> Sexe : '. gender($director_gender) .'</p>
      <p class="lead"> Films : <br>';
  while($director_movie = mysqli_fetch_assoc($select_director_movie)){
    echo '<a href="movie_detail.php?idOfMovie='.$director_movie["id_movie"].'"><img src="'.$director_movie['cover'].'" width="150vh"/><p>'.$director_movie['title'].'</p></a>';
  }
  echo '</p>';
  echo '</div>';
}
  
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