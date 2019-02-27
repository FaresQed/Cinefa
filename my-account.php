<!DOCTYPE html>
<html lang="fr">
<?php session_start(); ?>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Mon Compte Cinefa</title>
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
            <li class="nav-item active">
              <a class="nav-link" href="my-account.php">Mon Compte</a>
              <span class="sr-only">(current)</span>
            </li>
          </ul>
        </div>
      </div>
    </nav>

        <header class="jumbotron my-4">
                <h3 class="display-3">Bienvenue, <?php echo $_SESSION['pseudo']; ?></h3>
                <p class="lead"> Voici un récapitulatif de votre compte Cinéfa, bonne séance .</p>
                <a href="./playlist.php" class="btn btn-primary btn-sm">Mes Playlists</a>
                <a href="./my-account.php?disconnect" class="btn btn-danger btn-sm">Deconnexion</a>
        </header>
    
          <div class="container">
            <div id="newBooking" class="panel-header panel-header-sm">
                </div>
              <div class="main-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="title">Mon Compte</h5>
                      </div>
                      <div class="card-body">
                        <form method='post' action="my-account.php">
                          <div class="row">
                            <div class="col-md-5 pr-1">
                              <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="user-name" placeholder="<?php echo $_SESSION['pseudo']; ?>">
                              </div>
                            </div>
                            <div class="col-md-4 pr-1">
                              <div class="form-group">
                                <label>Télephone</label>
                                <input type="phone" class="form-control" name="user-phone" placeholder="<?php echo $_SESSION['phone']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-5 pr-1">
                              <div class="form-group">
                                <label> E-Mail </label>
                                <input type="mail" class="form-control" name="user-email" placeholder="<?php echo $_SESSION['mail']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5 pr-1">
                              <div class="form-group">
                                <label> Adresse </label>
                                <textarea type="address" class="form-control" name="user-address" placeholder="<?php echo $_SESSION['address']; ?>"></textarea>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
       </body>

<!-- Bootstrap / JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php
require 'connectmysql.php';

$sql_user_info = "SELECT * FROM Users WHERE `pseudo` = '".$_SESSION['pseudo']."' ";
$select_user_info = mysqli_query($db_handle, $sql_user_info);
$user = mysqli_fetch_assoc($select_user_info);

$_SESSION['user_id'] = $user['ref_user'];

if(isset($_GET['disconnect'])){

  session_destroy();

  echo '
  <script LANGUAGE="JavaScript">
  document.location.href="index.php" 
 </script>
 ';


}

?>


</html>