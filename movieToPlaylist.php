<!DOCTYPE html>
<html lang="fr">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Choisir une Playlist</title>
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
                     <a class="nav-link" href="actors.php">Acteurs</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="directors.php">Réalisateurs</a>
                  </li>

                  <?php require 'cinession.php'; ?>

               </ul>
            </div>
         </div>
      </nav>
      <div class="container">
      <header class="jumbotron my-4">
         <p class="lead">Retrouvez vos playlist ici ... </p>
      </header>
      <!-- BODY -->
      <div class="row text-center">

      <?php
require 'connectmysql.php';


$movie = $_GET['idOfMovie'];

$query = "SELECT * FROM Playlist WHERE `user_id` =". $_SESSION['user_id']." ";

$result = mysqli_query($db_handle, $query);

if(mysqli_num_rows($result) > 0)
{
	while($playlist = mysqli_fetch_array($result))
	{
echo '
<div class="col-lg-3 col-md-6 mb-4">
    <div class="card-body">
      <h4 class="card-title">' . $playlist["name"] .'</h4>
    </div>
    <div class="card-footer">
      <a href="index.php?idOfplaylist='. $playlist['id_playlist'] .'&idOfMovie='. $movie .'" class="btn btn-warning">Choisir cette Playlist</a>
    </div>
</div>
';
}
}
else
{
 echo '
 <div class="col-lg-3 col-md-6 mb-4">
 Vous n\'avez encore aucune playlist
 <a href="new-playlist.php">
 <img class="card-img-top portrait btn btn-warning" src="https://image.flaticon.com/icons/svg/149/149688.svg" height="70px" alt="">
    <div class="card-body playlist-title">
      <h4 class="card-title"> Créer une Nouvelle Playlist </h4>
    </div>
 </a>
</div>
';
}
?>
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