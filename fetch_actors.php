<?php
$connect = mysqli_connect("localhost", "root", "root", "Cinefa");
mysqli_set_charset($connect, "utf8");

if(isset($_POST["query"]))
{
	$actor_maj = ucfirst($_POST["query"]);
	$actor_min = $_POST["query"];

	$search_maj = mysqli_real_escape_string($connect, $actor_maj);
	$search_min = mysqli_real_escape_string($connect, $actor_min);


	$query = "SELECT * FROM Actors WHERE `name` LIKE '%".$search_maj."%' OR '%".$search_min."%'";
}
else
{
	$query = "SELECT * FROM Actors";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
	while($actor = mysqli_fetch_array($result))
	{
echo '
<div class="col-lg-3 col-md-6 mb-4">
  <div class="card h-100">
  <img class="card-img-top portrait" src="' . $actor['portrait'] . '" height="250px" alt="">
    <div class="card-body">
    <h4 class="card-title">' . $actor["name"] .'</h4>
    </div>
    <div class="card-footer">
      <a href="actor_detail.php?idOfActor='. $actor['id_actor'] .'" class="btn btn-warning">En savoir plus</a>
    </div>
  </div>
</div>
';
}
}
else
{
 echo '<div> Aucun acteur trouvé pour "'. $_POST["query"] .'" <div>';
}
?>
