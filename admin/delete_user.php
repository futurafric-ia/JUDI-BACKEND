<?php
// Vérifiez si l'ID de l'utilisateur à supprimer est présent dans la requête POST
if (isset($_POST['id'])) {
    // Connexion à la base de données
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname ='judy';

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Préparez la requête SQL pour supprimer l'utilisateur avec l'ID spécifié
    $userId = $_POST['id'];
    $sql = "DELETE FROM utilisateurs WHERE id = $userId";

    // Exécutez la requête SQL
    if ($conn->query($sql) === TRUE) {
        // La suppression a réussi
        echo "Utilisateur supprimé avec succès.";
    } else {
        // Erreur lors de la suppression
        echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // ID de l'utilisateur manquant dans la requête POST
    echo "ID de l'utilisateur manquant dans la requête.";
}
?>
