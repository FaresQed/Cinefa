<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Mon Compte Cinefa</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
   </head>
      <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">Cinefa</a>
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
                <a class="nav-link" href="#">Réalisateurs</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Mon Compte
                <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        <header class="jumbotron my-4">
                <h3 class="display-4">Bienvenue, "customer"</h3>
                <p class="lead"> Voici un récapitulatif de votre compte Cinéfa, bonne séance .</p>
                <a href="#" class="btn btn-primary btn-sm">Accueil</a>
                <a href="#" class="btn btn-primary btn-sm">Accueil</a>
                <a href="#" class="btn btn-primary btn-sm">Accueil</a>
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
                        <form>
                          <div class="row">
                            <div class="col-md-5 pr-1">
                              <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="restaurant-name" value="">
                              </div>
                            </div>
                            <div class="col-md-4 pr-1">
                              <div class="form-group">
                                <label>Télephone</label>
                                <input type="phone" class="form-control" name="restaurant-phone" value="">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <dicorev class="col-md-4 pr-1">
                              <div class="form-group">
                                <label> E-Mail </label>
                                <input type="mail" class="form-control" name="restaurant-email" value="">
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary">Sauvegarder</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
       </body>



<!-- Bootstrap / JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>