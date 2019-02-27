<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Cinefa : Films à l'affiche</title>
      <link rel="icon" href="./assets/Cinefa-logo-black.png" />
      <link rel="stylesheet" href="./css/style.css">
      <!-- Bootstrap CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>

   <?php 
if(isset($_GET['search_ratedMovie'])){
   header("Refresh:0; url=index.php?ratedMovies");
}
?>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
         <div class="container">
            <a class="navbar-brand" href="index.php"><img src="./assets/CINEFA-logo.png" width="120px"></a>
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

                  <?php 
                  require 'connectmysql.php';
                  require 'cinession.php'; 
                  
                  $addMovie = $_GET['idOfMovie'];
                  $toPlaylist = $_GET['idOfplaylist'];

                  if(isset($addMovie) && isset($toPlaylist)){
                     $sql_movie_to_playlist = "INSERT INTO `movies_playlist`(`movie_id`, `playlist_id`) VALUES ($addMovie, $toPlaylist)";

                     $insert_movie_to_playlist = mysqli_query($db_handle, $sql_movie_to_playlist);

                     if($insert_movie_to_playlist){
                        echo '<div class="message_reussi text-success"> Nouvelle Playlist créée </div>';
                        
                        echo '
                        <script LANGUAGE="JavaScript">
                        document.location.href="index.php" ;
                        $("document").ready( function () {
                           alert("Ajout avec succés");
                       }); 
                        </script>
                        ';
                     }
                  }

                  ?>

               </ul>
               <?php
                     if(isset($_GET['ratedMovies'])){
                     
                  }else{
                     echo '
                     <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" name="search_movie" id="search_movie" placeholder="Chercher un film">
                     </form>';
                  }
               ?>
               
            </div>
         </div>
      </nav>
      <header class="jumbotron my-4">
      <?php
                     if(isset($_GET['ratedMovies'])){
                        echo '
                     <h1 class="display-3">Les Films notés</h1>
                     <p class="lead">Retrouvez les films que vous avez notés (triés du mieux noté au moins bien) . </p>';
                     if(isset($_GET['newOne'])){
                        echo '
                        <script type="text/javascript">
                          alert("Votre note à bien été prise en compte");
                        </script>
                        ';
                     }
                  }else{
                        echo '
                     <h1 class="display-3">Les Films à l\'affiche</h1>
                     <p class="lead">Retrouvez toutes les dernières sorties . </p>';
                  }
            
                  if(isset($_SESSION['pseudo'])){
                     echo '
                     <a href="index.php" class="btn btn-info btn-sm">Voir tous les films</a>
                     <a href="index.php?ratedMovies" class="btn btn-info btn-sm">Voir les Films que j\'ai noté</a>';
                  }
         ?>
      </header>
      <!-- BODY -->
      <div class="container">
         <?php 
            if(isset($_GET['ratedMovies'])){
               echo '<div class="row text-center" id="ratedMovies"></div>';
            }else{
               echo '<div class="row text-center" id="movie"></div>';
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