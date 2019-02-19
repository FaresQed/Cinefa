<?php
$connect = mysqli_connect("localhost", "root", "root", "Cinefa");
mysqli_set_charset($connect, "utf8");

if(isset($_POST["query"]))
{
	$actor_maj = ucfirst($_POST["query"]);
	$actor_min = $_POST["query"];

	$search_maj = mysqli_real_escape_string($connect, $actor_maj);
	$search_min = mysqli_real_escape_string($connect, $actor_min);


	$query = "SELECT * FROM actors WHERE title LIKE '%".$search_maj."%' OR '%".$search_min."%'";
}
else
{
	$query = "SELECT *, DATE_FORMAT(release_date, '%d.%m.%Y') AS date FROM actors";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
	while($actor = mysqli_fetch_array($result))
	{
		echo '
<div class="col-lg-3 col-md-6 mb-4">
<div class="card h-100">
<img class="card-img-top" src="' . $actor['cover'] . '" height="325vh" alt="">
	<div class="card-body">
	<div class="card-title">' . $actor["title"] .'</div>
	<p class="card-text">Sortie le : '. $actor['release_date'] .'</p>
	</div>
	<div class="card-footer">
	<a href="actor_detail.php?idOfactor='. $actor['id_actor'] .'" class="btn btn-primary">En savoir plus</a>
	</div>
</div>
</div>';
	}
}
else
{
 echo '<div> Aucun film trouvé pour "'. $_POST["query"] .'" <div>';
}
?>
