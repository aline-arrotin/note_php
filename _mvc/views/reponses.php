<?php 
class ReponsesView{
	function __construct(){

	}

	function listing($array) {?>
		<h1>Les réponses</h1>

			<h2><?php echo $array['0'] -> titre; ?></h2>

					<?php for($i=0; $i < count($array); $i++) :
					$myRow = $array[$i]; ?>
						<p><?php echo $myRow->label; ?></p>
					<?php endfor; ?>
	<?php }

			function insert_forms() {?>
			<form method="post">

			<label for="label">Votre question</label><br>
			<textarea name="label" id="label"></textarea><br>


			<label for="date"></label><br>
			<!-- <input type="hidden" name="date" id="date" value="<?php //echo date('Y-m-d'); ?>"> -->
			<input type="hidden" name="id_question" value="<?php echo $_GET['id_question'] ?>"></input>
			<input type="hidden" name="new_Rep" value="yes">
			<input type="submit" value="Envoyer"></input>
				
			</form>
		<?php }
	}
?>