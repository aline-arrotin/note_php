<?php include_once("function.php"); ?>
<?php //session_destroy(); ?>
<?php if(isset($_POST['newCar'])) :
	include_once("classes.php");
	session_start();
		$newCar = new Voiture; //dDans ma session tu me crées un nouvel array voiture dans lequel tu me mets un array que j'appel new car
		$newCar->Infos($_POST['marque'],$_POST['model'],$_POST['color'],$_POST['year']);
		$_SESSION["voiture"][] = $newCar;//DAns mon array je viens enregistrer les infos de la nouvelle voiture.
		header("location:cars.html");
		exit;
		endif;

	  //myPrint_r($_SESSION,"print");
	  	//echo $_SESSION['voiture'][0]->marque;

	for($i=0; $i < count($_SESSION['voiture']); $i++) :
		$_SESSION['voiture'][$i]->Affiche();//[i]represente la valeur de la case.
	endfor;

	 //  $voiture1 = new Voiture;
	 //  $voiture1->Infos("Peugeot",404,"rouge",2014);//J'appelle ma fonction et je lui passe les propriétes.
	  
	 //  $voiture2 = new Voiture;
	 //  $voiture2->ChangeRoues(2);
	 //  $voiture2-> Infos("Mini",100,"marine",2016);
	  
	 //  $voiture3 = new Voiture;
	 //  $voiture3->ChangeRoues(6);
	 //  $voiture3-> Infos("Mini",100,"marine",2016);


	 //  $voiture1->Affiche();
		// myPrint_r($voiture1,"vardump");

	 //  $voiture2->Affiche();

	 //  $voiture3->Affiche();
 ?>

 <form action="cars.php" method="post">

 	<h1>New car</h1>

 	<label for="marque">Marque : </label>
 	<input type="text" name="marque" id="marque" required><br>

 	<label for="model">Modèle : </label>
 	<input type="text" name="model" id="model" required><br>

 	 <label for="color">Couleur : </label>
 	<input type="text" name="color" id="color" required><br>

 	<label for="year">Année : </label>
 	<input type="date" name="year" id="year" required><br>

 	<input type="submit" name="newCar" id="newCar" value="ENVOYER">
 </form>