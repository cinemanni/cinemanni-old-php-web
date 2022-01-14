<?php


include "_functions.php";

$page = "index.php";
include "_head.php";

if(!empty($_GET['limit'])){

	$limit = $_GET['limit'];


 } else {

 	$limit = 20;

 }



if(!empty($_GET['sort'])){

	if ($_GET['sort'] == 1) {	

		$sort = "DESC";

	} else {

 	$sort = "ASC";

 	}

 
 } else {

 	$sort = "ASC";

 }


 PublishSlidesWithUpcomingAnniversaries($limit, $sort);

//SetupDirector('melville');
//include "blocks/_director_birthday.php";
 
//SetupMovie('le-samourai');
//include "blocks/_movie_anniversary.php"; 

//SetupMovie('hitler-ein-film-aus-deutschland');
//include "blocks/_movie_anniversary.php"; 


include "_footer.php";

 ?>     