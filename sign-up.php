<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Inscription Cinefa</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
   <body>
      <div class="container">
      <div class="card">
         <article class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">S'enregistrer</h4>
            <hr>
            <form method="post" action="">
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                     </div>
                     <input name="user_id" class="form-control" placeholder="Pseudo" type="text">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                     </div>
                     <input name="mail" class="form-control" placeholder="Email" type="text">
                  </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                  </div>
                  <textarea class="form-control" name="address" placeholder="Adresse"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                     </div>
                     <input name="phone" class="form-control" placeholder="Tél." type="tel">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                     </div>
                     <input class="form-control" placeholder="mot de passe" type="password" name='password'>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                     </div>
                     <input class="form-control" placeholder="confirmation de mot de passe" type="password" name='passwordconf'>
                  </div>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block" name="submit"> Se connecter  </button>
               </div>
               <p class="text-center"><a href="#" class="btn">Mot de passe oublié ?</a></p>
            </form>
         </article>
      </div>
      <!-- card.// -->
      </aside> <!-- col.// -->
      </div> <!-- row.// -->
      </div> 
      <!--container end.//-->
   </body>

<?php
  
  require 'connectmysql.php';


  if(isset($_POST['submit'])){

   $user_id = $_POST['user_id'];
   $mail = $_POST['mail'];
   $address = $_POST['address'];
   $phone= $_POST['phone'];
   $password = $_POST['password'];
   $passwordconf = $_POST['passwordconf'];

   $sqlverify = "SELECT `pseudo`, `mail` FROM  Users ";
   $select_user_pseudo = mysqli_query($db_handle, $sqlverify);

   $sqlsign_in = "INSERT INTO Users (`pseudo`,`address`, `mail`, `phone`, `password`) VALUES ($user_id, $address, $mail, $phone, $password)";

   if(!isset($user_id) || !isset($password) || !isset($passwordconf) || (($passwordconf) != ($password)) ){
      echo "mot de passe ou pseudo invalide";
    }else if($insert_user_pseudo = mysqli_query($db_handle, $sqlsign_in)){
         $insert_user_pseudo = mysqli_query($db_handle, $sqlsign_in);
         echo "ajout avec succés";
         }
      }

    
?>

</html>