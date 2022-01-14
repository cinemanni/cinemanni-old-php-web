<?php

//echo date("Y-m-d H:i:s");
include "_functions.php";

$page = "movie.php";
SetupMovie($basename);
include "_head.php";

include "blocks/_movie_anniversary.php";
include "blocks/_other_upcoming.php";

 PublishSlidesWithUpcomingAnniversaries($limit = 15);

 
include "_footer.php";

 ?>     