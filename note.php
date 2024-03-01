<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Ici, vous devrez remplacer les valeurs de connexion à votre base de données
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname ='judy';

    // Créer une connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $user_id = $conn->real_escape_string($user_id);

    // Préparer la requête SQL pour rechercher l'utilisateur dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE id = '$user_id'";

    // Exécuter la requête SQL
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Mettre à jour la note pour l'utilisateur trouvé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifier si la note a été sélectionnée
            if (isset($_POST["rating"])) {
                // Récupérer la note sélectionnée depuis le formulaire
                $rating = $_POST["rating"];

                // Échapper les caractères spéciaux pour éviter les injections SQL
                $rating = $conn->real_escape_string($rating);

                // Préparer la requête SQL pour mettre à jour la note dans la base de données
                $update_sql = "UPDATE utilisateurs SET note='$rating' WHERE id='$user_id'";

                // Exécuter la requête SQL de mise à jour
                if ($conn->query($update_sql) === TRUE) {
                    header("Location: index3.php");
                } else {
                    echo "Erreur lors de la mise à jour de la note : " . $conn->error;
                }
            } else {
                echo "Veuillez sélectionner une note.";
            }
        }
    } else {
        echo "Aucun utilisateur trouvé avec l'ID : $user_id";
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo "Utilisateur non connecté.";
}
?>
