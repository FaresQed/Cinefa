<?php
session_start();

$user_id = $_SESSION['user_id'];

$connect = mysqli_connect("localhost", "root", "root", "Cinefa");
mysqli_set_charset($connect, "utf8");


$query = 
"SELECT *, DATE_FORMAT(release_date, '%d.%m.%Y') AS date
FROM `Movies`
INNER JOIN `Movie_notes` ON `Movies`.`id_movie` = `Movie_notes`.`#id_movie`
INNER JOIN `Users` ON `Movie_notes`.`#id_user` = `Users`.`ref_user`
WHERE ref_user  = $user_id
ORDER BY note DESC";


$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
	if(isset($_SESSION['pseudo'])){

		while($rated_movie = mysqli_fetch_array($result))
		{
			echo '
	<div class="col-lg-3 col-md-6 mb-4">
	<div class="card h-100">
	<img class="card-img-top" src="' . $rated_movie['cover'] . '" height="325vh" alt="">
		<div class="card-body">
		<div class="card-title">' . $rated_movie["title"] .'</div>
		<p class="card-text">Sortie le : '. $rated_movie['date'] .'</p>
		</div>
		<div class="card-footer">
		<a href="movie_detail.php?idOfMovie='. $rated_movie['id_movie'] .'" class="btn btn-warning">En savoir plus</a>
		<a href="movieToPlaylist.php?idOfMovie='. $rated_movie['id_movie'] .'" class="btn btn-dark">Ajoutez à une Playlist</a>
		</div>
	</div>
	</div>';
		}
	}else{
		while($rated_movie = mysqli_fetch_array($result))
			{
				echo '
		<div class="col-lg-3 col-md-6 mb-4">
		<div class="card h-100">
		<img class="card-img-top" src="' . $rated_movie['cover'] . '" height="325vh" alt="">
			<div class="card-body">
			<div class="card-title">' . $rated_movie["title"] .'</div>
			<p class="card-text">Sortie le : '. $rated_movie['date'] .'</p>
			</div>
			<div class="card-footer">
			<a href="movie_detail.php?idOfMovie='. $rated_movie['id_movie'] .'" class="btn btn-warning">En savoir plus</a>
			</div>
		</div>
		</div>';
			}
		}
	
}
else
{
 echo '<p class="text-info text-center"> Vous n\'avez noté encore aucun film </p>';
}
?>
