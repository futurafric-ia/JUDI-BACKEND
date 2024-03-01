<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['id'])) {
    // Récupérer l'ID de l'utilisateur connecté
    $current_user_id = $_SESSION['id'];

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
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer la requête SQL de sélection des sessions pour l'utilisateur connecté
    $sql_select = "SELECT session_nom, content FROM session WHERE id_user = $current_user_id";

    // Exécuter la requête SQL
    $result = $conn->query($sql_select);

    // Créer un tableau pour stocker les données des sessions
    $sessions = array();

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Ajouter les données de chaque session au tableau
        while($row = $result->fetch_assoc()) {
            $session = array(
                "session_nom" => $row["session_nom"],
                "content" => $row["content"]
            );
            $sessions[] = $session;
        }
    } else {
        // Aucune session trouvée dans la base de données pour l'utilisateur connecté
        echo "Aucune session trouvée dans la base de données pour l'utilisateur connecté.";
    }

    // Fermer la connexion
    $conn->close();

    // Convertir le tableau en JSON et l'afficher
    echo json_encode($sessions);
} else {
    // L'utilisateur n'est pas connecté, vous pouvez rediriger vers la page de connexion par exemple
    echo "L'utilisateur n'est pas connecté.";
}
?>
