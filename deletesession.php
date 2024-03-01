<?php
// Récupérer le nom de la session à supprimer depuis la requête HTTP
$session_nom = $_POST['session_nom']; // Assurez-vous que vous envoyez cette valeur depuis votre page HTML ou JavaScript

// Connexion à la base de données
// $serveur = 'localhost'; // Adresse du serveur MySQL
// $utilisateur = 'root'; // Nom d'utilisateur MySQL
// $motDePasse = ''; // Mot de passe MySQL
// $baseDeDonnees = 'judy'; // Nom de la base de données

$serveur = '154.56.47.52'; // Adresse du serveur MySQL
$utilisateur = 'u139181064_judi'; // Nom d'utilisateur MySQL
$motDePasse = 'FuturAfric2023@'; // Mot de passe MySQL
$baseDeDonnees = 'u139181064_judi'; // Nom de la base de données

// Créer une connexion
$conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Préparer la requête SQL de suppression de la session
$sql = "DELETE FROM session WHERE session_nom = ?"; // Utilisation de '?' comme paramètre de liaison

// Préparer et exécuter la requête préparée
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_nom); // 's' pour une chaîne de caractères
$stmt->execute();

// Vérifier si la suppression a réussi
if ($stmt->affected_rows > 0) {
    echo "La session a été supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la session : " . $conn->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>
