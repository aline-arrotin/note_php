<?php 
	class Voiture{
		function __construct(){
			$this->roues = 4;//Immuable donc ici.
		}

		function Infos($marque,$model,$color,$year){ //Paramètre non immuable, donc ca ne change pas. Je définis les paramètres.
			$this->marque = $marque;
			$this->model = $model;
			$this->color = $color;
			$this->year = $year;
		}

		function Affiche(){//J'affiche les infos.
			echo"<h1>".$this->marque."</h1>";
			echo"<h2>".$this->model."</h2>";
			echo"<ul>";
				echo"<li>".$this->color."</li>";
				echo"<li>".$this->year."</li>";
				echo"<li>".$this->roues." roues</li>";
			echo"</ul>";
		}

		function ChangeRoues($nb){
			$this->roues = $nb;
		}

	}//end class
?>