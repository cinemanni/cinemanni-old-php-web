<?php header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");header("Cache-Control: post-check=0, pre-check=0", false);header("Pragma: no-cache");header('Content-Type: text/html; charset=utf-8');mb_internal_encoding("UTF-8");ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);




//sentry set-up



require_once 'sentry-php-master/lib/Raven/Autoloader.php';
Raven_Autoloader::register();
$client = new Raven_Client('https://01292a64d9564898ab07e6921a0fef17@sentry.io/1267898');

$error_handler = new Raven_ErrorHandler($client);
$error_handler->registerExceptionHandler();
$error_handler->registerErrorHandler();
$error_handler->registerShutdownFunction();




// SHORTCUTS
mb_internal_encoding("UTF-8");

//global settings
$root = $_SERVER["DOCUMENT_ROOT"];
$thisurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$thisurl = htmlspecialchars($thisurl);
$thisfolder = substr(dirname($thisurl),-4);
$basename = basename($thisurl);
$basename = strtok($basename, '?');

$filename = basename(__FILE__, '.php');
$file = basename(__FILE__);
$mdash = html_entity_decode("&mdash;");
$this_year = date("Y");



function referrerDomain(){

	$ref=@$_SERVER[HTTP_REFERER];


	$details=parse_url($ref);


	// while (list ($key, $val) = each ($details)) { 	echo "$key -> $val <br>"; }


	if(!empty($details['host'])){

		return $details['host'];

	} else {

		return 'direct';
	}


}


function connectto(){

	global $link;

	$whitelist = array(
	    '127.0.0.1',
	    '35.214.157.205',
	    '::1'
	);

	if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	  $host = "localhost";  // not valid
	} else {
	$host = "35.214.157.205";

	}
	$host = "35.214.157.205";

$user = "user";
$pass = "pswd";
$db = 'db';


$link = mysqli_connect($host, $user, $pass, $db);

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Could not connect: %s\n", mysqli_connect_error());
    exit();
}
}


function SetupMovie($id){

global $link, $query, $result, $MOVIE, $DIRECTOR, $this_year, $next_birthday_year, $BIO_DIRECTOR;

if(!empty($BIO_DIRECTOR)){

	foreach($BIO_DIRECTOR as $num => $director){
		    unset($BIO_DIRECTOR[$num]);
    }

}


	if(empty($link)){connectto();}

	 mysqli_query($link, 'SET NAMES utf8');

	 $query = "SELECT * FROM movies WHERE id = '$id'";
	 $result = mysqli_query($link, $query);
	 $MOVIE = mysqli_fetch_array($result);

	 SetupBioDirector($MOVIE['director_id']);

	  if(empty($next_birthday_year)){

		$year_of_birth = date("Y", strtotime($MOVIE['release_date']));

		$starting_year = $this_year;

	 	while (((($starting_year - $year_of_birth)%10) !== 0) AND ((($starting_year - $year_of_birth)%25) !== 0)){

	 		 $starting_year++;


	 	}
	 				$next_birthday_year = $starting_year;

	 }



}

function printSlideCover($type, $id){

	$GIF = "images/$type/$id/cover.gif";
	$JPG = "images/$type/$id/cover.jpg";

	 if(file_exists("$GIF")){

	 	echo $GIF;

	 } else {

	 	echo $JPG;

	 }

}



function SecurePassword($service, $pass_phrase){

	$pswd =  hash('sha256', $pass_phrase . ' ' . $service);

	echo $pswd;

}

// SecurePassword($service ='twitter', $pass_phrase ='молилась ли ты на ночь дездемона');



function SetupDirector($id){

global $link, $query, $result, $DIRECTOR, $MOVIE, $BIO_MOVIE, $BIO_DIRECTOR, $basename, $next_birthday_year, $this_year;

	if (empty($link)){
		connectto();
	}

	 mysqli_query($link, 'SET NAMES utf8');

	 $query = "SELECT * FROM directors WHERE id = '$id'";
	 $result = mysqli_query($link, $query);
	 $DIRECTOR = mysqli_fetch_array($result);

	 SetupBioMovie($DIRECTOR['biography_movie_id']);
	 SetupBioDirector($BIO_MOVIE['director_id']);


	 if(empty($next_birthday_year)){

		$year_of_birth = date("Y", strtotime($DIRECTOR['birthday']));

		$starting_year = $this_year;

	 	while (((($starting_year - $year_of_birth)%10) !== 0) AND ((($starting_year - $year_of_birth)%25) !== 0)){

	 		 $starting_year++;


	 	}
	 				$next_birthday_year = $starting_year;

	 }


}


