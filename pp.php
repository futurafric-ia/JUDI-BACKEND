<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Sessions</title>
    <style>
        /* Styles CSS pour la mise en forme */
        .session {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Liste des Sessions</h1>
    <?php
    // Inclure le code PHP pour récupérer les sessions depuis la base de données
    include 'sessionlistedb.php'; // Remplacez 'recuperer_sessions.php' par le nom de votre fichier PHP

    // Vérifier s'il y a des sessions à afficher
    if ($result->num_rows > 0) {
        // Afficher les données de chaque session
        while($row = $result->fetch_assoc()) {
            // Générer le HTML pour chaque session
            echo '<div class="session">';
            echo '<p>ID: ' . $row["id"] . '</p>';
            echo '<p>ID de l\'utilisateur: ' . $row["id_user"] . '</p>';
            echo '<p>Nom de la session: ' . $row["session_nom"] . '</p>';
            echo '<p>Contenu: ' . $row["content"] . '</p>';
            echo '<p>Timestamp: ' . $row["timestamp"] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Aucune session trouvée dans la base de données.</p>';
    }
    ?>
</body>
</html>
