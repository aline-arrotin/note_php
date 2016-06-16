<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:index.php"); //to redirect back to "index.php" after logging out
exit;


//Interessant comme code mais on evite de faire un session destroy sinon on perd les infos sur l'utilisateur et ca n'est pas inetressant.
?>

