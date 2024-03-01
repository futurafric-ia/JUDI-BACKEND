<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="futur.jpg" type="image/x-icon">
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

    <title>JUDI</title>
</head>
<body style="background-color: #F5F5F5;">
<style>
/* Ajoutez votre animation CSS ici */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animated-element {
  animation: fadeIn 1.5s ease forwards;
}

</style>
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0 animated-element">
  <h3 class="my-5 display-3 fw-bold ls-tight">
    <span class="text-primary">JUDI pour résoudre vos besoins juridiques</span>
  </h3>
  <p style="color: hsl(217, 10%, 50.8%)">
    JUDi, l'assistant juridique alimenté par l'IA, révolutionne l'accès au droit en Afrique en offrant des conseils et des ressources abordables.
  </p>
</div>
<script>
// JavaScript pour déclencher l'animation lors du chargement de la page
document.addEventListener('DOMContentLoaded', function() {
  var element = document.querySelector('.animated-element');
  element.classList.add('fadeIn');
});
</script>

        <div class="col-lg-6 mb-5 mb-lg-0" >
          <div class="card"style="border-radius: 20px; border: 2px solid gray;background-color: #F5F5F5;">
            <div class="card-body py-5 px-md-5">




            <form method="post" action="db.php">
    <!-- 2 colonnes pour les prénoms et noms de famille -->
    <div class="row">
        <div class="col-md-6 mb-2">
            <div class="form-outline">
                <label class="form-label" for="form3Example1">Prénom</label>
                <input type="text" id="form3Example1" class="form-control" name="prenom" style="border-radius: 20px;"/>
            </div>
        </div>
        
        <div class="col-md-6 mb-2">
            <div class="form-outline">
                <label class="form-label" for="form3Example2">Nom de famille</label>
                <input type="text" id="form3Example2" class="form-control" name="nom"style="border-radius: 20px;" />
            </div>
        </div>
    </div>

    <!-- Champ email -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example3">Adresse e-mail</label>
        <input type="email" id="form3Example3" class="form-control" name="email" style="border-radius: 20px;"/>
        <?php
           if (isset($_GET['error']) && $_GET['error'] === 'missing_fields') {
       echo "<div class='text-danger'>Veuillez remplir ce champ.</div>";
        } elseif (isset($_GET['error']) && $_GET['error'] === 'user_not_found') {
      echo "<div class='text-danger'>L'email est déjà utilisé.</div>";
      }
?>
    </div>

    <!-- Champ mot de passe -->
    <div class="form-outline mb-4">
    <label class="form-label" for="form3Example4">Mot de passe</label>
    <input type="password" id="form3Example4" class="form-control" name="mot_de_passe" style="border-radius: 20px;"/>
    <small id="passwordHelp" class="form-text text-danger">Le mot de passe doit comporter au moins 4 caractères.</small>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var passwordInput = document.getElementById("form3Example4");
        var passwordHelp = document.getElementById("passwordHelp");

        passwordInput.addEventListener("input", function() {
            var password = passwordInput.value;
            if (password.length < 4) {
                // Si le mot de passe est inférieur à 4 caractères, afficher un message d'erreur en rouge
                passwordHelp.textContent = "Le mot de passe doit comporter au moins 4 caractères.";
                passwordHelp.style.color = "red"; // Couleur du texte en rouge
            } else {
                // Si le mot de passe est valide, afficher un message de validation en vert
                passwordHelp.textContent = "Mot de passe valide.";
                passwordHelp.style.color = "green"; // Couleur du texte en vert
            }
        });

        // Empêcher l'envoi du formulaire si le mot de passe est trop court
        var form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            var password = passwordInput.value;
            if (password.length < 4) {
                // Empêcher l'envoi du formulaire
                event.preventDefault();
                // Afficher un message d'erreur
                passwordHelp.textContent = "Le mot de passe doit comporter au moins 4 caractères.";
                passwordHelp.style.color = "red"; // Couleur du texte en rouge
            }
        });
    });
</script>



    <!-- Bouton d'envoi -->
    <button type="submit" class="btn btn-primary btn-block mb-4"style="border-radius: 20px;">
        S'inscrire
    </button>

    <p class="text-center" >Déjà inscrit ? <a href="index.php">Connectez-vous ici</a></p>

    <!-- Boutons d'inscription -->
    
</form>




            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>

<!-- Section: Design Block -->

</body>
</html>