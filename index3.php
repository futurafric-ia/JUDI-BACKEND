<!DOCTYPE html>
<html lang="en">
<head>
    <title>Judy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xrknDq7VbN8ylOPL6Mo9RJlgq8FSc3SFMF+ThvvU75zDtzYSfL3vSIO4jMr0I6cgT1GYeCpoix7z2iMRcMR9zg==" crossorigin="anonymous" />
    <style>
      @media (max-width: 768px) {
    #myInputContainer {
        width: 100%; /* Pleine largeur pour les petits écrans */
        border-radius: 20px; /* Supprimez le border-radius pour une apparence plus simple */
    }
}
        /* Ajoutez un style personnalisé si nécessaire */
/* Style pour le conteneur parent (ajuster la hauteur selon vos besoins) */
.container-parent {
    position: relative;
    height: 100vh; /* 100% de la hauteur de la fenêtre */
}

/* Style pour #myInputContainer */
/* Style pour #myInputContainer */
#myInputContainer {
 position: absolute;
            bottom: 0;
            width: 90%;
            max-width: 60%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 10px;
            display: flex;
            align-items: center;

          
         
}

#con {
            /* max-height: 60px; Hauteur maximale */
            overflow-y: auto; /* Activer le défilement vertical si nécessaire */
            resize: none; /* Désactiver le redimensionnement manuel */
            height: auto;
            height: 200px;
            
        }

#content {
            width: 100%;
            box-sizing: border-box;
            padding-right: 40px; /* Espace pour l'icône */
            transition: height 0.3s; 
        }

        



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

        .chat-container {
            max-width: 100%;
            margin: auto;
            padding:auto;
        }

        .chat-box {
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        #chatHistory {
    max-height: 80vh; /* Réglez la hauteur maximale à 80% de la hauteur de la fenêtre visible */
    overflow-y: auto; /* Activez le défilement vertical si nécessaire */
}

.chat-history {
    list-style-type: none;
    padding: 10px;
    margin: 0;
    margin-bottom: 20px; /* Ajoutez une marge inférieure pour éviter le chevauchement avec le formulaire */
}



        .user-message, .bot-message {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
        }

        .user-message {
            background-color: #f0f0f0;
            text-align: right;
        }

        .bot-message {
            background-color: #e0e0e0;
        }

        body {
            transition: background-color 0.3s ease;
        }

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

    </style>
</head>
<body class="d-flex flex-column h-100">

<!-- toast de connexion -->
<script>
        // Afficher un toast lors du chargement de la page
        toastr.success('Bienvenue sur le chatbot JUDY');
    </script>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>

        <div class="p-4">
            <h1><a href="index.html" class="logo" style="text-align: center;">JUDI </a></h1>
            <ul class="list-unstyled components mb-5">
            <li class="active">
    <a href="index3.php"><span class="fa fa-home mr-3"></span>Accueil</a>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="switchCouleur" onclick="changerCouleur()">
        <label class="form-check-label" for="switchCouleur">Changer la couleur</label>
    </div>

    
    <!-- Switch pour activer/désactiver la lecture vocale -->
    <div class="form-check form-switch d-flex align-items-center">
        <input class="form-check-input" type="checkbox" id="toggleSpeech" onchange="toggleLectureVocale()">
        <label class="form-check-label" for="toggleSpeech">Activer la lecture vocale</label>
        <i class="fas fa-microphone micro ms-3" onclick="lireDernierMessage()" id="microIcon" style="color: white;"></i>
    </div>

    <a href="deconnexion.php" ><span class="fa fa-sign-out-alt"></span> Se déconnecter</a>

    <!-- Conteneur pour l'historique des questions -->
    <div id="questionHistoryContainer">
        <p>Historique des Questions</p>
        <ul id="questionHistoryList"></ul>
    </div>

    
</li>

            </ul>
        </div>

    </nav>

    <div id="content" class="p-4 p-md-5 pt-5">
       
    <!-- reponse du chatbot -->

        <div class="chat-container">
            <div class="chat-box">
                <ul class="chat-history" id="chatHistory">
                  
                </ul>
            </div>

           
<div class="container mt-3">
    <form method="post" id="myForm">
        <div class="form-group" id="myInputContainer">
            <input type="hidden" name="role" value="user">
            <div class="input-group">
                <textarea class="form-control" id="con" name="content" placeholder="Votre message..." required oninput="adjustTextareaHeight(this)"></textarea>
                <div class="input-group-append">
                    <i class="fas fa-paper-plane send-icon mr-2" onclick="sendMessage()"></i>
                    <i class="fas fa-microphone microphone-icon" onclick="recordAndTranslate()"></i>

                    <!-- <i class="fas fa-microphone micro"onclick="lireDernierMessage()"></i> -->

                    <span id="recordingDuration" style="color: red;"></span>

      
    
                </div>
         
            </div>
        </div>
    </form>
