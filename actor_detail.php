<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="./assets/Cinefa-logo-black.png" />
  <link rel="stylesheet" href="./css/style.css">
  <!-- Bootstrap CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="./assets/CINEFA-logo.png" width="120px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Films</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="actors.php">Acteurs</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="directors.php">Réalisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my-account.php">Mon Compte
              </a>
            </li>
            <?php require 'cinession.php'; ?>
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

if(isset($_GET['idOfActor'])){
    
  $actor_id = $_GET['idOfActor'];
  

  $sql_actor_detail = 'SELECT * FROM Actors WHERE id_actor ='. $actor_id;
  $sql_actor_movie  = 
 'SELECT *, Actors.name AS "act_name"
  FROM `Plays_in` 
  INNER JOIN `Movies` ON `Plays_in`.`#id_movie` = `Movies`.`id_movie` 
  INNER JOIN `Actors` ON `Plays_in`.`#id_actor` = `Actors`.`id_actor` 
  WHERE id_actor ='. $actor_id .' ORDER BY `release_date` DESC LIMIT  3';


  $select_actor_id = mysqli_query($db_handle, $sql_actor_detail);
  $select_actor_movie = mysqli_query($db_handle, $sql_actor_movie);

  $actor = mysqli_fetch_assoc($select_actor_id);

  $actor_gender = $actor['gender'];


  echo '
  <div class="jumbotron my-4">
    <center>
      <h1 class="display-3">'. $actor['name'].'</h1>
      <img src="'. $actor['portrait'].'" width="50%" height="80%">
    </center>
  </div>
  <div class="jumbotron my-4">
      <p class="lead"> Age : '. $actor['age'].' Ans </p>
      <p class="lead"> Sexe : '. gender($actor_gender) .'</p>
      <p class="lead"> Films joués: <br>';
  while($actor_movie = mysqli_fetch_assoc($select_actor_movie)){
    echo '<a href="movie_detail.php?idOfMovie='.$actor_movie["id_movie"].'"><img src="'.$actor_movie['cover'].'" width="150vh"/><p>'.$actor_movie['title'].'</p></a>';
  }
  echo '</p>';
  echo '</div>';
}

echo "<title>".$actor['name']."</title>"
  
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