<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Vos Playlists</title>
      <link rel="stylesheet" href="./css/style.css">
      <link rel="icon" href="./assets/Cinefa-logo-black.png" />
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

                  <?php 
                  
                  require 'connectmysql.php';
                  require 'cinession.php'; 
                  
                  if(isset($_GET['idOfPlaylistToDelete'])){


                     $PlaylistToDel = $_GET['idOfPlaylistToDelete'];
                 
                     $sql_delete_playlist = 
                     "DELETE FROM `Playlist` WHERE `id_playlist` = $PlaylistToDel";

                     $$sql_delete_movies_playlist = 
                     "DELETE FROM `movies_playlist` WHERE `playlist_id` = $PlaylistToDel";

                     $delete_playlist = mysqli_query($db_handle, $sql_delete_playlist);
                     $delete_movies_playlist = mysqli_query($db_handle, $sql_delete_movies_playlist);
                     header("Refresh:0; url=playlist.php");
                 
                   }
                  
                   if(isset($_GET['newPlaylist'])){
                      echo '
                        <script type="text/javascript">
                        $("document").ready( function () {
                           alert("La playlist à bien été créée");
                       }); 
                        </script>';
                   }
                  
                  ?>

               </ul>
               <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" name="search_playlist" id="search_playlist" placeholder="Chercher une Playlist">
               </form>
            </div>
         </div>
      </nav>
      <div class="container">
      <header class="jumbotron my-4">
         <p class="lead">Retrouvez vos playlist ici ... </p>
      </header>
      <!-- BODY -->
      <div class="row text-center" id="playlist"></div>
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