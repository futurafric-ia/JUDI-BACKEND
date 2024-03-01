<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté en vérifiant la présence de la variable de session 'id'
if (!isset($_SESSION['id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: index.php");
    exit();
}
// Les informations de l'utilisateur sont disponibles dans la session
$emailUtilisateur = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>JUDI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="futur.jpg" type="image/x-icon">


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Ajoutez la référence à la bibliothèque Toastify.js -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xrknDq7VbN8ylOPL6Mo9RJlgq8FSc3SFMF+ThvvU75zDtzYSfL3vSIO4jMr0I6cgT1GYeCpoix7z2iMRcMR9zg==" crossorigin="anonymous" />
    <style>
  
        .send-icon {
            position: absolute;
            top: 55%;
            right: 35px;
            transform: translateY(-50%);
            color: #007bff; /* Couleur de l'icône, vous pouvez la personnaliser */
            cursor: pointer;
        }

        .microphone-icon {
            position: absolute;
            top: 55%;
            right: 10px;
            transform: translateY(-50%);
            color: #007bff; /* Couleur de l'icône, vous pouvez la personnaliser */
            cursor: pointer;
        }

        .micro{
            position: absolute;
            top: 55%;
            right: 0px;
            transform: translateY(-50%);
            color: #007bff; /* Couleur de l'icône, vous pouvez la personnaliser */
            cursor: pointer;
        }


        #chatHistory::-webkit-scrollbar {
    width: 0; /* Masquer la barre de défilement verticale */

}

body::-webkit-scrollbar {
    width: 0; /* Masquer la barre de défilement verticale */
}
        .chat-container {
            max-width: 100%;
            margin: auto;
            padding:auto;
            
        }

        .chat-box {
            /* border: 1px solid #ccc; */
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
           
        }

        #chatHistory {
    max-height: 80vh;
    overflow-y: auto; /* Activez le défilement vertical si nécessaire */
}

.chat-history {
    list-style-type: none;
    padding: 10px;
    margin: 0;
    margin-bottom: 20px; 
}
        /* .user-message, .bot-message {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
        }

        .user-message {
            background-color: #f0f0f0;
            text-align: right;
        } */

        /* .bot-message {
            background-color: #e0e0e0;
        } */
       

        /* body {
            transition: background-color 0.3s ease;
            margin: 0px;
            padding: 0px;
        } */

        .sidebar {
            transition: background-color 0.3s ease;  
        }

        a {
        text-decoration: none;
    }

    h1 {
        text-align: center;
        margin: auto;
    }

    .btn{
      border: 3px solid #000;
      color: #000;
     border-radius: 20px;
     width: 90%;
    }

    .btn:hover{
        border: 3px solid #ccc;
    }

    /* Ajoutez ce style à votre feuille de style CSS ou dans la balise <style> de votre document HTML */

.list-unstyled.components {
  margin-top: 8px; /* Ajoute de l'espace en haut de la liste */
  color: #000;
  
}

.btn {
  margin-top: 35px; /* Ajoute de l'espace en haut du bouton */
}

.form-check, .form-switch {
  margin-top: 35px; /* Ajoute de l'espace en haut des éléments de formulaire */


.fa-sign-out-alt {
  margin-top: 8px; /* Ajoute de l'espace en haut de l'icône de déconnexion */
}

#questionHistoryContainer {
  margin-top: 8px; /* Ajoute de l'espace au-dessus du conteneur d'historique des questions */
}

#sessionList {
            max-height: 300px; /* Hauteur maximale de la liste déroulante */
            overflow-y: auto; /* Activer le défilement vertical si nécessaire */
            border: 1px solid #ccc;
            padding: 10px;
        }


        .user-email {
    border: 1px solid black;
}

body::-webkit-scrollbar {
        width: 0; /* Masquer la barre de défilement verticale */
    }
    
#sessionNomDiv,
#storeSessionNomBtn,
#sessionNomDisplay {
    display: none !important; /* Utiliser !important pour s'assurer que la règle est prioritaire */
}

/* Appliquer la couleur noire à tout le texte */
body,
h1,
a,
.btn,
.form-check-label,
.form-switch,
.fa-sign-out-alt,
#questionHistoryContainer,
#sessionList,
.user-email {
    color: #000 !important;
}

.custom-menu {
    position: fixed; /* Position fixe pour le placer toujours à un endroit spécifique */
    top: 20px; /* Ajustez selon vos besoins */
    left: 20px; /* Ajustez selon vos besoins */
    z-index: 1000; /* Assure que le bouton reste au-dessus du reste du contenu */
}

#sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh; /* Hauteur égale à 100% de la hauteur de la fenêtre du navigateur */
    width: 250px; /* Ajustez selon vos besoins */
    background-color: #333; /* Couleur de fond du sidebar */
    padding-top: 50px; /* Espace pour le header */
    overflow-y: auto; /* Permet le défilement vertical si nécessaire */
}

#content {
    margin-left: 250px; /* Assure que le contenu démarre après le sidebar */
    padding: 20px; /* Espace pour le contenu */
}


    </style>
</head>
<body class="d-flex flex-column h-100">

<!-- toast de connexion -->
<style>
    #sidebar {
  display: flex;
  flex-direction: column;
  background-color: #EAECEE ;
}


.custom-btn {
    background-color: gray;
    border-color: gray;
    color: white;
}

.custom-btn:hover,
.custom-btn:focus {
    background-color: darkgray;
    border-color: darkgray;
    color: white;
}


</style>

<div class="wrapper d-flex align-items-stretch">

<nav id="sidebar">
<div class="custom-menu">
    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Récupérer l'état précédent du sidebar depuis le localStorage
    var isSidebarOpen = localStorage.getItem("sidebarOpen");

    // Vérifier si le sidebar était ouvert ou fermé
    if (isSidebarOpen === null) {
        // Si aucune valeur n'est définie dans le localStorage, initialiser à "false"
        isSidebarOpen = "false";
    }

    // Appliquer l'état initial du sidebar en fonction de la valeur récupérée
    if (isSidebarOpen === "true") {
        document.getElementById("sidebar").classList.add("active");
    }

    // Écouter les clics sur le bouton pour ouvrir ou fermer le sidebar
    document.getElementById("sidebarCollapse").addEventListener("click", function() {
        // Basculer l'état du sidebar (ouvert/fermé)
        isSidebarOpen = isSidebarOpen === "true" ? "false" : "true";
        localStorage.setItem("sidebarOpen", isSidebarOpen);

        // Appliquer les changements d'affichage du sidebar en fonction de l'état mis à jour
        if (isSidebarOpen === "true") {
            document.getElementById("sidebar").classList.add("active");
        } else {
            document.getElementById("sidebar").classList.remove("active");
        }
    });
});

</script>
    
  <!-- <div class="custom-menu">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
  </div> -->

  <div class="p-4">
    <h1><a href="index.html" class="logo" style="text-align: center;color: #000;">JUDI.ia </a></h1>
    <ul class="list-unstyled components mb-5">
      <li class="active">

      <ul class="list-unstyled">
    <li class="mb-2 border border-dark border-2 rounded text-center">
        <i class="bi bi-person-fill"></i> <!-- Icône Bootstrap pour représenter un utilisateur -->
        <?php echo $emailUtilisateur; ?>
    </li>
</ul>




<!-- <button type="button" onclick="clearLocalStorage()">Vider la sauvegarde</button> -->

        <!-- <a href="index3.php"><span class="fa fa-home mr-3"></span>Accueil</a> -->
        <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="switchCouleur" onclick="changerCouleur()">
    <label class="form-check-label" for="switchCouleur">Changer la couleur</label>
</div>

<!-- Switch pour activer/désactiver la lecture vocale -->
<div class="form-check form-switch d-flex align-items-center">
    <input class="form-check-input" type="checkbox" id="toggleSpeech" onchange="toggleLectureVocale()">
    <label class="form-check-label" for="toggleSpeech">Activer la lecture vocale</label>
    <i class="fas fa-microphone micro ms-2" onclick="lireDernierMessage()" id="microIcon" style="color: #000;"></i>
</div>



        <button onclick="viderChatData()" type="button" class="btn " style="border-radius: 20px;top: 10px;">
  <i class="fas fa-plus"></i> Sauvegarder
</button>


<style>
        .stars {
            display: inline-block;
            font-size: 25px;
        }
        .stars input[type="radio"] {
            display: none;
        }
        .stars label {
            cursor: pointer;
            color: #ccc;
            font-size: 25px;
            padding: 0 2px;
            transition: color 0.3s;
        }
        .stars label:hover,
        .stars label:hover ~ label,
        .stars input[type="radio"]:checked ~ label {
            color: #fdd835;
        }
    </style>


<!-- Bouton pour ouvrir le modal -->
<!-- <button type="button" class="btn btn-primary" id="openRatingModalBtn" style="display: none;" data-toggle="modal" data-target="#ratingModal">
    Noter le système
</button> -->

