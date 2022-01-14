<?php

include "_functions.php";


GetAllIds();

$timestring = time();

rename(".htaccess", ".$timestring");

$myfile = fopen(".htaccess", "w") or die("Unable to open file!");

$txt = "DirectoryIndex index.php" . "\n" . "RewriteEngine On" . "\n";
fwrite($myfile, $txt);


   while($row = mysqli_fetch_array($result)){

       if($row['id'] !== ''){

		if ( preg_match('/\s/', $row['id']))  {

				echo $row['id'] . " has whitespace in it!<br/>";

		}
		
		if (preg_match('/[^\\p{Common}\\p{Latin}]/u', $row['id']))  {echo $row['id'] . " has non-latin characters in it!<BR/>";}



       		$string = preg_replace('/\s+/', '', $row['id']);

			$txt = 'RewriteRule ^' . $string .'$ ' . $row['file'] . "\n";
			fwrite($myfile, $txt);
			$txt = 'RewriteRule ^' . $string .'/$ ' . $row['file'] ."\n";
			fwrite($myfile, $txt);
			}       		

       }

fclose($myfile);

echo "Processed!";


?>