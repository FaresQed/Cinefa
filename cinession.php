<?php
     session_start();

                  if(isset($_SESSION['pseudo'])){
                     echo '
                        <li class="nav-item active">
                           <a class="nav-link text-warning" href="./playlist.php">Mes Playlists</a>
                           <span class="sr-only">(current)</span>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="./my-account.php">Mon Compte</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link text-danger" href="./my-account.php?disconnect">Deconnexion</a>
                        </li>
                        ';
                  }else{
                     echo '
                        <li class="nav-item">
                           <a class="nav-link text-warning" href="./sign-in.php">Se Connecter</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link text-danger" href="./sign-up.php">S\'inscrire</a>
                        </li>
                        ';
                  }

?>