<!-- Modal de notation -->
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="ratingForm" method="post" action="note.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel">Noter le système</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Merci de nous donner votre avis en attribuant une note de 1 à 5 étoiles :</p>
                    <!-- Input pour la notation en étoiles -->
                    <div class="stars">
                        <input type="radio" name="rating" id="star5" value="5"><label for="star5">&#9733;</label>
                        <input type="radio" name="rating" id="star4" value="4"><label for="star4">&#9733;</label>
                        <input type="radio" name="rating" id="star3" value="3"><label for="star3">&#9733;</label>
                        <input type="radio" name="rating" id="star2" value="2"><label for="star2">&#9733;</label>
                        <input type="radio" name="rating" id="star1" value="1"><label for="star1">&#9733;</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button style="color: #F5F5F5;" type="submit" class="btn btn-primary" id="sendRatingBtn">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    // Fonction pour vérifier périodiquement si la colonne note est vide ou non
    function checkNote() {
        var chatData = JSON.parse(localStorage.getItem("chatData"));
        // Faire une requête AJAX pour vérifier si la colonne note est vide ou non
        $.ajax({
            url: 'check_note.php', // Chemin vers le script PHP qui vérifie la note
            type: 'GET',
            success: function(data) {
                // Afficher la réponse dans la console
                // Si la note est null, afficher le modal
                if (data === "null" && chatData !== null) {
                    $('#ratingModal').modal('show');
                }
                else
                console.log("note deja saisie");

            }
        });
    }

    // Appeler la fonction checkNote toutes les x millisecondes (par exemple toutes les 3 secondes)
    setInterval(checkNote, 90000); // 3000 ms = 3 secondes
</script>

<!-- <script>
    // Fonction pour vérifier périodiquement chatData
    function checkChatData() {
        var chatData = JSON.parse(localStorage.getItem("chatData"));
        if (chatData) {
            $('#ratingModal').modal('show');
        }
    }

    // Appeler la fonction checkChatData toutes les x millisecondes (par exemple toutes les 3 secondes)
    setInterval(checkChatData, 3000); // 3000 ms = 3 secondes
</script> -->


<!-- <script>
    // document.addEventListener("DOMContentLoaded", function() {
        var chatData = JSON.parse(localStorage.getItem("chatData"));
        if(chatData){
            console.log("suuuupppppppeeeeeeerrrrrriiiiiieeeuuur");
        }
    //     if (chatData !== null) {
    //         $('#ratingModal').modal('show');
    //     }
    // });
</script> -->

<!-- 
<button onclick="afficherChatData()">Afficher chatData</button> 
<button onclick="viderChatData()">Vider chatData new</button> -->
<!-- <button onclick="afficherAllSession()">Afficher allsession</button>

<button onclick="restaurerAllSession()">restorer</button>

<button onclick="afficherContenuSession()">ajouterSession</button>

<button onclick="sauvegarderSessionEnBaseDeDonnees()">ajouterSession</button> -->

<!--<button id="boutonAfficherSession">Afficher la session</button> -->


<!-- <button onclick="sauvegarderMessageEnBaseDeDonnees()">ajouter en base de donne </button>  -->

<!-- Ajoutez ce bouton où vous souhaitez dans votre HTML -->
<!-- <button id="updateAllSessionsBtn">Mettre à jour toutes les sessions</button> -->


<div id="sessionNomDiv"></div>

<div>
    <button id="storeSessionNomBtn">Stocker Session Nom</button>
    <div id="sessionNomDisplay"></div>
</div>



<!-- <button onclick="vp()">vp</button>  -->


<!-- <li class="session-item" data-session-id="1">Session 1</li>
<li class="session-item" data-session-id="2">Session 2</li> -->
<!-- Ajoutez d'autres éléments de session avec les ID correspondants -->


<!-- <div id="historiquechatbot">
    <p>Historique session des bot</p>
    <ul id="historiquechatbotList"></ul>
</div> -->

<!-- <button onclick="mettreAJourSession()">Mettre à jour la session</button>

<button id="updateButton">Mettre à jour la session</button>


<button onclick="content()">ajouter en base de donne </button> 

<button onclick=" update()"> update</button>

<button onclick="storeAndDisplaySessionNom()">afficher id session </button>  -->


<script>
// Attacher un gestionnaire d'événements beforeunload à la fenêtre

window.addEventListener('beforeunload', function(event) {
     // Exécuter la fonction viderChatData() avant que la page ne se décharge
    delete12();
 });


// Récupérer les éléments à cacher
var elementsToHide = document.querySelectorAll("#sessionNomDiv, #storeSessionNomBtn, #sessionNomDisplay");

// Parcourir les éléments et cacher chacun d'eux
elementsToHide.forEach(function(element) {
    element.style.display = "none";
});

    // Fonction pour afficher le contenu du chatData dans la console
//     function afficherChatData() {
//     var chatData = JSON.parse(localStorage.getItem("chatData"));
//     console.log("objet"+chatData.textContent)
//     if (chatData) {
//         for (var i = 0; i < chatData.userMessages.length; i++) {
//             console.log("Utilisateur :" + chatData.userMessages[i]);
//             console.log("Assistant :" + chatData.botMessages[i]);
//         }
//     } else {
//         console.error("Aucune donnée dans le chatData.");
//     }
// }

function afficherChatData() {
    var chatData = JSON.parse(localStorage.getItem("chatData"));
    if (chatData) {
        console.log(chatData);
    } else {
        console.error("Aucune donnée dans le chatData.");
    }
}



function viderChatData() {
    sauvegarderMessageEnBaseDeDonnees();
   
    var chatData = JSON.parse(localStorage.getItem("chatData"));
    if (chatData) {
        // Stocker les données de chatData dans allsession
        localStorage.setItem("allsession", JSON.stringify(chatData));
        console.log("Le contenu du chatData a été stocké dans allsession avec succès.");
        // Supprimer le contenu de chatData
        localStorage.removeItem("chatData");
        console.log("Le contenu du chatData a été vidé avec succès.");
        // Recharger la page pour actualiser automatiquement chatData
        // location.reload();
    } else {
        console.error("Aucune donnée dans le chatData.");
    }
    // location.reload(true);
}


function delete12() {
   
    var chatData = JSON.parse(localStorage.getItem("chatData"));
    if (chatData) {
        // Stocker les données de chatData dans allsession
        localStorage.setItem("allsession", JSON.stringify(chatData));
        console.log("Le contenu du chatData a été stocké dans allsession avec succès.");

        // Supprimer le contenu de chatData
        localStorage.removeItem("chatData");
        console.log("Le contenu du chatData a été vidé avec succès.");
       
        // Recharger la page pour actualiser automatiquement chatData
         location.reload();
    } else {
        console.error("Aucune donnée dans le chatData.");
    }
    // location.reload(true);
}

/*
Dans cette version, la fonction generateUniqueSessionNumber est appelée pour obtenir un numéro de session unique. Cette fonction vérifie d'abord si le numéro de session existe déjà dans la liste des sessions actuelles. Si c'est le cas, elle incrémente le numéro de session jusqu'à ce qu'un numéro unique soit trouvé. Ensuite, ce numéro unique est retourné pour être utilisé comme numéro de session pour la nouvelle session.
*/

function ajouterSession() {
    var chatData = JSON.parse(localStorage.getItem("chatData"));
    if (!chatData) {
        // Afficher un message d'erreur
        console.error("Impossible de créer une nouvelle session car chatData est vide.");
        // Afficher un message à l'utilisateur, par exemple avec une alerte
        alert("La discussion est déjà ouverte.");
        // Arrêter l'exécution de la fonction
        return;
    }

    // Si chatData n'est pas vide, ajoutez une nouvelle session
    var allSessions = JSON.parse(localStorage.getItem("allSessions")) || [];

    var newSessionNumber = generateUniqueSessionNumber(allSessions);

    var newSession = { sessionNumber: newSessionNumber, data: chatData };
    
    allSessions.push(newSession);
    localStorage.setItem("allSessions", JSON.stringify(allSessions));
    console.log("Session ajoutée avec succès :", newSession);
    // Mettre à jour l'affichage des sessions
    afficherToutesSessions();
}

function generateUniqueSessionNumber(allSessions) {
    var sessionNumber = allSessions.length + 1;
    // Vérifier si le numéro de session existe déjà
    while (sessionExists(allSessions, sessionNumber)) {
        // Si le numéro existe, générer un nouveau numéro
        sessionNumber++;
    }
    return sessionNumber;
}

function sessionExists(allSessions, sessionNumber) {
    // Vérifier si le numéro de session existe déjà dans la liste des sessions
    return allSessions.some(session => session.sessionNumber === sessionNumber);
}


function afficherAllSession() {
    var allsession = JSON.parse(localStorage.getItem("allsession"));
    console.log(allsession);
    var sessionName = localStorage.getItem("currentSessionName"); // Récupérer le nom de la session actuelle
    if (allsession) {
        console.log("Nom de la session :", sessionName); // Afficher le nom de la session
        for (var i = 0; i < allsession.userMessages.length; i++) {
            console.log("Utilisateur :" + allsession.userMessages[i]);
            console.log("Assistant :" + allsession.botMessages[i]);
        }
    } else {
        console.error("Aucune donnée dans le allsession.");
    }
}
// --------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------

