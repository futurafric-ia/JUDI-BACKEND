<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $content = $_POST['content']; // Nouveau contenu de la session à mettre à jour
    $session_nom = $_POST['session_nom']; // Nom de la session

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

    // Requête SQL pour vérifier si le contenu existe déjà pour le nom de session
    $sql_select_content = "SELECT * FROM session WHERE session_nom = ?";
    $stmt_content = $conn->prepare($sql_select_content);
    $stmt_content->bind_param("s", $session_nom);
    $stmt_content->execute();
    $result_content = $stmt_content->get_result();

    // Vérifier si la session existe pour le nom de session
    if ($result_content->num_rows > 0) {
        // La session existe, effectuer la mise à jour
        $sql_update = "UPDATE session SET content = ? WHERE session_nom = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("ss", $content, $session_nom);
        if ($stmt->execute()) {
            echo "Mise à jour du contenu réussie.";
        } else {
            echo "Erreur lors de la mise à jour du contenu: " . $conn->error;
        }
    } else {
        // La session n'existe pas pour le nom de session
        echo "La session n'existe pas pour ce nom de session.";
    }

    // Fermer la connexion
    $conn->close();
}
?>
