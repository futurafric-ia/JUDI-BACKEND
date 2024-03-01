<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['id'])) {
    // Récupérer l'ID de l'utilisateur connecté depuis la session
    $current_user_id = $_SESSION['id'];

    // Récupérer les autres données de la session depuis la requête POST
    $session_nom = $_POST['session_nom'];
    $content = $_POST['content'];
    $timestamp = $_POST['timestamp'];

    // Connexion à la base de données
    $serveur = 'localhost'; // Adresse du serveur MySQL
    $utilisateur = 'root'; // Nom d'utilisateur MySQL
    $motDePasse = ''; // Mot de passe MySQL
    $baseDeDonnees = 'votre_base_de_donnees'; // Nom de la base de données

    // Créer une connexion
    $conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer la requête SQL d'insertion
    $sql_insert = "INSERT INTO session (session_nom, id_user, content, timestamp) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ssss", $session_nom, $current_user_id, $content, $timestamp);
    
    // Exécuter la requête SQL d'insertion
    if ($stmt_insert->execute()) {
        echo "Enregistrement de la session réussi.";
    } else {
        echo "Erreur lors de l'enregistrement de la session: " . $conn->error;
    }

    // Fermer la connexion et la déclaration
    $stmt_insert->close();
    $conn->close();
} else {
    // L'utilisateur n'est pas connecté, vous pouvez rediriger vers la page de connexion par exemple
    echo "L'utilisateur n'est pas connecté.";
}
?>
