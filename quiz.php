<?php

include "_functions.php";

$page = "quiz.php";
include "_head.php";



// Question types
// A. Recognize movie director by the cover image RecognizeByCover($type)
// B. Recognize the movie by the the cover mage RecognizeByCover()
// C. Guess how old is the movie
// D. Guess who is movie director

$Q_TYPES = array(
    'Do you recognize this guy?',
    'Can you recognize this movie by a still?',
    'Looks old, right? But do you know how old is it?',
    "Do you know who directed this movie?" 
);





// User status
// 1. User lands on Quiz page LANDED 
// 2. Quiz session initiated STARTER_QUIZ
// 3. User passes all quiz questions FINISHED_QUIZ
// 4. User redirected to the thank you page THYP



// Quiz steps
// 0 = not started
// 1 = first question answered
// 2 = 2nd question answered 
// ... 
// n = last question answered

$limit = 10;


if (empty($_POST['step'])){

	$step = 0;
	$last_q_type = '';

} else {

 	$step = $_POST['step'];
 	echo "You answered " .$_POST['answer'] . "<BR>";
 	$last_q_type = $_POST['last_q_type'];

}








	



switch($step){

	case 0:

	 echo 'no questions answered<br/>';

	 break;

	case 1:

	 echo '1 question answered<br/>';

	 break;

	case $limit:

	 echo "All $limit questions answered. Test passed";

	break;

	default:

	 echo "$step question answered<br/>";

}

$step_status[0] = 'Quiz not started';


// Create question and answers
// 4. Random question type selected
// 5. Random question selected
// 6. Multiple choice random but unique answers generated
// 7. User selects


// Thank You Page
// - Share quiz results 
// - Try Again (if results not good)
// - Become cinemAnniac = join the club (open only for those who pass the test successfully

	
$key = array_rand($Q_TYPES);
	
	if($key == $last_q_type){

		$key = array_rand($Q_TYPES);

	}	



if ($step < $limit){

echo "<h1>" . $Q_TYPES[$key] . "</h1><BR/>";


switch ($key) {
	case 0:
		echo "random famous director will be chosen<br/>";
		echo "show cover image of this director<br/>";
		break;

	case 1:
		echo "random famous movie will be chosen<br/>";
		echo "show cover image of a movie<br/>";
		break;	

	case 2:
		echo "random famous movie will be chosen<br/>";
		echo "Display movie title and director name<br/>";
		break;	
	
	case 3:
		echo "random famous movie will be chosen<br/>";
		echo "Display movie title and year<br/>";
		break;		
	
	default:
		# code...
		break;
}






	include 'quiz/_form.php';
}

	include 'quiz/_restart.php';


	include "_footer.php";

?>


