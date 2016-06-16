<?php require_once("config.php"); ?>
<?php require_once("function.php"); ?>
<?php 
	if(isset($_GET['delog'])) :
		unset($_SESSION['auteur']);
		header("location:index.php");
		exit;
		endif; //Pour se deloger d'une session.


$sql = sprintf("SELECT * FROM auteur WHERE email = '%s' AND password = '%s'", //Requête à partir de ma vue.

		$_POST['email'],
		$_POST['password']
		);

	$myAuteur = $db_connect->query($sql);
	echo $db_connect->error;


while($row = $myAuteur->fetch_object()) :
		$allRowsmyAuteur[] = $row; 
endwhile;

$myAuteur->num_rows;

if($myAuteur->num_rows > 0) :
	$thisRow =  $allRowsmyAuteur[0];
	$_SESSION['auteur']['id_auteurs'] = $thisRow -> id_auteurs;//Premier auteur fait reference au nom de la table.
	$_SESSION['auteur']['email'] = $thisRow -> email;
	header("location:index.php");
	exit;

else :
	header("location:index.php?error=log");
	exit;

endif;
?>