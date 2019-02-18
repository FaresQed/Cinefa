<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
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
            <p class="text-success text-center">Connectez vous à l'aide de vos identifiants</p>
            <form method="post" action="./my-account.php">
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                     </div>
                     <input name="user_id" class="form-control" placeholder="Email ou pseudo" type="email">
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
  
  if(isset($_POST['submit'])){

    extract($_POST);

    if(!empty($user_id) && !empty($password) && !empty($passwordconf)){
      include 'connectmysql.php';
      global $db;
    };


  }
  
  
  ?>
</html>