<?php
session_start();

// Attendez 15 secondes
// sleep(2);

// Détruisez la session
session_destroy();

// Redirigez vers la page de connexion
header("Location:/judy/index.php");
exit();
?>

