<?php 
include("models/questions.php");


$listQ = new Questions;


if(isset($_POST['new_Quest'])) :
	$listQ -> insert($_POST);
	header("location:index.php");
	exit;
endif;
 s
include("views/questions.php");
$listQView = new QuestionsView;


$array = $listQ -> listingQA(); // je vais chercher l'infos et je le mets dans la variable $array

include("header.php");

$listQView ->listing($array); // ma fonction listing passe ce tableau dans ma vue.
$listQView ->insert_forms();

include("footer.php");

?>