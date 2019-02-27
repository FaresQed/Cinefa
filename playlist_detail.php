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
            <li class="nav-item">
              <a class="nav-link" href="directors.php">Réalisateurs</a>
            </li>
            <?php require 'cinession.php';?>
          </ul>
        </div>
      </div>
    </nav>

<?php
require 'connectmysql.php';

$user_id = $_SESSION['user_id']; 
$idOfPlaylist = $_GET['idOfplaylist'];


if(isset($_GET['idOfplaylist'])){

      $sqlMovie = "SELECT * , Playlist.name AS pName, DATE_FORMAT(creation_date, '%d/%m/%Y') AS date
      FROM `movies_playlist`
      INNER JOIN `Playlist` ON `movies_playlist`.`playlist_id` = `Playlist`.`id_playlist`
      INNER JOIN `Users` ON `Playlist`.`user_id` = `Users`.`ref_user`
      INNER JOIN `movies` ON `movies_playlist`.`movie_id` = `movies`.`id_movie`
      WHERE user_id = $user_id  AND `id_playlist` = $idOfPlaylist ";

    $sqlPlaylist= "SELECT * , DATE_FORMAT(creation_date, '%d/%m/%Y') AS date
    FROM `Playlist`
    WHERE `id_playlist` = $idOfPlaylist AND user_id = $user_id ";

    $select_movies = mysqli_query($db_handle, $sqlMovie);
    $select_playlist = mysqli_query($db_handle, $sqlPlaylist);

    $playlist = mysqli_fetch_array($select_playlist);


    echo '

        <header class="jumbotron my-4">
        <h3>Playlist : '.$playlist["name"].'</h3>
        <p> '.$playlist["description"].'</p>
        <p> Créée le '.$playlist["date"].'</p>
        </header>


        <!-- BODY -->
        <div class="container">
          <div class="row text-center">
    ';

    if(mysqli_num_rows($select_movies) > 0)
    {
      while($movies_playlist = mysqli_fetch_array($select_movies)){
      echo '
      <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
      <img class="card-img-top" src="' . $movies_playlist['cover'] . '" height="325vh" alt="">
        <div class="card-body">
        <div class="card-title">' . $movies_playlist["title"] .'</div>
        <p class="card-text">Sortie le : '. $movies_playlist['release_date'] .'</p>
        </div>
        <div class="card-footer">
        <a href="movie_detail.php?idOfMovie='. $movies_playlist['movie_id'] .'" class="btn btn-warning">En savoir plus</a>
        <a href="playlist_detail.php?idOfplaylist='.$idOfPlaylist.'&idOfMovieToDelete='. $movies_playlist['movie_id'] .'" class="btn btn-danger">Supprimer de la playlist</a>
        </div>
      </div>
      </div>
      ';
      }
    }
      else
      {
        echo '

      <div class="col-lg-3 col-md-6 mb-4">
      Aucun film enregistré dans votre playlist.
      <a href="index.php">
      <img class="card-img-top portrait btn btn-warning" src="https://image.flaticon.com/icons/svg/149/149688.svg" height="70px" alt="">
          <div class="card-body movies_playlist-title">
            <h4 class="card-title"> Ajoutez un nouveau film ? </h4>
          </div>
      </a>
      </div>
      ';
      }
}

if(isset($_GET['idOfMovieToDelete'])){


    $movieToDel = $_GET['idOfMovieToDelete'];

    $sql_delete_movie_playlist = "DELETE FROM `movies_playlist` WHERE `movie_id` = $movieToDel AND playlist_id = $idOfPlaylist";
    $insert_playlist_info = mysqli_query($db_handle, $sql_delete_movie_playlist);
    header("Refresh:0; url=playlist_detail.php?idOfplaylist=".$idOfPlaylist."");

  }
  echo "<title>".$playlist['name']."</title>";
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
  <script src="vendor/script.js"></script>

</body>
</html>
