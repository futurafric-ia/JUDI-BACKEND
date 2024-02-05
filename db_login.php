<?php
session_start(); // Démarrer la session

// Informations de connexion à la base de données
$serveur = '154.56.47.52'; // Adresse du serveur MySQL
$utilisateur = 'u139181064_judi'; // Nom d'utilisateur MySQL
$motDePasse = 'FuturAfric2023@'; // Mot de passe MySQL
$baseDeDonnees = 'u139181064_judi'; // Nom de la base de données

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);

    // Définir le mode d'erreur PDO sur exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'email et le mot de passe sont fournis dans le formulaire
    if (empty($_POST['email']) || empty($_POST['mot_de_passe'])) {
        echo "Erreur : L'adresse e-mail et le mot de passe sont requis.";
    } else {
        // Récupérer l'email et le mot de passe du formulaire
        $email = $_POST['email'];
        $motDePasseFourni = $_POST['mot_de_passe'];

        // Vérifier si l'utilisateur existe
        $requeteVerification = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $requeteVerification->execute([$email]);
        $utilisateur = $requeteVerification->fetch(PDO::FETCH_ASSOC);

        if (!$utilisateur) {
            // L'utilisateur n'existe pas
            echo "Erreur : L'utilisateur avec cet email n'existe pas.";
        } else {
            // Vérifier si le mot de passe correspond
            if (password_verify($motDePasseFourni, $utilisateur['mot_de_passe'])) {
                // Mot de passe correct, l'utilisateur est connecté
                $_SESSION['id'] = $utilisateur['id'];
                $_SESSION['email'] = $utilisateur['email'];
                header("Location: index3.php");
                exit();
            } else {
                // Mot de passe incorrect
                header("Location: login.php");
                echo "Erreur : Mot de passe incorrect.";
            }
        }
    }

    // Fermer la connexion à la base de données
    $connexion = null;
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>
