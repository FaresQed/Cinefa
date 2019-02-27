<?php
session_start();

$connect = mysqli_connect("localhost", "root", "root", "Cinefa");
mysqli_set_charset($connect, "utf8");


if(isset($_POST["query"]))
{
	$movie_maj = ucfirst($_POST["query"]);
	$movie_min = $_POST["query"];

	$search_maj = mysqli_real_escape_string($connect, $movie_maj);
	$search_min = mysqli_real_escape_string($connect, $movie_min);


	$query = "SELECT *, DATE_FORMAT(release_date, '%d.%m.%Y') AS date FROM Movies WHERE title LIKE '%".$search_maj."%' OR '%".$search_min."%'";
}
else
{
	$query = "SELECT *, DATE_FORMAT(release_date, '%d.%m.%Y') AS date FROM Movies";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
	if(isset($_SESSION['pseudo'])){

		while($movie = mysqli_fetch_array($result))
		{
			echo '
	<div class="col-lg-3 col-md-6 mb-4">
	<div class="card h-100">
	<img class="card-img-top" src="' . $movie['cover'] . '" height="325vh" alt="">
		<div class="card-body">
		<div class="card-title">' . $movie["title"] .'</div>
		<p class="card-text">Sortie le : '. $movie['date'] .'</p>
		</div>
		<div class="card-footer">
		<a href="movie_detail.php?idOfMovie='. $movie['id_movie'] .'" class="btn btn-warning">En savoir plus</a>
		<a href="movieToPlaylist.php?idOfMovie='. $movie['id_movie'] .'" class="btn btn-dark">Ajoutez à une Playlist</a>
		</div>
	</div>
	</div>';
		}
	}else{
		while($movie = mysqli_fetch_array($result))
			{
				echo '
		<div class="col-lg-3 col-md-6 mb-4">
		<div class="card h-100">
		<img class="card-img-top" src="' . $movie['cover'] . '" height="325vh" alt="">
			<div class="card-body">
			<div class="card-title">' . $movie["title"] .'</div>
			<p class="card-text">Sortie le : '. $movie['date'] .'</p>
			</div>
			<div class="card-footer">
			<a href="movie_detail.php?idOfMovie='. $movie['id_movie'] .'" class="btn btn-warning">En savoir plus</a>
			</div>
		</div>
		</div>';
			}
		}
	
}
else
{
 echo '<div> Aucun film trouvé pour "'. $_POST["query"] .'" <div>';
}
?>
