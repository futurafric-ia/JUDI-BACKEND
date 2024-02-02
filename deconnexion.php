<?php
session_start();

// Détruisez la session
session_destroy();

// Redirigez vers la page de connexion
header("Location: login.php");
exit();
?>
