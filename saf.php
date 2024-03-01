<?php 

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
    var dataToSend = conversationHistory.length > 0 ? conversationHistory : [];

    // Ajouter la nouvelle question à l'historique de la conversation
    dataToSend.push({
        role: "user",
        content: userMessage
    });

    // Define the API URL
    var apiUrl = 'https://judibot.azurewebsites.net/question/';

    try {
        // Make an AJAX call using the fetch API
        var response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToSend),
        });

        // Réactiver le champ de saisie après la réception de la réponse
        document.getElementsByName("content")[0].disabled = false;
        isProcessing = false;

        // Masquer le spinner une fois que la réponse est reçue
        document.getElementById("spinner").style.display = "none";

        // Update the 'response' variable with the actual bot's reply
        var botResponse = await response.json();

        // Ajouter la réponse du bot à l'historique de la conversation
        dataToSend.push({
            role: "system",
            content: botResponse
        });

        // Mettre à jour l'historique de la conversation
        conversationHistory = dataToSend;

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
    }
}

?>