// Fonction pour ajouter un message au chat et le sauvegarder dans le stockage local
// Fonction pour ajouter un message à l'interface utilisateur
function appendMessage(role, message) {
    var chatHistory = document.getElementById("chatHistory");
    var fragment = document.createDocumentFragment();
    var li = document.createElement("li");
    li.className = role + "-message";

    // Ajout de l'icône de robot pour les messages de type "bot"
    if (role === 'bot') {
    var robotIcon = document.createElement("img");
    robotIcon.src = "avocat.png"; // Spécifiez le chemin vers votre icône de robot
    robotIcon.className = "robot-icon";
    robotIcon.style.width = "20px"; // Définissez la largeur souhaitée
    robotIcon.style.height = "20px"; // Définissez la hauteur souhaitée
    // Ajoute une bordure noire de 2px autour de l'icône
    li.appendChild(robotIcon);
}

    // Si le message est structuré en format JSON
    if (typeof message === 'object' && message !== null) {
        // Créer un élément de paragraphe pour chaque clé-valeur dans l'objet
        Object.keys(message).forEach(function(key) {
            var p = document.createElement("p");
            p.textContent = key + ": " + message[key];
            li.appendChild(p);
        });
    } else if (typeof message === 'string') { // Si le message est une chaîne de caractères simple
        // Diviser le message en lignes et les ajouter individuellement
        if (message.match(/^\d+\.\s*/) || message.match(/^\d+\)\s*/)) {
            // Si le message commence par un nombre suivi d'un point ou d'une parenthèse, c'est une liste numérotée
            var items = message.split(/\d+\.\s*|\d+\)\s*/).filter(Boolean);
            var ol = document.createElement("ol");
            items.forEach(function(item) {
                var liItem = document.createElement("li");
                liItem.textContent = item.trim(); // Supprimer les espaces inutiles
                ol.appendChild(liItem);
            });
            li.appendChild(ol);
        } else {
            // Si ce n'est pas une liste numérotée, divisez simplement le message en lignes et ajoutez-les individuellement
            message.split('\n').forEach(function(line) {
                var p = document.createElement("p");
                p.textContent = line;
                li.appendChild(p);
            });
        }
    } else { // Si le message est d'un type différent
        var p = document.createElement("p");
        p.textContent = message;
        li.appendChild(p);
    }
    fragment.appendChild(li);
    chatHistory.appendChild(fragment);
    // Ajouter le message au stockage local
    addToLocalStorage(message, role);
    // Sauvegarder les données dans la base de données
    if (toggleSpeechCheckbox.checked && role === 'bot') {
        readLastMessage(message);
    }
    // Vider la valeur de la zone de texte
    var textarea = document.getElementById("con");
    textarea.value = "";
}

function sauvegarderMessageEnBaseDeDonnees() {
    // Formatage des données dans le format spécifié
    var chatData = JSON.parse(localStorage.getItem("chatData"));
    // Vérifier si chatData contient des données
    if (chatData) {
        // Exemple d'envoi des données à un script PHP pour traitement et sauvegarde dans la base de données
        $.ajax({
            url: "sessiondb.php", // Chemin vers le script PHP pour la sauvegarde des messages
            type: "POST",
            data: {
                timestamp: getCurrentTimestamp(), // Obtenir le timestamp actuel
                content: JSON.stringify(chatData) // Utilisation des données formatées
            },
            success: function(response) {
                console.log("Message sauvegardé avec succès :", response);
                 location.reload(true);
            },
            error: function(xhr, status, error) {
                console.error("Erreur lors de l'ouverture :", error);
                // Afficher un message d'erreur avec toast
                Toastify({
                    text: "Erreur lors de la sauvegarde du message : " + error,
                    duration: 3000, // Durée d'affichage du toast en millisecondes
                    close: true, // Afficher le bouton de fermeture du toast
                    backgroundColor: "red", // Couleur de fond rouge
                    gravity: "top", // Position du toast
                    position: "right", // Position du toast
                    stopOnFocus: true, // Arrêter l'affichage du toast lorsqu'il est en focus
                    className: "error-toast", // Classe CSS supplémentaire pour le toast
                    animation: {
                        in: "fadeIn", // Animation à l'entrée
                        out: "fadeOut" // Animation à la sortie
                    }
                }).showToast();
            }
        });
    } else {
        console.error("Aucune donnée à sauvegarder dans le chatData.");
        // Afficher un message d'erreur avec toast
        Toastify({
            text:  "Vous êtes déjà sur la nouvelle session",
            duration: 3000, // Durée d'affichage du toast en millisecondes
            close: true, // Afficher le bouton de fermeture du toast
            backgroundColor: "red", // Couleur de fond rouge
            gravity: "top", // Position du toast
            position: "right", // Position du toast
            stopOnFocus: true, // Arrêter l'affichage du toast lorsqu'il est en focus
            className: "error-toast", // Classe CSS supplémentaire pour le toast
            animation: {
                in: "animate__animated animate__bounceIn", // Animation à l'entrée
                out: "animate__animated animate__fadeOutUp" // Animation à la sortie
            }
        }).showToast();
    }
}



function getCurrentTimestamp() {
    return new Date().toISOString().slice(0, 19).replace("T", " "); // Format : YYYY-MM-DD HH:MM:SS
}

//function sauvegarderMessageEnBaseDeDonnees(message, role) {
//     // Exemple d'envoi des données à un script PHP pour traitement et sauvegarde dans la base de données
//     $.ajax({
//         url: "insertion.php", // Chemin vers le script PHP pour la sauvegarde des messages
//         type: "POST",
//         data: {
//             message: JSON.stringify(message),
//             role: role // Ajoutez le rôle du message dans les données à envoyer
//         },
//         success: function(response) {
//             console.log("Message sauvegardé avec succès :", response);
//         },
//         error: function(xhr, status, error) {
//             console.error("Erreur lors de la sauvegarde du message :", error);
//         }
//     });
// }

// Fonction pour afficher le contenu d'une session
function afficherContenuSession(sessionId, session_nom) {

    // Nettoyer les données de session précédentes
    chatHistory.innerHTML = '';
    // Vider la liste des sessions affichées
    sessionsAffichees = {};
    // Vérifier si la session a déjà été affichée
    if (sessionsAffichees[sessionId]) {
        console.log("Session déjà affichée.");
        return; // Sortir de la fonction si la session a déjà été affichée
    }
    // Récupérer le contenu de la session via AJAX
    $.ajax({
        url: "recuperesession.php",
        type: "GET",
        data: { session_id: sessionId }, // Envoyer l'ID de la session au script PHP
        success: function(response) {
            // Convertir la réponse JSON en objet JavaScript
            var sessionData = JSON.parse(response);
          
    console.log("Utilisateur db:", sessionData.session_nom);
    delete12();
    // Afficher le session_nom dans la div
    document.getElementById('sessionNomDiv').innerText = sessionData.session_nom;

            storeAndDisplaySessionNom(sessionData.session_nom);

            console.log("id au clique"+sessionData.session_nom);
            // Vérifier si la session est définie
            if (sessionData.error) {
                console.error("Erreur lors de la récupération de la session :", sessionData.error);
            } else {
                // Extraire userMessages et botMessages de la colonne content
                var contentData = JSON.parse(sessionData.content);
                var userMessages = contentData.userMessages;
                var botMessages = contentData.botMessages;

                // Afficher les messages de la conversation en alternance
                if (userMessages && Array.isArray(userMessages) && botMessages && Array.isArray(botMessages)) {
                    var maxLength = Math.max(userMessages.length, botMessages.length);
                    for (var i = 0; i < maxLength; i++) {
                        if (userMessages[i]) {
                            appendMessage('user', userMessages[i]);
                            console.log("Utilisateur:", userMessages[i]);
                        }
                        if (botMessages[i]) {
                            appendMessage('bot', botMessages[i]);
                            console.log("Assistant:", botMessages[i]);
                        }
                    }
                }
                // Marquer la session comme déjà affichée
                sessionsAffichees[sessionId] = true;
            }
        },
        error: function(xhr, status, error) {
            console.error("Erreur lors de la récupération de la session :", error);
        }
    });
   
}

// Fonction pour stocker et afficher la session_nom
function storeAndDisplaySessionNom(session_nom) {
    // Stocker la session_nom dans le localStorage avant de l'afficher
    localStorage.setItem("sessionNom", session_nom);
    // vp(session_nom); // Appel de la fonction vp pour stocker avant d'afficher
    
    update(session_nom);

    // Afficher la session_nom dans la div
    var sessionNomDisplay = document.getElementById("sessionNomDisplay");
    sessionNomDisplay.innerText = "Session Nom : " + session_nom;
    sessionNomDisplay.style.color = "white"; // Modifier la couleur en blanc
    
    // Afficher le session_nom dans la console après l'avoir stocké
    // console.log("Session Nom :", session_nom);
    // Vérifier si le nom de la session est correctement stocké
    // console.log("Session Nom dans le localStorage :", localStorage.getItem("sessionNom"));
}

// Fonction pour stocker le contenu avant de l'afficher
function vp() {
    // Récupérer la valeur de session_nom depuis le localStorage
    var session_nom = localStorage.getItem("sessionNom");
    // console.log("Contenu stocké dans le localStorage +++++: " + session_nom);

    // Récupérer les données de chat depuis le stockage local
    var chatData = JSON.parse(localStorage.getItem("chatData"));
    // Vérifier si chatData est vide
    if (chatData === null) {
        // console.log("chatdata est vide");
        // Supprimer le contenu de session_nom
        localStorage.removeItem("sessionNom");
    }
}


document.getElementById("storeSessionNomBtn").addEventListener("click", function() {
    var session_nom = localStorage.getItem("sessionNom");
    storeAndDisplaySessionNom(session_nom);
    vp(session_nom); 
    mettreAJourSessions(session_nom);// Appel correct de la fonction vp
    console.log("Session Nom :", session_nom);
});

