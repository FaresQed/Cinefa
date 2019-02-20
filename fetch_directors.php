<?php
$connect = mysqli_connect("localhost", "root", "root", "Cinefa");
mysqli_set_charset($connect, "utf8");

if(isset($_POST["query"]))
{
	$directors_maj = ucfirst($_POST["query"]);
	$directors_min = $_POST["query"];

	$search_maj = mysqli_real_escape_string($connect, $directors_maj);
	$search_min = mysqli_real_escape_string($connect, $directors_min);


	$query = "SELECT * FROM Directors WHERE `name` LIKE '%".$search_maj."%' OR '%".$search_min."%'";
}
else
{
	$query = "SELECT * FROM Directors";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
	while($director = mysqli_fetch_array($result))
	{
		echo '
		<div class="col-lg-3 col-md-6 mb-4">
		<div class="card h-100">
		<img class="card-img-top portrait" src="' . $director['portrait'] . '" height="200px" alt="">
		  <div class="card-body">
		  <h4 class="card-title">' . $director["name"] .'</h4>
		  </div>
		  <div class="card-footer">
			<a href="director_detail.php?idOfdirector='. $director['id_director'] .'" class="btn btn-primary">En savoir plus</a>
		  </div>
		</div>
	  </div>
	  ';
	}
}
else
{
 echo '<div> Aucun film trouvé pour "'. $_POST["query"] .'" <div>';
}
?>
