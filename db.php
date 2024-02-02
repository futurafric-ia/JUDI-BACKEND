<?php
// Informations de connexion à la base de données
$serveur = 'localhost'; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motDePasse = ""; // Mot de passe MySQL
$baseDeDonnees = 'judy'; // Nom de la base de données

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);

    // Définir le mode d'erreur PDO sur exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'email est fourni dans le formulaire
    if (empty($_POST['email'])) {
        echo "Erreur : L'adresse e-mail est requise.";
    } else {
        // Récupérer l'email du formulaire
        $email = $_POST['email'];

        // Vérifier si l'email est déjà utilisé
        $requeteVerification = $connexion->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
        $requeteVerification->execute([$email]);
        $nombreUtilisateurs = $requeteVerification->fetchColumn();

        if ($nombreUtilisateurs > 0) {
            // L'email est déjà utilisé, afficher une boîte de dialogue
           header("Location: inscription.php");
            exit();
        } else {
            // L'email n'est pas utilisé, procéder à l'inscription

            // Récupérer les autres données du formulaire
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $motDePasse = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hachage du mot de passe
            $dateInscription = date('Y-m-d H:i:s');
 
            // Préparer la requête d'insertion
            $requete = $connexion->prepare("INSERT INTO utilisateurs (prenom, nom, email, mot_de_passe, date_inscription) VALUES (?, ?, ?, ?, ?)");

            // Exécuter la requête avec les valeurs fournies
            $requete->execute([$prenom, $nom, $email, $motDePasse, $dateInscription]);
            header("Location: login.php");
            exit();
        }
    }

    // Fermer la connexion à la base de données
    $connexion = null;
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>