// Appeler la fonction update(session_nom) toutes les secondes
setInterval(function() {
    // Récupérer la valeur de session_nom depuis le localStorage
    var session_nom = localStorage.getItem("sessionNom");
    vp();
    // Exécuter la fonction update avec session_nom
    update(session_nom);
},500); // 1000 millisecondes = 1 seconde

 function update(session_nom) {
    
    var session_nom = localStorage.getItem("sessionNom");

    // console.log("Contenu stocké dans le localStorage !!!!:"+session_nom);
            // Récupérer les données de chat depuis le stockage local
            var chatData = JSON.parse(localStorage.getItem("chatData"));
            // Vérifier si les données de chat existent
            if (chatData) {
                // Exemple d'envoi des données à un script PHP pour la mise à jour de la session
                $.ajax({
                    url: "updatesession.php", // Chemin vers le script PHP pour la mise à jour de la session
                    type: "POST",
                    data: {
                        session_nom:session_nom,
                        content: JSON.stringify(chatData) // Nouveau contenu de la session
                    },
                    success: function (response) {
                        // console.log("Session mise à jour avec succès :", response);
                    },
                    error: function (xhr, status, error) {
                        console.error("Erreur lors de la mise à jour de la session :", error);
                    }
                });
            } else {
                // console.error("Les données de chat n'ont pas été trouvées dans le stockage local.");
            }
        }

        // Ajouter un gestionnaire d'événements click au bouton
        // $(document).ready(function() {
        //     $('#updateButton').click(function() {
        //         mettreAJourSessions();
        //     });
        // });




// function content(session_nom){
// var session_nom= localStorage.setItem("session_nom",session_nom);
// console.log("contenu "+session_nom);
// }

// function mettreAJourSession() {
//     // Récupérer les données de chat depuis le stockage local

//     var chatData = JSON.parse(localStorage.getItem("chatData"));

//     // Vérifier si les données de chat existent
//     if (chatData) {
//         // Exemple d'envoi des données à un script PHP pour la mise à jour de la session
//         $.ajax({
//             url: "updatesession.php", // Chemin vers le script PHP pour la mise à jour de la session
//             type: "POST",
//             data: {
//                 session_nom: session_nom, // Utilisation du paramètre session_nom
//                 content: JSON.stringify(chatData) // Nouveau contenu de la session
//             },
//             success: function (response) {
//                 console.log("Session mise à jour avec succès :", response);
//             },
//             error: function (xhr, status, error) {
//                 console.error("Erreur lors de la mise à jour de la session :", error);
//             }
//         });
//     } else {
//         console.error("Les données de chat n'ont pas été trouvées dans le stockage local.");
//     }
// }






    

// Fonction pour afficher toutes les sessions disponibles
// Fonction pour afficher toutes les sessions disponibles
// Fonction pour afficher toutes les sessions disponibles
function afficherToutesSessions() {
    // Récupérer toutes les sessions depuis la base de données
    $.ajax({
        url: "sessionlistedb.php", // Remplacez ceci par l'URL de votre script PHP pour récupérer les sessions
        type: "GET",
        success: function(response) {
            var sessionsFromDatabase = JSON.parse(response);

            // Afficher toutes les sessions
            var sessionList = document.getElementById("sessionList");
            sessionList.innerHTML = "";

            if (sessionsFromDatabase.length > 0) {
                sessionsFromDatabase.forEach(function(session, index) {
                    var li = document.createElement("li");
                    li.classList.add("session-item");

                    var sessionText = document.createElement("span");
                    sessionText.textContent = "Session " + session.session_nom;

                    // Ajouter un gestionnaire d'événement de clic pour afficher le contenu de la session
                    sessionText.addEventListener("click", function() {
                        afficherContenuSession(session.session_nom);
                    });

                    // Ajouter la classe pour le style CSS de la mise en page
                    sessionText.classList.add("session-text");

                    // Créer l'icône de suppression
                    var deleteIcon = document.createElement("i");
                    deleteIcon.classList.add("fa", "fa-trash", "delete-icon");
                    deleteIcon.title = "Supprimer cette session";

                    // Ajouter un gestionnaire d'événement de clic pour la suppression de la session
                    deleteIcon.addEventListener("click", function(event) {
                        event.stopPropagation(); // Empêcher la propagation de l'événement de clic à la session
                        supprimerSession(session.session_nom);
                    });

                    // Créer un conteneur pour aligner les éléments à droite
                    var rightContainer = document.createElement("div");
                    rightContainer.classList.add("right-container");
                    rightContainer.appendChild(deleteIcon);

                    // Ajouter les éléments à li dans l'ordre souhaité
                    li.appendChild(sessionText);
                    li.appendChild(rightContainer);

                    sessionList.appendChild(li);
                });
            } else {
                sessionList.textContent = "Aucune session disponible.";
                sessionList.style.color = "black";
            }
        },
        error: function(xhr, status, error) {
            console.error("Erreur lors de la récupération des sessions depuis la base de données :", error);
        }
    });
}

