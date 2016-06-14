<?php 
/*
	$nom = "Arrotin"; //Simple ou double quote a une signification en php. Laisser les simples quote pour js.
	$prenom = "Aline";
	$sex = "femme";
	$ddn = "1990-05-20";
	$enfants = "licornes 2"; //Même si j ai une chaine de caractère php va chercher la valeur numérique dans mon string, si elle est au tout debut sinon, ca vaut 0. Php est hyper permissif.
	echo $enfants +2;

	echo $prenom." ".$nom." ".$sex;
	echo "<p>$prenom $nom $sex</p>";
	echo '<p>' .$prenom. ' ' .$nom. ' ' .$sex. '</p>';

	//Constante: espace mémoire. Contenu constant qui n'évolue pas

	define("SERVER", "http://google"); // C ets mieux de taper le nom des constantes en majuscules.

	echo SERVER; //J'appel ma constante. EN majuscule, comme ca je peux la distinguer des variables.
	//Les serveurs et les bases de données vont être mis en constante. */



//ARRAY indexé(automatique).
	/*$personne = array(
			"Arrotin", "Aline", "cepegra"
		);

	echo $personne[0]." ".$personne[1]." ".$personne[2];

//ARRAY associatif. Quand je dois prendre des éléments de propriétés.
	$personne2 = array(
		"nom" => "Arrotin",
		"prenom" => "Aline",
		"centre" => "Cepegra"
		);

	echo $personne2["nom"]. " " .$personne2["prenom"];*/


	$personnel = array(//automatique.

		array( //Associatif
			"nom" => "Arrotin",
			"prenom" => "Mary",
			"centre" => "SNCB"
			),

		array(
			"nom" => "Dury",
			"prenom" => "Arnaud",
			"centre" => "SNCB"
			),

		array(
			"nom" => "Mareschal",
			"prenom" => "Meganne",
			"centre" => "Cepegra" //Dernier pas de virgule.
			)
		);

		echo $personnel[0]["nom"];
		echo "<ul>";


		//For permet de calibrer la boucle. Je peux reguler ma boucle.
		// on le garde pour les tableaux numériques.

		for( $i = 0; $i < count($personnel); $i++) ://si je mets un endfor je dois mettre ":" ici.
			echo "<li>".$personnel[$i]["nom"]. " " .$personnel[$i]["prenom"]."</li>";
		endfor; //ferme le for

		echo "</ul>";


		//Foreach, on ne maitrise rien, il prend tout et balance tout.
		//on garde le foreach pour les tableaux associatif.

		echo "<ul>";
			foreach ($personnel as $personne) :
				//var_dump($value); //Permet de voir le contenu et le type d'une variable.
				echo "<li>";
					foreach($personne as $key =>$value) : //je recupere la cle et la value de mon tableau associatif.
						echo $key." : ".$value." - "; //Je l'affiche.
					endforeach;
				echo "</li>";
			endforeach;
		echo "</ul>";








		/*echo "<pre>"; //Permet d analyser une variable. Sort tous les niveaux d une variable. Pour debugger.
			print_r($personnel); //donne un detail de la variable mais simplifiée. Outil de debuggage. J'aurais pu faire un "var_dump", mais plus de details.

		echo "</pre>";*/

 ?>