function SetupBioDirector($id){

global $link, $query, $result, $BIO_DIRECTOR;


	if(empty($link)){ connectto();}

	 mysqli_query($link, 'SET NAMES utf8');

	 //check if it's one or more directors
	 $BIODIRECTORS = explode(";", $id);
	 //count($BIO_DIRECTOR);

	foreach ($BIODIRECTORS as $num => $director){

		$director = preg_replace('/\s+/', '', $director);

	 $query = "SELECT * FROM directors WHERE id = '$director'";
	 $result = mysqli_query($link, $query);
	 $BIO_DIRECTOR[$num] = mysqli_fetch_array($result);


	}

}


function printAllDirectors($url = TRUE){
	global $BIO_DIRECTOR;


//echo "printAllDirectors: ";
 $count = count($BIO_DIRECTOR);

    $i = 1;
    foreach($BIO_DIRECTOR as $num => $director){

		    if($url){echo "<a href='" . $director['imdb'] . "'><strong>";}
		    echo $director['name'];
			if($url){echo "</strong></a>";}

		    if ($i < $count){echo ", ";}

		  	$i++;
    }




}






function SetupBioMovie($id){

global $link, $query, $result, $BIO_MOVIE;


	if (empty($link)){
		connectto();
	}

	 mysqli_query($link, 'SET NAMES utf8');

	 $query = "SELECT * FROM movies WHERE id = '$id'";
	 $result = mysqli_query($link, $query);
	 $BIO_MOVIE = mysqli_fetch_array($result);


}






function PrintDate($date, $format){

	$date = date($format, strtotime($date));
	echo $date;

}


function GetAllIds(){

	global $link, $query, $result;
	connectto();
	mysqli_query($link, 'SET NAMES utf8');


	$query = "SELECT id, 'director.php' as file FROM directors WHERE LENGTH(id) > 0 AND LENGTH(birthday) > 0 AND famous = 1 UNION SELECT id, 'movie.php' as file FROM movies WHERE LENGTH(id) > 0 AND LENGTH(release_date) > 0 AND famous = 1";

 	$result = mysqli_query($link, $query);


}



function CreateImageFolders($type){


echo "<br/>I will now check for new $type in the database...<br/>";

	global $link, $query, $result;
	connectto();
	mysqli_query($link, 'SET NAMES utf8');

	if ($type == 'directors'){
		$birthday = 'birthday';
	}

	if ($type == 'movies'){

		$birthday = 'release_date';
	}

	$newfolders = 0;
	$notindatabase = 0;

 	$query = "SELECT id FROM $type WHERE LENGTH(id) > 0 AND LENGTH($birthday) > 0 AND famous = 1 ORDER BY id ASC";

 	$result = mysqli_query($link, $query);


	while($row = mysqli_fetch_array($result)){

		$string = preg_replace('/\s+/', '', $row['id']);

	 	$directory = "images/$type/". $row['id'];

	 	if(!file_exists($directory)){
	 		mkdir($directory, 0777, true);
	 		$newfolders++;
	 		echo "<span style='color:green;'>Created folder <b>" . $row['id'] ."</b> in $directory</span><br/>";
	 	}

	 	$in_database[$row['id']] = $row['id'];

 	}

 		if($newfolders == 0){

		echo "<span style='color:green;'>No new $type found in the database.</span><br/>";

		} else {

			if($newfolders == 1){

				echo "<span style='color:navy;'>A new" . substr($type, 0, -1) . "found in database. Image folder created.</span><br/>";
			} else {

				echo "<span style='color:navy;'>$newfolders new $type found in database. Image folders created.</span><br/>";
			}

		}

	echo "<br/>Now I will check the  Dropbox for unnecessary  $type folders...<br/>";


 	$subfolders = scandir("images/$type/");

	foreach ($subfolders as $num => $name){

		if(preg_match('/\s+/',$name)){echo "$name folder has whitespace in it in $type<br/>";}


		if ((!in_array($name, $in_database)) AND (is_dir("images/$type/".$name)) AND ($name != '.') AND ($name != '..')){

			echo "<span style='color:navy;'><b>$name</b> is not among <b>$type</b> table in the cinemAnni database</span><br/>";
			$notindatabase++;

		}

	}

		if($notindatabase == 0){

		echo "<span style='color:green;'>All folders for $type are in the database.</span><br/>";


		} else {

			if($notindatabase == 1){

				echo "<span style='color:red;'>Found one image folder for $type NOT found in the database. Consider deleting or renaming it.</span><br/>";

			} else {

				echo "<span style='color:red;'>Found $notindatabase image folders for $type NOT found in the database. Consider deleting or renaming them.</span><br/>";

			}

		}



}


