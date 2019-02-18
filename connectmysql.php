<?php

    require_once 'sqlconnect.php';
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

    mysqli_select_db($db_handle, 'Cinefa');
    mysqli_set_charset($db_handle, 'UTF8');

    //Movie tab
    $movie_result = mysqli_query($db_handle,"SELECT *, DATE_FORMAT(release_date, '%d.%m.%Y') AS date FROM Movies");

    //Actor tab
    $actor_result = mysqli_query($db_handle,"SELECT * FROM Actors");

    //Director tab
    $director_result = mysqli_query($db_handle,"SELECT * FROM Directors");

?>
