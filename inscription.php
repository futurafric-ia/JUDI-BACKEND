<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <title>Document</title>
</head>
<body>
<script>
    // Fonction pour afficher le toast
    
        toastr.error("erreure");
    
</script>
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
           
            <span class="text-primary">JUDI pour résoudre vos besoins juridiques</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
JuDi abréviation de « Juriste Digital », est un assistant juridique alimenté par l'IA révolutionnant l'accès aux ressources juridiques en Côte d'Ivoire et en Afrique subsaharienne. Il agit comme un expert juridique virtuel, offrant des conseils, des ressources et une assistance abordables aux particuliers, aux entreprises et aux professionnels du droit
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">




            <form method="post" action="db.php">
    <!-- 2 colonnes pour les prénoms et noms de famille -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <label class="form-label" for="form3Example1">Prénom</label>
                <input type="text" id="form3Example1" class="form-control" name="prenom" />
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <label class="form-label" for="form3Example2">Nom de famille</label>
                <input type="text" id="form3Example2" class="form-control" name="nom" />
            </div>
        </div>
    </div>

    <!-- Champ email -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example3">Adresse e-mail</label>
        <input type="email" id="form3Example3" class="form-control" name="email" />
    </div>

    <!-- Champ mot de passe -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4">Mot de passe</label>
        <input type="password" id="form3Example4" class="form-control" name="mot_de_passe" />
    </div>

    <!-- Bouton d'envoi -->
    <button type="submit" class="btn btn-primary btn-block mb-4">
        S'inscrire
    </button>

    <p class="text-center" >Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>

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