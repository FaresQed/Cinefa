<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Connexion</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
      <link rel="icon" href="./assets/Cinefa-logo-black.png" />
   <body>
      <div class="container">
      <div class="card">
         <article class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
            <hr>
            <p class="text-success text-center">Connectez-vous à l'aide de vos identifiants</p>
            <form method="post" action="sign-in.php">
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                     </div>
                     <input name="user_id" class="form-control" placeholder="pseudo" type="text" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                     </div>
                     <input class="form-control" placeholder="******" type="password" name='password' required>
                  </div>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block" name="submit" value="se connecter"> Se connecter  </button>
                  <a class="btn btn-danger btn-block" href="index.php"> Annuler  </a>
               </div>
               <p class="text-center"><a href="./sign-up.php" class="btn">Pas encore enregistré ?</a></p>
            </form>
         </article>
      </div>
      </aside>
      </div> 
      </div> 
   </body>

<?php

require 'connectmysql.php';

if(isset($_POST['submit'])) {

   $pseudo = $_POST['user_id'];
   $mdp = $_POST['password'];

   // on recupère le password de la table qui correspond au login du visiteur
   $sql_password = "SELECT `password` FROM Users WHERE `pseudo` = '".$pseudo."' OR `mail` = '".$pseudo."'";

   $select_password = mysqli_query($db_handle, $sql_password);
   $row = mysqli_fetch_assoc($select_password);

   $password_check = $row['password'];

   if($mdp == $password_check) {

      $sql_user_info = "SELECT * FROM Users WHERE `pseudo` = '".$pseudo."' OR `mail` = '".$pseudo."' AND `password` = '".$password_check."' ";
      $select_user_info = mysqli_query($db_handle, $sql_user_info);
      $user = mysqli_fetch_assoc($select_user_info);

      session_start();
      $_SESSION['user_id'] = $user['ref_user'];
      $_SESSION['pseudo'] = $user['pseudo'];
      $_SESSION['address'] = $user['address'];
      $_SESSION['mail'] = $user['mail'];
      $_SESSION['phone'] = $user['phone'];
      $_SESSION['password'] = $user['password']; 
      
      echo '
      <script LANGUAGE="JavaScript">
       document.location.href="my-account.php" 
      </script>
      '; 
    }
    else{
       echo '<p class="text-danger text-center">Mauvais Login ou Mot de Passe</p>';
    }
 }
 
?>


</html>