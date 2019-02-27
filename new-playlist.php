<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Nouvelle Playlist</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
      <link rel="stylesheet" href="./css/style.css">
      <link rel="icon" href="./assets/Cinefa-logo-black.png" />
   </head>
      
  <body>
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
            <li class="nav-item">
              <a class="nav-link" href="my-account.php">Mon Compte</a>
            </li>
            <?php require 'cinession.php' ?>
          </ul>
        </div>
      </div>
    </nav>

        <header class="jumbotron my-4">
                <h3 class="display-3"> Création d'une Playlist</h3>
                <p class="lead">Choissisez un nom, une description et commencez à la remplir pour essayer de créer la playlist parfaite.</p>
        </header>
    
          <div class="container">
            <div id="newBooking" class="panel-header panel-header-sm"></div>
              <div class="main-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="title">Nouvelle Playlist</h5>
                      </div>
                      <div class="card-body">
                        <form method='post' action="new-playlist.php">
                          <div class="row">
                            <div class="col-md-4 pr-1">
                              <div class="form-group">
                                <label>Nom de la Playlist</label>
                                <input type="text" class="form-control" name="playlist-name" placeholder="ex: films à voir, coups de cœur, ...">
                              </div>
                            </div>
                            <div class="col-md-5 pr-1">
                              <div class="form-group">
                                <label> Description (facultatif) </label>
                                <textarea class="form-control" name="playlist-description" placeholder="description brève de votre  playlist"></textarea>
                              </div>
                            </div>
                          </div>
                          <button type="submit" name="new-playlist" class="btn btn-primary">Créer Playlist</button>
                          <a href="playlist.php" class="btn btn-danger">Annuler</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
       </body>

       <?php 

       require 'connectmysql.php';
        
        if(isset($_POST['new-playlist'])){
            $playlist_name = $_POST['playlist-name'];

            // concaténation déja faite pour effet facultatif
            $playlist_description = ', \''.$_POST['playlist-description'].'\',';
            $creation_date = date("Y-m-d");
            $user_id = $_SESSION['user_id'];

            $sql_playlist = "INSERT INTO `Playlist`(`name`, `description`, `creation_date`, `user_id`) VALUES ('$playlist_name' $playlist_description '$creation_date', '$user_id')";
            $insert_playlist_info = mysqli_query($db_handle, $sql_playlist);

            if($insert_playlist_info){
                echo '<div class="message_reussi text-success"> Nouvelle Playlist créée </div>';
                echo '
                      <script type="text/javascript">
                        document.location.href="playlist.php?newPlaylist";
                      </script>
                      ';
            }

        }

       ?>

<!-- Bootstrap / JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</html>