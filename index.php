<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

         <link rel="icon" href="futur.jpg" type="image/x-icon">
    <title>JUDI</title>
</head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<style>
    /* Classe personnalisée pour réduire la largeur des champs */
    .narrow-input {
        max-width: 400px; /* Ajustez la largeur maximale selon vos besoins */
        margin: 0 auto; /* Centre le champ horizontalement */
       
    }

    
    
    .slide-in-down {
    animation: slideInDownAnimation 1s ease-in;
}

@keyframes slideInDownAnimation {
    0% {
        opacity: 0;
        transform: translateY(-100%);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>

<body style="background-color: #F5F5F5;">

    <div class="container">

    <div class="text-center mt-5 slide-in-down">
    <h1 class="text-dark font-weight-bold">JUDI</h1>
    <h2 class="text-dark">Parlez à JUDI</h2>
</div>

<form method="post" action="db_login.php" class="mt-4">
    <div class="form-outline mb-4">
        <input type="email" id="form3Example3" class="form-control col-md-6 col-10 mx-auto" name="email" required placeholder="Email" style="border-radius: 20px;"/>
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'missing_fields') {
            echo "<div class='text-danger text-center'>Veuillez remplir ce champ.</div>";
        } elseif (isset($_GET['error']) && $_GET['error'] === 'user_not_found') {
            echo "<div class='text-danger text-center'>L'utilisateur n'existe pas.</div>";
        }
        ?>
    </div>

    <div class="form-outline mb-4">
        <input type="password" id="form3Example4" class="form-control col-md-6 col-10 mx-auto" name="mot_de_passe" placeholder="Mot de passe" style="border-radius: 20px;"/>
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'missing_fields') {
            echo "<div class='text-danger text-center'>Veuillez remplir ce champ.</div>";
        } elseif (isset($_GET['error']) && $_GET['error'] === 'incorrect_password') {
            echo "<div class='text-danger text-center'>Mot de passe incorrect.</div>";
        }
        ?>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-dark mt-3 mb-4"> Connexion</button>
    </div>
</form>

            <p class="text-center">Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>


<!-- 
            <p class="mt-3">OR</p>
<button onclick="googleSignIn()" class="btn btn-light"><img src="go.png" alt="Google logo" style="height: 20px;"> Continuer avec Google</button>
<p class="text-muted mt-5">JUDI.ai est actuellement en version bêta.</p> -->

        </div>
    </div>
</body>

</html>