</div>



        </div>

    </div>
</div>

<script>





    function changerCouleur() {
        var switchCouleur = document.getElementById('switchCouleur');
        var couleurParDefaut = window.getComputedStyle(document.body).getPropertyValue('background-color');

        if (switchCouleur.checked) {
            document.body.style.setProperty('background-color', '#292929', 'important');

        } else {
            document.body.style.setProperty('background-color', 'white', 'important');

        }
    }
</script>

<script>
    async function recordAndTranslate() {
        try {
            const recognition = new webkitSpeechRecognition();
            recognition.lang = 'fr-FR'; // Language for speech recognition
            recognition.noiseSuppression = true; // Enable noise suppression

            let startTime;
            recognition.onstart = () => {
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
                const endTime = Date.now();
                const duration = (endTime - startTime) / 1000;
                document.getElementById("recordingDuration").textContent = `Recording duration: ${duration.toFixed(2)}s`;
                setTimeout(() => {
                    document.getElementById("recordingDuration").textContent = '';
                }, 2000); // Remove after 2 seconds
            };

            recognition.start();
        } catch (error) {
            console.error('Speech recognition error:', error);
        }
    }
</script>



<script>
     function adjustTextareaHeight(element) {
        element.style.height = 'auto';
        element.style.height = (element.scrollHeight > 60 ? 60 : element.scrollHeight) + 'px';
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

    // Assurez-vous que cette fonction est définie avant l'appel à sendMessage
    function appendMessage(role, message) {
        var chatHistory = document.getElementById("chatHistory");

        // Utiliser un fragment de document pour réduire les manipulations du DOM
        var fragment = document.createDocumentFragment();
        var li = document.createElement("li");
        li.className = role + "-message";

        // Affiche le message immédiatement si c'est la réponse du chatbot
        if (role === "bot") {
            displayMessage(li, message, 0);
            // Lire le dernier message vocal
            if (toggleSpeechCheckbox.checked) {
                readLastMessage(message);
            }
        } else {
            li.textContent = message; // Affiche immédiatement la question de l'utilisateur
        }

        fragment.appendChild(li);

        // Ajouter le fragment de document au DOM une seule fois
        chatHistory.appendChild(fragment);
    }

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

    // Fonction pour lire vocalement le dernier message
    function lireDernierMessage() {
        var chatHistory = document.getElementById("chatHistory");
        var messages = chatHistory.getElementsByClassName("bot-message");
        if (messages.length > 0) {
            var dernierMessage = messages[messages.length - 1].textContent;
            readLastMessage(dernierMessage);
        }
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
        }
    }

    async function sendMessage() {
        var userMessage = document.getElementsByName("content")[0].value;
        if (userMessage.trim() === "" || isProcessing) {
            return; // Don't send empty messages or when processing
        }

        // Désactiver le champ de saisie et le bouton pendant l'envoi de la question
        document.getElementsByName("content")[0].disabled = true;
        isProcessing = true;

        // Append user's message to the chat history
        appendMessage("user", "Utilisateur : " + userMessage);

        // Define the API URL
        var apiUrl = 'http://127.0.0.1:8000/question/';

        // Get data from the form
        var role = document.getElementsByName("role")[0].value;
        var content = userMessage;

        // Create an object with form data
        var data = {
            role: role,
            content: content
        };

        try {
            // Make an AJAX call using the fetch API
            var response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify([data]),
            });

            // Réactiver le champ de saisie après la réception de la réponse
            document.getElementsByName("content")[0].disabled = false;
            isProcessing = false;

            // Update the 'response' variable with the actual bot's reply
            var botResponse = await response.json();

            // Append the bot's response to the chat history
            appendMessage("bot", "BOT JUDI : " + botResponse);

            // Clear the input field after sending the message
            document.getElementsByName("content")[0].value = "";
        } catch (error) {
            console.error('Error:', error);

            // Réactiver le champ de saisie en cas d'erreur
            document.getElementsByName("content")[0].disabled = false;
            isProcessing = false;
        }
    }

    function handleEnterKey(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Empêcher le saut de ligne dans le champ de texte
            sendMessage(); // Appeler la fonction sendMessage()
        }
    }
</script>


<!-- ... Rest of the HTML code ... -->


<!-- ... Rest of the HTML code ... -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<!-- ... Previous HTML code ... -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
