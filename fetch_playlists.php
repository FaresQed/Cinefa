<?php
require 'connectmysql.php';

session_start();

if(isset($_POST["query"]))
{
	$playlist_maj = ucfirst($_POST["query"]);
	$playlist_min = $_POST["query"];

	$search_maj = mysqli_real_escape_string($db_handle, $playlist_maj);
	$search_min = mysqli_real_escape_string($db_handle, $playlist_min);


  $query = "SELECT * FROM Playlist WHERE `user_id` = ".$_SESSION['user_id']." AND `name` LIKE '%$search_maj%' OR '%$search_min%'";

}
else
{
  $query = "SELECT * FROM Playlist WHERE `user_id` =". $_SESSION['user_id']." ";
}

$result = mysqli_query($db_handle, $query);

if(mysqli_num_rows($result) > 0)
{
	while($playlist = mysqli_fetch_array($result))
	{
echo '
<div class="col-lg-3 col-md-6 mb-4">
    <div class="card-body">
      <h4 class="card-title">' . $playlist["name"] .'</h4>
    </div>
    <div class="card-footer">
      <a href="playlist_detail.php?idOfplaylist='. $playlist['id_playlist'] .'" class="btn btn-warning">En savoir plus</a>
      <a href="playlist.php?idOfPlaylistToDelete='. $playlist['id_playlist'] .'" class="btn btn-danger">Supprimer la playlist</a>
    </div>
</div>
';
}
echo '
 <div class="col-lg-3 col-md-6 mb-4">
 <a href="new-playlist.php">
 <img class="card-img-top portrait btn btn-warning" src="https://image.flaticon.com/icons/svg/149/149688.svg" height="70px" alt="">
    <div class="card-body playlist-title">
      <h4 class="card-title"> Créer une Nouvelle Playlist </h4>
    </div>
 </a>
</div>
';
}
else
{
 echo '
 <div class="col-lg-3 col-md-6 mb-4">
 Vous n\'avez encore aucune playlist
 <a href="new-playlist.php">
 <img class="card-img-top portrait btn btn-warning" src="https://image.flaticon.com/icons/svg/149/149688.svg" height="70px" alt="">
    <div class="card-body playlist-title">
      <h4 class="card-title"> Créer une Nouvelle Playlist </h4>
    </div>
 </a>
</div>
';
}
?>
