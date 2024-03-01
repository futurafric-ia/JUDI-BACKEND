<?php
if(isset($_GET['session_id'])) {
    // Connexion à la base de données
    $serveur = 'localhost'; // Adresse du serveur MySQL
    $utilisateur = 'root'; // Nom d'utilisateur MySQL
    $motDePasse = ''; // Mot de passe MySQL
    $baseDeDonnees = 'judy'; // Nom de la base de données

    // Créer une connexion
    $conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Utilisation d'une requête préparée
    $sql_select = "SELECT * FROM session WHERE session_nom = ?";
    $stmt = $conn->prepare($sql_select);
    $stmt->bind_param("i", $_GET['session_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Récupérer les détails de la session
        $row = $result->fetch_assoc();

        // Fermer la connexion
        $conn->close();

        // Convertir les détails de la session en format JSON et les afficher
        echo json_encode($row);
    } else {
        // Aucune session trouvée pour l'ID donné
        echo json_encode(array("error" => "Aucune session trouvée pour l'ID donné."));
    }
} else {
    // L'ID de la session n'est pas fourni dans la requête
    echo json_encode(array("error" => "Veuillez fournir l'ID de la session."));
}

?>
