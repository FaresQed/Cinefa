<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="./assets/Cinefa-logo-black.png" />
  <link rel="stylesheet" href="./css/style.css">
  <!-- Bootstrap CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

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
            <?php require 'cinession.php'; ?>
          </ul>
        </div>
      </div>
    </nav>

  <!-- BODY -->
  <div class="container">

<?php

require 'connectmysql.php';

if(isset($_GET['idOfMovie'])){
    
  $movie_id = $_GET['idOfMovie'];

  $sqlmoviedetail  = 
 'SELECT *, Actors.name AS "act_name", DATE_FORMAT(release_date, "%d.%m.%Y") AS date
  FROM `Plays_in` 
  INNER JOIN `Movies` ON `Plays_in`.`#id_movie` = `Movies`.`id_movie` 
  INNER JOIN `Actors` ON `Plays_in`.`#id_actor` = `Actors`.`id_actor` 
  WHERE id_movie ='. $movie_id;

  $sqlmoviedirector = 
  'SELECT *, Directors.name AS "dir_name" 
  FROM `Movies` 
  INNER JOIN `Directors` ON `Movies`.`#id_director` = `Directors`.`id_director`
  WHERE id_movie ='. $movie_id;

$select_movie_id = mysqli_query($db_handle, $sqlmoviedetail);
$select_movie_director = mysqli_query($db_handle, $sqlmoviedirector);
$select_movie_while = mysqli_query($db_handle, $sqlmoviedetail);

$movie = mysqli_fetch_assoc($select_movie_id);

  $userid = $_SESSION['user_id'];

  $sqlmovienoteuser = 
  'SELECT * 
  FROM `Movie_notes`
  INNER JOIN `Movies` ON `Movie_notes`.`#id_movie` = `Movies`.`id_movie`
  INNER JOIN `Users` ON `Movie_notes`.`#id_user` = `Users`.`ref_user`
  WHERE id_movie = '.$movie_id.' AND ref_user = '.$userid.'
  ';

  $sqlmovienote = 
  'SELECT CAST(AVG(note) AS Decimal(10,1)) AS average_note
  FROM `Movie_notes`
  INNER JOIN `Movies` ON `Movie_notes`.`#id_movie` = `Movies`.`id_movie`
  INNER JOIN `Users` ON `Movie_notes`.`#id_user` = `Users`.`ref_user`
  WHERE id_movie = '.$movie_id.'
  ';


  $select_movie_note_user = mysqli_query($db_handle, $sqlmovienoteuser);
  $select_movie_note = mysqli_query($db_handle, $sqlmovienote);


  $note_user = mysqli_fetch_assoc($select_movie_note_user);
  $note = mysqli_fetch_assoc($select_movie_note);

  echo '
  <div class="jumbotron my-4">
    <center>
      <h1 class="display-3">'. $movie['title'].'</h1>
      <img src="'. $movie['cover'].'" width="50%" height="80%">
    </center>
  </div>
  <div class="jumbotron my-4">
      <p class="lead"> Sortie le : '. $movie['date'].'</p>';
      echo '<p class="lead">'. $movie['synopsis'].'</p>';

  echo '<p class="lead"> Casting : ';
  while($movie_while = mysqli_fetch_assoc($select_movie_while)){
    echo '<pre><a href="actor_detail.php?idOfActor='.$movie_while['id_actor'].'">'.$movie_while['act_name'].'</a></pre>';
  }
  echo '</p>';
  echo '<p class="lead"> Réalisateurs: </p>';
  while($director = mysqli_fetch_assoc($select_movie_director)){
    echo '<pre><a href="director_detail.php?idOfdirector='.$director['id_director'].'">'.$director['dir_name'].'</a></pre>';
  }
  if(isset($_SESSION['pseudo'])){
    if(mysqli_num_rows($select_movie_note_user) > 0){
      echo '<p class="lead"> Ma Note : <pre class="text-info">'.$note_user["note"].'/10</pre></p>';
    }else{
      echo '<form method="POST" "action="movie_detail.php">
      <label class="lead"> Ma Note (sur 10) : </label>
      <select name="user_movie_note">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
      <button type="submit" class="btn btn-info">Noter</button>
      </form>';
    }
  }
  if($note["average_note"] !== NULL ){
    echo '<p class="lead"> Note Globale : <pre class="text-info">'.$note["average_note"].'/10</pre></p>';
  }else {
    echo '<Refresh:5><p class="lead"> Note Globale : <pre class="text-info">Le film n\'a pas été assez noté</pre></p></Refresh:5>';
  }
  echo '</div>';
}
echo '<div class="jumbotron my-4">
    <center>
    <p class="lead"> Bande-annonce :  </p>
      <iframe width="560" height="315" src="'. $movie['bo'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </center>
  </div>';


  echo "<title>".$movie['title']."</title>";


  if(isset($_POST['user_movie_note'])){

  $user_notation = $_POST['user_movie_note'];
  $sqlnotation = "INSERT INTO `Movie_notes` (`#id_movie`, `#id_user`, `note`) VALUES ('$movie_id', '$userid', '$user_notation')";
  $select_movie_id = mysqli_query($db_handle, $sqlnotation);

    echo '
    <script type="text/javascript">
      document.location.href="index.php?ratedMovies&newOne";
    </script>
    ';
    
    }
?>

  </div>

  <!-- Footer -->
  <footer class="py-5 bg-light">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; Cinefa</p>
    </div>
  </footer>

  <!-- Bootstrap / JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>