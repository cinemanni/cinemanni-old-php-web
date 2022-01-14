<!DOCTYPE html>
<html lang="en">

<head>

<?php 

  include "_tag_manager_head.php";
  include "_facebook_login.php";
  include "_facebook_pixel_code.php";

?>


    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html" />
     <meta http-equiv="Content-Type" content="charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>cinemAnni</title>

    <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
<?php 

if(!empty($_GET['cover'])){

    $cover_image = $_GET['cover'] . ".jpg"; // enables to set up different cover image by GET parameter for the same movie or director
    $add_to_url = '?cover=' .  $_GET['cover'];

} else {

$cover_image = 'cover.jpg';
    $add_to_url = '';
}


?>

  <?php  if($page == "index.php"): ?>

     <?php   $canonical = "https://www.cinemanni.com/"; ?>

    <meta property="og:title" content="cinemAnni" />
    <meta property="og:description" content="Films also have birthdays" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://www.cinemanni.com/images/movies/last-year-at-marienbad/cover.jpg" />
    <meta property="fb:app_id" content="2033168253626364" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="description" content="Films also have birthdays" />

  <?php  endif; ?>



  <?php  if($page == "director.php"): ?>

        <?php   $canonical = "https://www.cinemanni.com/" . $DIRECTOR["id"] . $add_to_url; ?>

    <meta property="og:title" content="<?php  DirectorAnniversary($next_birthday_year, 0); echo " of " . $DIRECTOR['name']; ?>" />
    <meta property="og:description" content="cinemAnni - Films also have birthdays" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://www.cinemanni.com/images/directors/<?php echo $DIRECTOR["id"] . "/" . $cover_image; ?>" />
    <meta property="fb:app_id" content="2033168253626364" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="description" content="Films also have birthdays" />

  <?php  endif; ?>


  <?php  if($page == "movie.php"): ?>

     <?php   $canonical = "https://www.cinemanni.com/" . $MOVIE["id"] . $add_to_url; ?>
    <meta property="og:title" content="<?php  MovieAnniversary($next_birthday_year, 0); echo " of &laquo;" . ucwords($MOVIE['title']) . "&raquo; directed by "; printAllDirectors($url=FALSE); ?>" />
    <meta property="og:description" content="Films also have birthdays." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://www.cinemanni.com/images/movies/<?php echo $MOVIE["id"] . "/" . $cover_image; ?>" />
    <meta property="fb:app_id" content="2033168253626364" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="description" content="Films also have birthdays." />
   
  <?php  endif; ?>

  <meta property="og:url" content="<?php echo $canonical; ?>" />
    <link rel="canonical" href="<?php echo $canonical; ?>">



    <!-- Assets -->
    <link rel="stylesheet" href="css/tilda-grid-3.0.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/tilda-blocks-old.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/tilda-blocks-2.12.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/tilda-animation-1.0.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

<!--link rel="stylesheet" href="https://tilda.ws/css/tilda-grid-3.0.min.css" rel="stylesheet" media="screen"-->
<!--link rel="stylesheet" href="https://tilda.ws/project33789/tilda-blocks-2.12.css" rel="stylesheet" media="screen">
<!--link rel="stylesheet" href="https://tilda.ws/css/tilda-animation-1.0.min.css" rel="stylesheet" media="screen"-->


    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/tilda-scripts-2.8.min.js"></script>
    <script src="js/tilda-blocks-2.7.js?t=1507397653"></script>
    <script src="js/tilda-animation-1.0.min.js"></script>
    <script src="js/lazyload-1.3.min.js"></script>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.7.1/dist/clipboard.min.js"></script>



</head>

<body class="t-body" style="margin:0;">

<?php 

  include "_tag_manager_body.php"; 
  include "_facebook_body.php";

?>




    
    <!--allrecords-->
<div id="allrecords" class="t-records" data-hook="blocks-collection-content-node" data-tilda-project-id="33789" data-tilda-page-id="1757175" data-tilda-formskey="36600143eabe3f1f6f311c073725f1f6">


<div id="rec35143692" class="r t-rec" style="background-color:#ffffff; "  data-record-type="215"   data-bg-color="#ffffff">
<a name="start" style="font-size:0;"></a>
</div>


<div id="rec35866996" class="r t-rec" style=" "  data-record-type="145"   >
<!-- T135 -->
<div class="t135" style="position:fixed; z-index:35866996; top:20px; left:20px;  right:; min-height:30px;">
<a href="/"><img src="https://static.tildacdn.com/tild3765-3662-4438-b434-363931633935/appleicon60x60.png" imgfield="img" class="t135__img" ></a></div>
</div>