// Mise à jour de toutes les sessions
function mettreAJourToutesSessions() {
    // Récupérer toutes les sessions depuis la base de données
    $.ajax({
        url: "sessionlistedb.php", // Remplacez ceci par l'URL de votre script PHP pour récupérer les sessions
        type: "GET",
        success: function(response) {
            var sessionsFromDatabase = JSON.parse(response);

            if (sessionsFromDatabase.length > 0) {
                sessionsFromDatabase.forEach(function(session, index) {
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("Erreur lors de la récupération des sessions depuis la base de données :", error);
        }
    });
}

// Ajoutez ce code JavaScript pour attacher le gestionnaire d'événement au bouton
$(document).ready(function() {
    $('#updateAllSessionsBtn').on('click', function() {
        mettreAJourToutesSessions();
    });
});


function supprimerSession(session_id) {
    $('#confirmationModal').modal('show'); // Afficher le modal de confirmation
    
    $('#confirmDeleteBtn').on('click', function() {
        $.ajax({
            url: "deletesession.php",
            type: "POST",
            data: { session_nom: session_id },
            success: function(response) {
                console.log("La session a été supprimée avec succès.");
                toastr.success('Session supprimée'); // Afficher un toast de succès
                $('#confirmationModal').modal('hide'); // Cacher le modal après la suppression
                afficherToutesSessions(); // Rafraîchir la liste des sessions
            },
            error: function(xhr, status, error) {
                console.error("Erreur lors de la suppression de la session :", error);
            }
        });
    });
}



// Fonction pour afficher le modal de confirmation





// Variable pour garder une trace des sessions déjà affichées
var sessionsAffichees = {};

// Exécuter la fonction afficherToutesSessions lorsque la fenêtre est chargée
window.onload = function() {
    afficherToutesSessions();
};




// function afficherToutesSessions() {
//     // Récupérer toutes les sessions depuis la base de données
//     $.ajax({
//         url: "sessionlistedb.php", // Remplacez ceci par l'URL de votre script PHP pour récupérer les sessions
//         type: "GET",
//         success: function(response) {
//             var sessionsFromDatabase = JSON.parse(response);

//             // Afficher toutes les sessions
//             var sessionList = document.getElementById("sessionList");
//             sessionList.innerHTML = "";

//             if (sessionsFromDatabase.length > 0) {
//                 sessionsFromDatabase.forEach(function(session, index) {
//                     var li = document.createElement("li");
//                     li.classList.add("session-item");

//                     var sessionText = document.createElement("span");
//                     sessionText.textContent = "Session " + session.session_nom;
                    
//                     sessionText.addEventListener("click", function() {
//                         afficherContenuSession(session.session_nom);
//                     });

                    
//                     li.appendChild(sessionText);

//                     sessionList.appendChild(li);
//                 });
//             } else {
//                 sessionList.textContent = "Aucune session disponible.";
//                 sessionList.style.color = "black";
//             }
//         },
//         error: function(xhr, status, error) {
//             console.error("Erreur lors de la récupération des sessions depuis la base de données :", error);
//         }
//     });
// }


/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

function sauvegarderSessionEnBaseDeDonnees() {
    // Récupérer les données de la session
    var sessionNumber = session.sessionNumber;
    var userMessages = session.data.userMessages;
    var botMessages = session.data.botMessages;
    
    // Créer la requête SQL d'insertion
    var query = "INSERT INTO session (session_nom, content, timestamp) VALUES (?, ?, ?)";

    // Obtenir le timestamp actuel
    var currentTimestamp = getCurrentTimestamp();

    // Convertir les données de la session en JSON
    var sessionData = JSON.stringify({ userMessages: userMessages, botMessages: botMessages });

    // Exécuter la requête SQL en utilisant AJAX avec jQuery
    $.ajax({
        url: "sessiondb.php", // URL du script PHP d'insertion
        type: "POST",
        data: {
            session_nom: sessionNumber,
            content: sessionData,
            timestamp: currentTimestamp
        },
        success: function(response) {
            console.log("Session sauvegardée avec succès dans la base de données.");
            // Actualiser automatiquement la page si nécessaire
            // location.reload(true); // Force le rechargement de la page depuis le serveur
        },
        error: function(xhr, status, error) {
            console.error("Erreur lors de la sauvegarde de la session dans la base de données :", error);
        }
    });
}


    // // Vérifier si la session a déjà été affichée
    // if (sessionsAffichees[sessionId]) {
    //     console.log("Session déjà affichée.");
    //     return; // Sortir de la fonction si la session a déjà été affichée
    // }

    // // Récupérer le contenu de la session via AJAX
    // $.ajax({
    //     url: "recuperesession.php",
    //     type: "GET",
    //     data: { session_id: sessionId }, // Envoyer l'ID de la session au script PHP
    //     success: function(response) {
    //         // Convertir la réponse JSON en objet JavaScript
    //         var sessionData = JSON.parse(response);
            
    //         // Vérifier si la session est définie
    //         if (sessionData.error) {
    //             console.error("Erreur lors de la récupération de la session :", sessionData.error);
    //         } else {
    //             // Marquer la session comme déjà affichée
    //             sessionsAffichees[sessionId] = true;

    //             // Extraire userMessages et botMessages de la colonne content
    //             var contentData = JSON.parse(sessionData.content);
    //             var userMessages = contentData.userMessages;
    //             var botMessages = contentData.botMessages;

    //             // Afficher les messages de la conversation en alternance
    //             if (userMessages && Array.isArray(userMessages) && botMessages && Array.isArray(botMessages)) {
    //                 var maxLength = Math.max(userMessages.length, botMessages.length);
    //                 for (var i = 0; i < maxLength; i++) {
    //                     if (userMessages[i]) {
    //                         appendMessage('user', userMessages[i]);
    //                         console.log("Utilisateur:", userMessages[i]);
    //                     }
    //                     if (botMessages[i]) {
    //                         appendMessage('bot', botMessages[i]);
    //                         console.log("Assistant:", botMessages[i]);
    //                     }
    //                 }
    //             }
    //         }
    //     },
    //     error: function(xhr, status, error) {
    //         console.error("Erreur lors de la récupération de la session :", error);
    //     }
    // });

// function afficherContenuSession(session) {
//     // Récupérer le contenu de la session via AJAX
//     $.ajax({
//         url: "recuperesession.php",
//         type: "GET",
//         data: { session_nom: session.session_nom }, // Envoyer le nom de la session au script PHP
//         success: function(response) {
//             var sessionData = JSON.parse(response);
            
//             // Afficher le contenu de la session dans chatdata
//             appendMessage('bot', sessionData.content);
//         },
        
//         error: function(xhr, status, error) {
//             console.error("Erreur lors de la récupération du contenu de la session :", error);
//         }
//     });
// }

// function afficherSessionDansConsole(sessionId) {
//     // Récupérer le contenu de la session via AJAX
//     $.ajax({
//         url: "recuperesession.php",
//         type: "GET",
//         data: { session_id: sessionId }, // Envoyer l'ID de la session au script PHP
//         success: function(response) {
//             // Convertir la réponse JSON en objet JavaScript
//             var session = JSON.parse(response);
            
//             // Vérifier si la session est définie
//             if (session.error) {
//                 console.error("Erreur lors de la récupération de la session :", session.error);
//             } else {
//                 // Afficher le contenu de la session
//                 console.log("Session " + session.session_nom + " - Contenu :");
//                 console.log(session.content);
//             }
//         },
//         error: function(xhr, status, error) {
//             console.error("Erreur lors de la récupération de la session :", error);
//         }
//     });
// }

// Associer la fonction à un événement de clic sur les sessions
$(document).ready(function() {
    $(".session-item").click(function() {
        // Récupérer l'ID de la session à partir de l'attribut data
        var sessionId = $(this).data("session-id");
        
        // Appeler la fonction pour afficher la session dans la console
        afficherSessionDansConsole(sessionId);
    });
});



// Associer la fonction à un bouton
$(document).ready(function() {
    $(".session-item").click(function() {
        // Récupérer l'ID de la session à partir de l'attribut data-session-id de l'élément cliqué
        var sessionId = $(this).data('session-id');
        
        // Appeler la fonction en passant l'ID de la session en paramètre
        afficherSessionDansConsole(sessionId);
    });
});



// function afficherToutesSessions() {
//     // Récupérer toutes les sessions depuis la base de données
//     $.ajax({
//         url: "sessionlistedb.php", // Remplacez ceci par l'URL de votre script PHP pour récupérer les sessions
//         type: "GET",
//         success: function(response) {
//             var sessionsFromDatabase = JSON.parse(response);

//             // Afficher toutes les sessions
//             var sessionList = document.getElementById("sessionList");
//             sessionList.innerHTML = "";

//             if (sessionsFromDatabase.length > 0) {
//                 sessionsFromDatabase.forEach(function(session, index) {
//                     var li = document.createElement("li");
//                     li.classList.add("session-item");

//                     sessionText = document.createElement("span"); // Initialisation de sessionText dans afficherToutesSessions
//                     sessionText.textContent = "Session " + session.session_nom;
//                     // sessionText.textContent = "Session " + session.content;
//                     sessionText.addEventListener("click", function() {
//                         afficherContenuSession(session);
//                     });
//                     li.appendChild(sessionText);

//                     sessionList.appendChild(li);
//                 });
//             } else {
//                 sessionList.textContent = "Aucune session disponible.";
//                 sessionList.style.color = "black";
//             }
//         },
//         error: function(xhr, status, error) {
//             console.error("Erreur lors de la récupération des sessions depuis la base de données :", error);
//         }
//     });
// }



// function afficherToutesSessions() {
//     var allSessions = JSON.parse(localStorage.getItem("allSessions"));
//     var sessionList = document.getElementById("sessionList");
//     sessionList.innerHTML = "";

//     if (allSessions && allSessions.length > 0) {
//         allSessions.forEach(function(session, index) {
//             var li = document.createElement("li");
//             li.classList.add("session-item");
            
//             var deleteIcon = document.createElement("i");
//             deleteIcon.classList.add("fas", "fa-trash", "delete-icon");
//             deleteIcon.addEventListener("click", function() {
//                 supprimerSession(index);
//             });
            
//             li.appendChild(deleteIcon);
            
//             var sessionText = document.createElement("span");
//             sessionText.textContent = "Session " + session.sessionNumber;
//             sessionText.addEventListener("click", function() {
//                 afficherContenuSession(session);
//             });
//             li.appendChild(sessionText);

//             sessionList.appendChild(li);
//         });
//     } else {
//         sessionList.textContent = "Aucune session disponible.";
//         sessionList.style.color = "black";
//     }
// }

    // function afficherContenuSession(session) {
    //     console.log("Contenu de la session " + session.sessionNumber + " :");
    //     //  console.log(session.data); // Affiche le contenu de la session dans la console
    //     // Vous pouvez également afficher chaque message individuellement
    //     session.data.userMessages.forEach(function(userMessage, index) {
    //         console.log("Utilisateur :", userMessage);
    //         console.log("Assistant :", session.data.botMessages[index]);
    //     });

    //     // Mettre à jour chatData avec le contenu de la session sélectionnée
    //     localStorage.setItem("chatData", JSON.stringify(session.data));
    //     console.log("Le contenu de la session a été remis dans chatData avec succès.");

    //     sauvegarderSessionEnBaseDeDonnees(session);    // Actualiser automatiquement la page en utilisant jQuery
    //     location.reload(true); // Force le rechargement de la page depuis le serveur
    // }

// function sauvegarderSessionEnBaseDeDonnees(session) {
//     // Récupérer les données de la session
//     var sessionNumber = session.sessionNumber;
//     var userMessages = session.data.userMessages;
//     var botMessages = session.data.botMessages;
//     // Créer la requête SQL d'insertion
//     var query = "INSERT INTO session (session_nom,id_user,content, timestamp) VALUES (?, ?, ?, ?)";

//     // Exécuter la requête SQL en utilisant AJAX avec jQuery
//     $.ajax({
//         url: "sessiondb.php", // URL du script PHP d'insertion
//         type: "POST",
//         data: {
//             session_nom: sessionNumber,
//             // user_id: 1, // ID de l'utilisateur si nécessaire
//             timestamp: getCurrentTimestamp(), // Obtenir le timestamp actuel
//              content: JSON.stringify({ userMessages: userMessages, botMessages: botMessages }) // Convertir les données de la session en JSON

//         },
//         success: function(response) {
//             console.log("Session sauvegardée avec succès dans la base de données.");
//             // Actualiser automatiquement la page si nécessaire
//             // location.reload(true); // Force le rechargement de la page depuis le serveur
//         },
//         error: function(xhr, status, error) {
//             console.error("Erreur lors de la sauvegarde de la session dans la base de données :", error);
//         }
//     });
// }

// function getCurrentTimestamp() {
//     return new Date().toISOString().slice(0, 19).replace("T", " "); // Format : YYYY-MM-DD HH:MM:SS
// }



$(document).ready(function() {
    // Appel de la fonction pour afficher toutes les sessions lors du chargement de la page
    afficherToutesSessions();
});

function afficherSession(session) {
    // Afficher le contenu de la session sélectionnée
    console.log("Contenu de la session :", session);
}
 
// function supprimerSession(index) {
//     var allSessions = JSON.parse(localStorage.getItem("allSessions"));
//     if (allSessions && allSessions.length > index) {
//         $('#confirmationModal').modal('show');

//         $('#confirmDelete').on('click', function() {
//             allSessions.splice(index, 1);
//             localStorage.setItem("allSessions", JSON.stringify(allSessions));
//             console.log("Session supprimée avec succès.");
//             // Mettre à jour l'affichage des sessions
//             afficherToutesSessions();
//             $('#confirmationModal').modal('hide');
//         });
//     } else {
//         console.error("Impossible de supprimer la session.");
//     }
// }
// Appel initial pour afficher les sessions existantes
afficherToutesSessions();

</script>

<style> 
#sessionNomDisplay {
    color: white;
}
/* CSS pour la liste des sessions */
.session-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px; /* Ajoute un espace entre chaque session */
    cursor: pointer;
    border: 1px solid black; /* Ajoute une bordure noire */
    border-radius: 20px; /* Bordure arrondie */
    padding: 10px; /* Ajoute de l'espace intérieur */
    color: black; /* Définir la couleur du texte en noir */
    border: 3px solid gray;
    transition: background-color 0.3s; /* Ajoute une transition pour l'animation */
    width: 100%; /* Augmente la largeur des sessions pour occuper toute la largeur disponible */
}
.session-item:hover {
    border: 2px solid black; /* Ajoute une bordure solide de 2px */
    animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
    
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0); /* Déplacer vers la gauche */
  }
  
  20%, 80% {
    transform: translate3d(2px, 0, 0); /* Déplacer vers la droite */
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0); /* Déplacer vers la gauche */
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0); /* Déplacer vers la droite */
  }
}
    #sessionList::-webkit-scrollbar {
        width: 0; /* Masquer la barre de défilement verticale */
    }
    .delete-icon {
    margin-left: 500%;
    color: red;
    cursor: pointer;

}
    /* CSS pour le drawer */
    .drawer-container {
    position: fixed;
    top: 0;
    right: -250px; /* Masquer le drawer initialement */
    width: 250px;
    height: 100%;
    background-color: transparent; /* Rendre le drawer transparent */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
    transition: right 0.3s ease; /* Animation de transition */
    z-index: 999; /* Assurez-vous que le drawer soit au-dessus de tout autre contenu */
    overflow-y: auto; /* Activer le défilement vertical lorsque nécessaire */
    background-color: #F5F5F5;
}

    .drawer-content {
        padding: 20px;
    }

    .drawer-header .session {
    position: relative;
    color: #000;
    display: block;
    width: 100%;
}

