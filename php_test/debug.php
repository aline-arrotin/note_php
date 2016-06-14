<pre id="debug">
<?php 
	var_dump($jour);
	print_r($cours);
	print_r($_GET); //il affiche un array avec un tableau test.
	print_r($_SESSION);
?>
</pre>
<?php //phpinfo(32); ?>
<!-- Donne toutes les infos auquel le serveur php a accès.
Le numero 32 est le num d'un tableau specifique,
il permet de n'afficher que celui-là. 
Il  y a moment de créer un context d'url en apant apres ?test=5.
-->