function PublishSlidesWithUpcomingAnniversaries ($limit = 20, $sort = 'ASC'){

	global $link, $query, $result, $DIRECTOR, $this_year, $BIO_MOVIE, $BIO_DIRECTOR, $MOVIE, $basename;

	// What is the date now?
	$now = date('Y-m-d');
	$start = strtotime("-7 day", strtotime($now));
	$end = strtotime("+30 day", strtotime($now));

	"START: " . date('Y-m-d', $start);
	"END: " . date('Y-m-d', $end);

	connectto();

	mysqli_query($link, 'SET NAMES utf8');


	//$query = "SELECT id, release_date AS thedate FROM movies UNION SELECT id, birthday AS thedate FROM directors ORDER BY thedate ASC";


	$WHERE1 = "WHERE LENGTH(id) > 0 AND LENGTH(birthday) > 0 AND famous = 1";
	$WHERE2 = "WHERE LENGTH(id) > 0 AND LENGTH(release_date)  > 0 AND famous = 1";
	$ORDERBY = "ORDER BY next_birthday $sort";

	$query_of_PublishSlidesWithUpcomingAnniversaries = "SELECT id, 'director' as type, YEAR(birthday) as year, DATE_ADD(birthday, INTERVAL IF(DAYOFYEAR(birthday) >= DAYOFYEAR(CURDATE()),YEAR(CURDATE())-YEAR(birthday), YEAR(CURDATE())-YEAR(birthday)+1) YEAR) AS next_birthday FROM directors $WHERE1 UNION SELECT id, 'movie' as type, YEAR(release_date) as year, DATE_ADD(release_date, INTERVAL IF(DAYOFYEAR(release_date) >= DAYOFYEAR(CURDATE()),YEAR(CURDATE())-YEAR(release_date), YEAR(CURDATE())-YEAR(release_date)+1) YEAR) AS next_birthday FROM movies $WHERE2 $ORDERBY";

	$result_of_PublishSlidesWithUpcomingAnniversaries = mysqli_query($link, $query_of_PublishSlidesWithUpcomingAnniversaries);

	$i = 1;

	while($bro = mysqli_fetch_array($result_of_PublishSlidesWithUpcomingAnniversaries)){


		//echo $i . " " . $bro['type'] . " : " . $bro['id'] . " NEXT ANNIVERSARY: " . $bro['next_birthday'] . "<br/>";

		$next_birthday_year = date('Y', strtotime($bro['next_birthday']));
		$anniversary_in_years = $next_birthday_year - $bro['year'];


	if(($basename != $bro['id']) AND ($i <= $limit)){ // don't publish the same movie or director twice on the page

		if((($anniversary_in_years % 10) == 0) OR (($anniversary_in_years % 25) == 0)){


			if ((($bro['type']) == 'director') AND ((file_exists("images/directors/".$bro['id']."/cover.jpg")) OR file_exists("images/directors/".$bro['id']."/cover.gif"))){

				SetupDirector($bro['id']);
				include "blocks/_director_anniversary.php";
				$i++;

			}

			if ((($bro['type']) == 'movie')  AND ((file_exists("images/movies/".$bro['id']."/cover.jpg")) OR file_exists("images/movies/".$bro['id']."/cover.gif"))) {

				SetupMovie($bro['id']);
				include "blocks/_movie_anniversary.php";
				$i++;

			}

		}
	}



	}




}





function MovieAnniversary($year, $uppercase = 1){

	global $MOVIE, $this_year;
 	//if ($year > $this_year){echo "will be ";}

	$release_year = date("Y", strtotime($MOVIE['release_date']));

	$print = $year - $release_year . "th anniversary";

	if ($uppercase == 1){

	 echo strtoupper($print);

	} else {

		echo $print;
	}


}

function DirectorAnniversary($year, $uppercase = 1){

	global $DIRECTOR, $this_year;

	 // if ($year > $this_year){echo "will be ";}

	$year_of_birth = date("Y", strtotime($DIRECTOR['birthday']));

	$print = $year - $year_of_birth . "th birthday";

	if ($uppercase == 1){

	 echo strtoupper($print);

	} else {

		echo $print;
	}

}



function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

?>