.drawer-header .session::after {
    content: '';
    position: absolute;
    bottom: -5px; /* Ajustez cette valeur selon vos besoins */
    left: 0;
    width: 100%;
    height: 3px;
    background-color: black;
}

.drawer-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 25px;
    margin-bottom: 25px; /* Ajouter de l'espace en bas */
    /* Couleur de fond de l'en-tête */
}
    /* .drawer-header h2 {
        margin: 0;
    } */
    .drawer-close-btn {
        cursor: pointer;
        color: #000;
    }

    .drawer-container::-webkit-scrollbar {
    width: 0; /* Masquer la barre de défilement verticale */

}

  
</style>
<!-- //style="border-radius: 20px; width: 150px;" -->
<!-- Bouton pour ouvrir le drawer -->

<button id="openDrawerBtn" type="button" class="btn" >
  <i class="fas fa-database"></i> Historique 
</button>


<!-- Drawer pour afficher la liste des sessions -->
<div class="drawer-container" id="sessionDrawer">
    <div class="drawer-content">
        <div class="drawer-header">
            <h4 class="session" style="color: #000;">Historique</h4>
            <span class="drawer-close-btn" id="closeDrawerBtn">&times;</span>
        </div>
        <ul id="sessionList">
            <!-- Ici seront listées les sessions -->
            <?php
            // Vérifier si la liste des sessions est vide
            $sessions = []; // Par exemple, à remplacer par votre liste de sessions

            if (empty($sessions)) {
                echo '<li>Aucune donnée disponible</li>';
            } else {
                // Afficher les sessions
                foreach ($sessions as $session) {
                    echo '<li>' . $session . '</li>';
                }
            }
            ?>
        </ul>
    </div>
</div>



<script>
    // Fonction pour ouvrir ou fermer le drawer en fonction de son état actuel
    document.getElementById("openDrawerBtn").addEventListener("click", function() {
        var drawer = document.getElementById("sessionDrawer");
        var drawerStyle = window.getComputedStyle(drawer); // Obtenez le style calculé du drawer

        // Vérifiez si le drawer est actuellement ouvert ou fermé
        if (drawerStyle.right === "0px") {
            // Si le drawer est ouvert, fermez-le
            drawer.style.right = "-250px"; // Fermer le drawer en déplaçant vers la droite
        } else {
            // Si le drawer est fermé, ouvrez-le
            drawer.style.right = "0"; // Ouvrir le drawer en déplaçant vers la gauche
        }
    });

   

    // Fonction pour fermer le drawer
    document.getElementById("closeDrawerBtn").addEventListener("click", function() {
        document.getElementById("sessionDrawer").style.right = "-250px"; // Fermer le drawer en déplaçant vers la droite
    });

</script>

<div class="modal fade" id="subscriptionModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-header">
        <h5 class="modal-title" id="subscriptionModalLabel"><i class="fas fa-hand-holding-usd"></i> Choisissez votre abonnement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id="errorMessage" style="color: red; margin-top: 10px; display: none;text-align: center;"><i class="fas fa-exclamation-circle"></i> L'abonnement gratuit est déjà activé.</p>
        <p style="margin-bottom: 20px;text-align: center;font-size: 25px;"><strong>Abonnement gratuit</strong></p>
        <ul style="margin-bottom: 30px;">
          <li style="margin-bottom: 10px;"><i class="fas fa-check-circle"></i> Abonnement actif gratuit</li>
          <ul style="margin-left: 20px;">
            <li><i class="fas fa-bolt m-2"></i> Rapidité accrue</li>
            <li><i class="fas fa-microphone m-2"></i>saisie vocale</li>
            <li><i class="fas fa-volume-up m-2"></i> Lecture vocale</li>
            <li><i class="fas fa-lock m-2"></i> Sécurité</li>
            <li><i class="fas fa-sync-alt m-2"></i> Réponses améliorées en continu</li>
          </ul>
        </ul>
      </div>
      <div class="modal-footer">
        <button style="color: #F5F5F5;" type="button" class="btn btn-primary" onclick="subscribe()"><i class="fas fa-check-circle"></i> S'abonner</button>
       
      </div>
    </div>
  </div>
</div>

<style>
  /* Ajoutez des styles supplémentaires ici */
  .modal-content {
    background-color: #f8f9fc; /* Couleur de fond */
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Ombre */
  }
  .modal-header {
    border-bottom: none; /* Supprimer la bordure inférieure de l'en-tête */
  }
  .modal-body {
    padding: 20px; /* Ajouter un espace intérieur */
  }
  .modal-footer {
    border-top: none; /* Supprimer la bordure supérieure du pied de page */
  }
</style>

<script>
  function subscribe() {
    document.getElementById("errorMessage").style.display = "block";
  }
</script>



<script>
  function subscribe() {
    document.getElementById("errorMessage").style.display = "block";
  }
</script>





<!-- <button onclick="ajouterSession()">Ajouter une session</button> -->
<button type="button" class="btn" style="border-radius: 20px; top: 10px;" data-toggle="modal" data-target="#subscriptionModal">
  <!-- <i class="fas fa-money-bill-wave"></i> -->
   Abonnement
  
</button>
 


        <a href="deconnexion.php"><span class="fa fa-sign-out-alt" style="color: #000;padding-top: 20px;"></span> Se déconnecter</a>

        

        <!-- Conteneur pour l'historique des questions -->
        <!-- <div id="questionHistoryContainer">
          <p>Historique des Questions</p>
          <ul id="questionHistoryList"></ul>
        </div> -->

        <!-- Ajout du champ de saisie avec l'icône d'addition -->
      

      </li>
    </ul>
  </div>
</nav>

    <div id="content" class="p-4 p-md-5 pt-5">


<div class="modal" id="confirmationModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p>Êtes-vous sûr de vouloir supprimer cette session ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
      </div>
    </div>
  </div>
</div>
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
    }
    .chat-box {
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }
    .chat-history {
        list-style-type: none;
        padding: 0;
        margin: 0;
        overflow-y: auto;
        flex: 1;
    }
    .chat-message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
        max-width: 70%;
    }
    /* .user-message {
        background-color: #f1f1f1;
        align-self: flex-start;
        width: 40%;
        border-radius: 20px;
        text-align: left;
        position: relative;
        min-height:40px;
        /* text-align: center; 
        left: 0;
    } */

        .user-message {
        background-color: white;
        align-self: flex-start;
        border-radius: 20px;
        text-align: left;
        position: relative;
        min-height: 40px;
        max-width: 90%;
        display: inline-block;
        padding: 10px; /* Ajoute un padding pour que le texte reste contenu */
        box-sizing: border-box; /* Assure que le padding est inclus dans la largeur et la hauteur de l'élément */
        margin-top: 15px; /* Ajoute de l'espace en haut */
        margin-bottom: 15px; /* Ajoute de l'espace en bas */
        border: 1px solid gray;
        transition: transform 0.3s ease-in-out; /* Ajoute une animation de transition */
    }

.bot-message {
    background-color:#EAECEE;
    color: black;
    text-align: left;
    border-radius: 20px;
    position: relative;
    margin-left: 30%;
    min-width: 10%;
    max-width: 90%;
    padding: 10px;
    box-sizing: border-box;
    overflow: auto; /* Ajoute une barre de défilement si le contenu dépasse */
    border: 1px solid gray;
}

/* .bot-message {
    background-color: #4CAF50;
    color: white;
    border-radius: 20px;
    width: 40%;
    position: relative;
    margin-right: 60%; /* Modifier la marge droite 
    left: 0; /* Utiliser left au lieu de right 
    max-width: 70%;
    min-height: 40px;
    display: inline-block;
    padding: 10px;
    box-sizing: border-box;
    overflow: auto; /* Ajoute une barre de défilement si le contenu dépasse 
} */



/* .bot-message {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    border-radius: 20px;
   
    display: inline-block;
} */

    .chat-input {
        padding: 10px;
        border-top: 1px solid #ccc;
    }
.chat-container{
    bottom: 0;
    top: 0;
}

.scroll-down-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 50%;
    padding: 10px;
    cursor: pointer;
    z-index: 1000; /* Assure que la flèche est au-dessus de tout le reste */
}

.scroll-down-button i {
    color: #333; /* Couleur de la flèche */
}

</style> 

        <div class="chat-container">
            
          <!-- reponse du chatbot -->
          <div class="chat-box">
    <ul class="chat-history" id="chatHistory">
        <!-- Messages will be appended here dynamically -->
    </ul>
    <div id="scrollDownButton" class="scroll-down-button" onclick="scrollToBottom()">
    <i class="fas fa-angle-down"></i>
</div>

    <div id="spinner" class="spinner-border text-success" style="display: none;"></div>
