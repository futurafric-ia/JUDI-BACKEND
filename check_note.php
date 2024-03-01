<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Ici, vous devrez remplacer les valeurs de connexion à votre base de données
    $servername = '154.56.47.52';
    $username = 'u139181064_judi';
    $password = 'FuturAfric2023@';
    $dbname ='u139181064_judi';
// $serveur = '154.56.47.52'; // Adresse du serveur MySQL
// $utilisateur = 'u139181064_judi'; // Nom d'utilisateur MySQL
// $motDePasse = 'FuturAfric2023@'; // Mot de passe MySQL
// $baseDeDonnees = 'u139181064_judi'; // Nom de la base de données

    // Créer une connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $user_id = $conn->real_escape_string($user_id);

    // Préparer la requête SQL pour rechercher la note de l'utilisateur dans la base de données
    $sql = "SELECT note FROM utilisateurs WHERE id = '$user_id'";

    // Exécuter la requête SQL
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Récupérer la note de l'utilisateur
        $row = $result->fetch_assoc();
        $note = $row['note'];

        // Retourner la note (ou "null" si la note est vide)
        echo json_encode($note);
    } else {
        // Aucun utilisateur trouvé avec l'ID donné
        echo json_encode("null");
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // Utilisateur non connecté
    echo json_encode("null");
}
?>
