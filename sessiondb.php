<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['id'])) {
    // Récupérer l'ID de l'utilisateur connecté depuis la session
    $current_user_id = $_SESSION['id'];

    // Afficher l'ID de l'utilisateur pour vérification
    echo "ID de l'utilisateur connecté : " . $current_user_id . "<br>";

    // Récupérer les autres données de la session depuis la requête POST
    $content = $_POST['content'];
    $timestamp = $_POST['timestamp'];

    // Afficher les autres données de la session pour vérification
    echo "Contenu : " . $content . "<br>";
    echo "Timestamp : " . $timestamp . "<br>";

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

    // Vérifier si la session existe déjà
    $sql_verif = "SELECT MAX(session_nom) AS max_session_nom FROM session";
    $result_verif = $conn->query($sql_verif);
    $row_verif = $result_verif->fetch_assoc();

    // Récupérer le prochain session_nom
    $next_session_nom = ($row_verif['max_session_nom'] !== null) ? $row_verif['max_session_nom'] + 1 : 1;

    // Préparer la requête SQL d'insertion
    $sql_insert = "INSERT INTO session (session_nom, id_user, content, timestamp) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ssss", $next_session_nom, $current_user_id, $content, $timestamp);
    
    // Exécuter la requête SQL d'insertion
    if ($stmt_insert->execute()) {
        echo "Enregistrement de la session réussi avec le session_nom: " . $next_session_nom;
    } else {
        echo "Erreur lors de l'enregistrement de la session: " . $conn->error;
    }

    // Fermer les déclarations et la connexion
    $stmt_insert->close();
    $conn->close();
} else {
    // L'utilisateur n'est pas connecté, vous pouvez rediriger vers la page de connexion par exemple
    echo "L'utilisateur n'est pas connecté.";
}
?>