</div>


<script>
function scrollToBottom() {
    var chatHistory = document.getElementById("chatHistory");
    var scrollHeight = chatHistory.scrollHeight;
    var clientHeight = chatHistory.clientHeight;
    var distance = scrollHeight - clientHeight;
    var animationDuration = 500; // Durée de l'animation en millisecondes
    var startTime = null;
    
    function animate(currentTime) {
        if (startTime === null) {
            startTime = currentTime;
        }
        var elapsedTime = currentTime - startTime;
        var easeInOutCubic = easeInOut(elapsedTime, 0, 1, animationDuration);
        chatHistory.scrollTop = distance * easeInOutCubic;
        
        if (elapsedTime < animationDuration) {
            requestAnimationFrame(animate);
        }
    }
    
    function easeInOut(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t * t + b;
        t -= 2;
        return c / 2 * (t * t * t + 2) + b;
    }
    
    requestAnimationFrame(animate);
}



</script>

            <style>
                /* Appliquer la couleur noire au texte "Se déconnecter" */
a[href="deconnexion.php"] {
    color: #000 !important;
    
}

.send-icon {
    transition: transform 0.3s ease; /* Ajouter une transition pour une animation en douceur */
    color: black; /* Couleur par défaut de l'icône */
    font-size: 15px; /* Taille par défaut de l'icône */
}

.send-icon:hover {
    color: green; /* Couleur de l'icône au survol */
    font-size: 20px;
}

.microphone-icon {
    transition: transform 0.3s ease; /* Ajouter une transition pour une animation en douceur */
    color: black; /* Couleur par défaut de l'icône */
    font-size: 15px; /* Taille par défaut de l'icône */
}

.microphone-icon:hover {
    color: green; /* Couleur de l'icône au survol */
    font-size: 20px;
}

textarea {
    resize: none; /* Désactiver le redimensionnement manuel */
    overflow:auto; /* Cacher le débordement du texte */
    /* min-height: 10px; Hauteur minimale du textarea */
    max-height: 100%;
    padding: 10px; /* Espacement interne */
    width: 100%; /* Largeur du textarea */
    height: 100px;
  }
  #con {
    border-radius: 10px; /* Ajustez la valeur selon vos préférences */
    border: 3px solid gray;
}

#con::-webkit-scrollbar {
    width: 0; /* Masquer la barre de défilement verticale */
}
</style>

<style>
    /* Style pour l'animation de l'élément */
    @keyframes fadeIn {
        from {
            opacity: 0; /* Démarre avec une opacité de 0 */
            transform: translateY(-20px); /* Démarre légèrement en haut */
        }
        to {
            opacity: 1; /* Atteint une opacité de 1 */
            transform: translateY(0); /* Pas de déplacement vertical */
        }
    }

    /* Style pour l'élément à afficher */
    #recordingDuration {
        position: fixed; /* Position fixe pour qu'il reste en haut de la page */
        top: 20px; /* Marge de 20px depuis le haut de la page */
        left: 50%; /* Centre horizontalement */
        transform: translateX(-50%); /* Centre horizontalement */
        background-color: #ffffff; /* Fond blanc */
        padding: 10px 20px; /* Espacement intérieur */
        border-radius: 5px; /* Coins arrondis */
        animation: fadeIn 0.5s ease-in-out; /* Animation de fondu en entrée */
    }

    #myForm {

    bottom: 0;
    left: 0;
    width: 100%;
    background-color: white; /* optionnel: pour s'assurer qu'il est visible sur tous les arrière-plans */
    z-index: 999; /* pour s'assurer qu'il est au-dessus de tous les autres éléments */
}



</style>

<div class="container mt-3">
   
<!-- HTML pour le bouton uniquement quand chatData est vide -->
<!-- Div pour afficher le logo centré -->
<div id="logoContainer" class="container-fluid mt-0 mb-4 text-center">
  <h1 id="animatedText" class="animated-text"></h1>
</div>

<style>
    .animated-text {
  font-weight: normal; /* Initialiser le texte en gras */
  transition: font-weight 0.5s ease; /* Ajouter une transition pour l'animation */
}

.logo-hide {
    opacity: 0; /* Rend le logo transparent */
    transition: opacity 0.5s ease; /* Ajoute une transition d'opacité sur 0.5 secondes */
  }
  </style>
  <style>
  /* Définition de l'animation de transition */
  @keyframes hideAnimation {
    from {
      opacity: 1;
    }
    to {
      opacity: 0;
      height: 0;
      padding: 0;
    }
  }

  /* Appliquer l'animation de transition */
  .logo-hide {
    animation: hideAnimation 0.5s forwards;
  }
</style>

</style>


<!-- CSS pour masquer les boutons -->
<script>
  setInterval(function() {
    var chatData = JSON.parse(localStorage.getItem("chatData"));
    var logoContainer = document.getElementById("logoContainer");

    if (chatData === null || chatData.length === 0) {
      // Si chatData est vide, masquer le logo avec une animation de transition
      logoContainer.classList.remove("logo-hide");
    } else {
      // Sinon, afficher le logo avec une animation de transition
      logoContainer.classList.add("logo-hide");
    }
  },10);
</script>




<script>

document.addEventListener("DOMContentLoaded", function() {
  var text = "JUDI.ia"; // Texte à afficher lettre par lettre
  var interval = 300; // Intervalle de temps en millisecondes entre chaque lettre

  // Récupérer l'élément du texte animé
  var animatedText = document.getElementById("animatedText");

  // Fonction pour afficher le texte lettre par lettre avec un intervalle de temps
  function animateText(text, index) {
    // Vérifier si l'index est inférieur à la longueur du texte
    if (index < text.length) {
      // Ajouter la lettre suivante au texte animé
      animatedText.textContent += text.charAt(index);
      // Appliquer le style en gras
      animatedText.style.fontWeight = "bold";
      // Attendre un court instant avant de réinitialiser le style en normal
      setTimeout(function() {
        animatedText.style.fontWeight = "bold";
      }, interval / 2);
      // Attendre l'intervalle spécifié avant d'afficher la prochaine lettre
      setTimeout(function() {
        animateText(text, index + 1); // Appel récursif pour la prochaine lettre
      }, interval);
    }
  }

  // Démarrer l'animation du texte au chargement de la page
  animateText(text, 0);
});


</script>

    <form method="post" id="myForm">
        <div class="form-group" id="myInputContainer">
            <input type="hidden" name="role" value="user">
            <div class="input-group" >

            <textarea id="con" name="content" placeholder="Message a JUDI..." required oninput="adjustTextareaHeight(this)" rows="1" oninput='this.style.height = ""; this.style.height = this.scrollHeight + "px"'></textarea>

<div class="input-group-append">
    <i class="fas fa-paper-plane send-icon mr-2" onclick="sendMessage(),sendMessages()"></i>
    <i class="fas fa-microphone microphone-icon" onclick="recordAndTranslate()"></i>
    <!-- <span id="recordingDuration" style="color: red;"></span> -->
    <div id="recordingDuration"></div>
</div>

            </div>
        </div>
    </form>
</div>


        </div>

    </div>
</div>

<script>
     function adjustTextareaHeight(element) {
        element.style.height = 'auto';
        element.style.height = (element.scrollHeight > 200 ? 200 : element.scrollHeight) + 'px';
    }

    function sendMessages() {
    document.getElementById('con').style.height = '50px';
    // Autres actions à effectuer lors de l'envoi du message
}

</script>

<script>

function clearLocalStorage() {
    localStorage.removeItem("chatData");
    location.reload(true); 
    alert("La sauvegarde a été supprimée avec succès !");
}

function changerCouleur() {
    var switchCouleur = document.getElementById('switchCouleur');
    var couleurParDefaut = window.getComputedStyle(document.body).getPropertyValue('background-color');

    if (switchCouleur.checked) {
        document.body.style.transition = "background-color 0.5s"; // Ajout de la transition
        document.body.style.setProperty('background-color', '#292929', 'important');
    } else {
        document.body.style.transition = "background-color 0.5s"; // Ajout de la transition
        document.body.style.setProperty('background-color', 'white', 'important');
    }
}


</script>

<script>
    let isRecording = false; // Variable de contrôle pour suivre l'état de l'enregistrement

async function recordAndTranslate() {
    if (isRecording) {
        // Ne rien faire si un enregistrement est déjà en cours
        return;
    }

    try {
        isRecording = true; // Mettre l'état de l'enregistrement à true

        const recognition = new webkitSpeechRecognition();
        recognition.lang = 'fr-FR'; // Langue pour la reconnaissance vocale
        recognition.noiseSuppression = true; // Activer la suppression du bruit

        let startTime;

        recognition.onstart = () => {
            document.getElementById("recordingDuration").style.visibility = 'visible'; // Rendre l'élément visible
            startTime = Date.now();
            const recordingDuration = document.getElementById("recordingDuration");
            recordingDuration.textContent = 'Enregistrement en cours...';
            recordingDuration.style.color = 'green';  // Couleur du texte en vert
            recordingDuration.style.borderRadius = '5px';  // Exemple de border-radius
            recordingDuration.style.border = '2px solid green';  // Bordure de 2px solide en vert
        };

        recognition.onresult = (event) => {
            const voiceText = event.results[0][0].transcript;
            const currentText = document.getElementById("con").value;
            document.getElementById("con").value = currentText + ' ' + voiceText;
        };

        recognition.onend = () => {
            isRecording = false; // Mettre l'état de l'enregistrement à false
            const endTime = Date.now();
            const duration = (endTime - startTime) / 1000;
            document.getElementById("recordingDuration").textContent = `Durée de l'enregistrement : ${duration.toFixed(2)}s`;
            setTimeout(() => {
                document.getElementById("recordingDuration").style.visibility = 'hidden'; // Cacher l'élément
            }, 2000); // Supprimer après 2 secondes
        };

        recognition.start();
    } catch (error) {
        console.error('Erreur de reconnaissance vocale :', error);
        isRecording = false; // En cas d'erreur, réinitialiser l'état de l'enregistrement
    }
}

