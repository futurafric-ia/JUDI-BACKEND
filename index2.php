<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer des Prompts</title>
</head>
<body>

<h2>Formulaire d'envoi de prompts</h2>

<form action="" method="post">
    <!-- Champ hidden avec la valeur par défaut "user" pour le rôle -->
    <input type="hidden" name="role" value="user">
    
    <label for="content">Contenu:</label>
    <input type="text" id="content" name="content" required>
    <br>
    <input type="submit" value="Envoyer Prompt">
</form>

<?php

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Définir l'URL de l'API
    $url = 'http://127.0.0.1:8000/question/';

    // Récupérer les données du formulaire
    $role = $_POST['role'];
    $content = $_POST['content'];

    // Créer un tableau avec les données du formulaire
    $data = array(
        array(
            'role' => $role,
            'content' => $content
        )
    );

    // Convertir le tableau en format JSON
    $jsonData = json_encode($data);

    // Initialiser une session cURL
    $ch = curl_init($url);

    // Configurer les options cURL
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ));

    // Exécuter la requête cURL
    $response = curl_exec($ch);

    // Vérifier les erreurs cURL
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    }

    // Fermer la session cURL
    curl_close($ch);

    // Afficher la réponse de l'API
    echo '<p>Réponse de l\'API : ' . $response . '</p>';
}

?>

</body>
</html>