</script>





<script>

    // Variable de contrôle pour vérifier si une question est en cours de traitement
    var isProcessing = false;

    // Variable pour stocker la synthèse vocale
    var synth = window.speechSynthesis;

    // Variable pour la checkbox
    var toggleSpeechCheckbox = document.getElementById("toggleSpeech");

    // Variable pour l'icône du microphone
    var microIcon = document.getElementById("microIcon");

function storeQuestionHistory(question, response) {
            var historyItem = { question: question, response: response };
            var questionHistory = JSON.parse(localStorage.getItem("questionHistory")) || [];
            questionHistory.push(historyItem);
            localStorage.setItem("questionHistory", JSON.stringify(questionHistory));

            // Actualiser l'affichage après chaque ajout
            displayQuestionHistory(questionHistory);
        }

// Fonction pour ajouter une nouvelle question et réponse à l'historique
function addQuestionToHistory(question, response) {
    storeQuestionHistory(question, response);
    retrieveQuestionHistory(); // Mettre à jour l'affichage
}

// Fonction pour récupérer l'historique des questions depuis le localStorage
function retrieveQuestionHistory() {
    var questionHistory = JSON.parse(localStorage.getItem("questionHistory")) || [];
    displayQuestionHistory(questionHistory);
}


// Fonction pour afficher l'historique des questions et réponses
function displayQuestionHistory(history) {
    var questionHistoryList = document.getElementById("questionHistoryList");
    questionHistoryList.innerHTML = ""; // Effacer le contenu précédent

    history.forEach(item => {
        var li = document.createElement("li");
        li.textContent = item.question + " - " + item.response;
        questionHistoryList.appendChild(li);
    });
}



// Fonction pour récupérer les données du stockage local
function retrieveFromLocalStorage() {
    return JSON.parse(localStorage.getItem("chatData")) || { "userMessages": [], "botMessages": [] };
}

// Charger les données du stockage local lors du chargement de la page
window.onload = function() {
    var chatData = retrieveFromLocalStorage();
    var userMessages = chatData.userMessages;
    var botMessages = chatData.botMessages;
    var maxLength = Math.max(userMessages.length, botMessages.length);

    var chatHistory = document.getElementById("chatHistory");
    var fragment = document.createDocumentFragment();

    for (var i = 0; i < maxLength; i++) {
        if (userMessages[i]) {
            appendMessage("user", userMessages[i]);
        }
        if (botMessages[i]) {
            appendMessage("bot", botMessages[i]);
        }
    }
};

// Fonction pour ajouter un message au stockage local
function addToLocalStorage(message, role) {
    var chatData = retrieveFromLocalStorage();
    if (role === "user") {
        if (!chatData.userMessages.includes(message)) {
            chatData.userMessages.push(message);
        }
    } else if (role === "bot") {
        if (!chatData.botMessages.includes(message)) {
            chatData.botMessages.push(message);
        }
    }
    localStorage.setItem("chatData", JSON.stringify(chatData));
}

// Fonction pour ajouter un message au chat et le sauvegarder dans le stockage local
// function appendMessage(role, message) {
//     var chatHistory = document.getElementById("chatHistory");
//     var fragment = document.createDocumentFragment();
//     var li = document.createElement("li");
//     li.className = role + "-message";

//     // Si le message est structuré en format de document
//     if (message.startsWith("Document:")) {
//         var paragraphs = message.split("\n");

//         // Parcourir chaque paragraphe du message
//         paragraphs.forEach(paragraph => {
//             var p = document.createElement("p");
//             p.textContent = paragraph.trim(); // Supprimer les espaces inutiles
//             li.appendChild(p);
//         });
//     } else { // Si le message est du texte brut
//         // Si le message est une liste numérotée
//         if (message.startsWith("1.") || message.startsWith("1)")) {
//     // Supprimer le nombre et le point ou la parenthèse de chaque élément de la liste
//     var items = message.split(/\d+\.\s*|\d+\)\s*/).filter(Boolean);

//     // Créer une liste numérotée
//     var ol = document.createElement("ol");

//     // Parcourir chaque élément de la liste
//     items.forEach(item => {
//         var liItem = document.createElement("li");
//         liItem.textContent = item.trim(); // Supprimer les espaces inutiles
//         ol.appendChild(liItem);
//     });

//     // Ajouter la liste numérotée au message
//     li.appendChild(ol);
// }
//  else { // Si le message est un paragraphe simple
//             var p = document.createElement("p");
//             p.textContent = message;
//             li.appendChild(p);
//         }
//     }

//     fragment.appendChild(li);
//     chatHistory.appendChild(fragment);
    
//     // Ajouter le message au stockage local
//     addToLocalStorage(message, role);

//     if (toggleSpeechCheckbox.checked && role === 'bot') {
//         readLastMessage(message);
//     }
    
//     // Vider la valeur de la zone de texte
//     var textarea = document.getElementById("con");
//     textarea.value = "";
// }




console.log("Historique des messages :");
    chatHistory.childNodes.forEach(node => {
        console.log(node.textContent);
    });
    
// Fonction récursive pour afficher le message progressivement
function displayMessage(element, message, index) {
    if (index < message.length) {
        element.textContent += message[index];
        index++;
        // Utiliser requestAnimationFrame pour optimiser les performances
        requestAnimationFrame(() => displayMessage(element, message, index));
    }
}

// Fonction pour lire le dernier message vocal
function readLastMessage(message) {
    var utterance = new SpeechSynthesisUtterance(message);
    synth.speak(utterance);
}

// Fonction pour activer/désactiver la lecture vocale
function toggleLectureVocale() {
    // Met à jour l'icône du microphone en fonction de l'état de la checkbox
    if (toggleSpeechCheckbox.checked) {
        microIcon.classList.remove("fa-microphone-slash");
        microIcon.classList.add("fa-microphone");
    } else {
        microIcon.classList.remove("fa-microphone");
        microIcon.classList.add("fa-microphone-slash");
        
        // Arrête la lecture vocale
        synth.cancel();
    }
}


// Reste du code inchangé...


// Déclaration d'un tableau pour stocker les questions et réponses
var conversationHistory = [];

async function sendMessage() {
    // Récupérer le message de l'utilisateur
    var userMessage = document.getElementsByName("content")[0].value.trim();

    // Vérifier si le message de l'utilisateur est vide
    if (userMessage === "") {
        // Afficher un message d'erreur centré
        Toastify({
            text: "Le champ de saisie ne peut pas être vide",
            duration: 3000,
            gravity: "top",
            backgroundColor: "linear-gradient(to right, #ff0000, #ff5500)",
            className: "toastify-center",
        }).showToast();
        return;
    }
    
    // Afficher le spinner pendant l'attente de la réponse
    document.getElementById("spinner").style.display = "block";

    // Désactiver le champ de saisie et le bouton pendant l'envoi de la question
    document.getElementsByName("content")[0].disabled = true;
    isProcessing = true;

    // Si l'historique de la conversation n'est pas vide, l'envoyer avec la nouvelle question
    var data = conversationHistory.length > 0 ? conversationHistory : [];

    // Ajouter la nouvelle question à l'historique de la conversation
    data.push({
        role: "user",
        content: userMessage
    });

    // Ajouter le message de l'utilisateur à l'historique de la conversation
    appendMessage("user", userMessage);'https://judibot.azurewebsites.net/question/';


    // Define the API URL
    // var apiUrl = 'http://127.0.0.1:8000/question/';

        var apiUrl = 'https://judibot.azurewebsites.net/question/';

    try {
        // Make an AJAX call using the fetch API
        var response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });

        // Réactiver le champ de saisie après la réception de la réponse
        document.getElementsByName("content")[0].disabled = false;
        isProcessing = false;

        // Masquer le spinner une fois que la réponse est reçue
        document.getElementById("spinner").style.display = "none";

        // Update the 'response' variable with the actual bot's reply
        var botResponse = await response.json();

        // Ajouter la réponse du bot à l'historique de la conversation
        data.push({
            role: "system",
            content: botResponse
        });

        // Mettre à jour l'historique de la conversation
        conversationHistory = data;

        // Afficher la conversation complète dans la console au format JSON
        console.log("Conversation History: ", JSON.stringify(conversationHistory));

        // Append the bot's response to the chat history
        appendMessage("bot", botResponse);

        // Clear the input field after sending the message
        document.getElementsByName("content")[0].value = "";
    } catch (error) {
        console.error('Error:', error);

        // Réactiver le champ de saisie en cas d'erreur
        document.getElementsByName("content")[0].disabled = false;
        isProcessing = false;

        // Masquer le spinner en cas d'erreur
        document.getElementById("spinner").style.display = "none";

        // Afficher un message toast pour l'erreur
        Toastify({
            text: "Une erreur s'est produite lors de l'envoi de la requête. Veuillez réessayer. vérifier votre connexion Internet",
            duration: 4000,
            gravity: "top",
            backgroundColor: "linear-gradient(to right, #ff0000, #ff5500)",
            className: "toastify-center",
        }).showToast();
        
        // Arrêter la fonction en cas d'erreur pour éviter l'envoi de la question
        return;
    }
}





</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<!-- ... Previous HTML code ... -->

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->


<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>