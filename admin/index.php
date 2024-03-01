<?php include 'hearder.php'; ?> <!-- Inclure le fichier header.php -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'nav.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'haut.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard-JUDI</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="downloadExcelBtn"><i
                                class="fas fa-download fa-sm text-white-50"></i> Générer un rapport</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">


                       <!-- Earnings (Monthly) Card Example -->
                       <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php
    // Connexion à la base de données
    $servername = '154.56.47.52';
    $username = 'u139181064_judi';
    $password = 'FuturAfric2023@';
    $dbname = 'u139181064_judi';


    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Requête SQL pour calculer la somme totale des notes
    $sql_total_notes = "SELECT SUM(note) AS total_notes FROM utilisateurs WHERE note IS NOT NULL ";
    $result_total_notes = $conn->query($sql_total_notes);

    $total_notes = 0; // Initialisation de la somme totale des notes

    if ($result_total_notes->num_rows > 0) {
        // Récupérer la somme totale des notes
        $row_total_notes = $result_total_notes->fetch_assoc();
        $total_notes = $row_total_notes['total_notes'];
    }

    // Requête SQL pour compter le nombre total d'utilisateurs ayant saisi une note
    $sql_users_with_notes = "SELECT COUNT(*) AS users_with_notes FROM utilisateurs WHERE note IS NOT NULL";
    $result_users_with_notes = $conn->query($sql_users_with_notes);

    $users_with_notes = 0; // Initialisation du nombre total d'utilisateurs ayant saisi une note

    if ($result_users_with_notes->num_rows > 0) {
        // Récupérer le nombre total d'utilisateurs ayant saisi une note
        $row_users_with_notes = $result_users_with_notes->fetch_assoc();
        $users_with_notes = $row_users_with_notes['users_with_notes'];
    }

    // Calcul de la moyenne des notes
    $average_note = $total_notes / $users_with_notes;

    // Fermer la connexion à la base de données
    $conn->close();
?>

<!-- Affichage de la moyenne des notes dans le HTML -->
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>

                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Moyenne de l'applicaion</div>
<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($average_note, 2); ?>/5</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                           
                                    <?php
    // Connexion à la base de données
    // $servername = 'localhost';
    // $username = 'root';
    // $password = '';
    // $dbname = 'judy';

    // $servername = '154.56.47.52';
    // $username = 'u139181064_judi';
    // $password = 'FuturAfric2023@';
    // $dbname = 'FuturAfric2023@';

    $servername = '154.56.47.52';
    $username = 'u139181064_judi';
    $password = 'FuturAfric2023@';
    $dbname = 'u139181064_judi';

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Requête SQL pour compter le nombre d'utilisateurs ayant un rôle null
    $sql = "SELECT COUNT(*) as total_utilisateurs_null FROM utilisateurs WHERE role IS NULL";

    // Exécuter la requête SQL
    $result = $conn->query($sql);

    if ($result) {
        // Récupérer le nombre total d'utilisateurs avec un rôle null
        $row = $result->fetch_assoc();
        $total_utilisateurs_null = $row['total_utilisateurs_null'];

        // Afficher le nombre total d'utilisateurs avec un rôle null
        echo '<div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Nombre d\'utilisateurs </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">' . $total_utilisateurs_null . '</div>
            </div>';
    } else {
        echo "Erreur lors de l'exécution de la requête : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
?>

                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Revenu Total (Annuel)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">FCFA 0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>




                        
       <!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Revenu Mensuel</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">FCFA 0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div> 
                        
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php

$servername = '154.56.47.52';
$username = 'u139181064_judi';
$password = 'FuturAfric2023@';
$dbname = 'u139181064_judi';

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour obtenir le nombre total d'utilisateurs ayant saisi une note
$sql_users_with_notes = "SELECT COUNT(*) AS users_with_notes FROM utilisateurs WHERE note IS NOT NULL";
$result_users_with_notes = $conn->query($sql_users_with_notes);

$users_with_notes = 0; // Initialisation du nombre total d'utilisateurs ayant saisi une note

if ($result_users_with_notes->num_rows > 0) {
    // Récupérer le nombre total d'utilisateurs ayant saisi une note
    $row_users_with_notes = $result_users_with_notes->fetch_assoc();
    $users_with_notes = $row_users_with_notes['users_with_notes'];
}

// Requête SQL pour obtenir le nombre d'utilisateurs dont la note est supérieure à 2
$sql_users_above_two = "SELECT COUNT(*) AS users_above_two FROM utilisateurs WHERE note > 2";
$result_users_above_two = $conn->query($sql_users_above_two);

$users_above_two = 0; // Initialisation du nombre d'utilisateurs dont la note est supérieure à 2

if ($result_users_above_two->num_rows > 0) {
    // Récupérer le nombre d'utilisateurs dont la note est supérieure à 2
    $row_users_above_two = $result_users_above_two->fetch_assoc();
    $users_above_two = $row_users_above_two['users_above_two'];
}

// Calcul du pourcentage des utilisateurs dont la note est supérieure à 2 par rapport au nombre total d'utilisateurs ayant saisi une note
if ($users_with_notes > 0) {
    $percentage_above_two = ($users_above_two / $users_with_notes) * 100;
} else {
    $percentage_above_two = 0; // Si aucun utilisateur n'a saisi de note, le pourcentage est défini à 0 pour éviter une division par zéro
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Affichage du pourcentage des utilisateurs dont la note est supérieure à 2 par rapport au nombre total d'utilisateurs ayant saisi une note dans le HTML -->
<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pourcentage des utilisateurs avec une note supérieure à 2</div>
<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($percentage_above_two, 2); ?>%</div>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>    

                                                <!-- Ce code récupère d'abord le nombre total d'utilisateurs enregistrés dans la base de données, puis le nombre d'utilisateurs ayant saisi une note non nulle. Enfin, il affiche le nombre d'utilisateurs ayant saisi une note par rapport au nombre total d'utilisateurs dans votre HTML. -->



                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php
// Connexion à la base de données
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname ='judy';

// $servername = '154.56.47.52';
// $username = 'u139181064_judi';
// $password = 'FuturAfric2023@';
// $dbname = 'FuturAfric2023@';

$servername = '154.56.47.52';
$username = 'u139181064_judi';
$password = 'FuturAfric2023@';
$dbname = 'u139181064_judi';

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour obtenir le nombre total d'utilisateurs
$sql_total_users = "SELECT COUNT(*) AS total_users FROM utilisateurs WHERE role IS NULL";
$result_total_users = $conn->query($sql_total_users);

$total_users = 0; // Initialisation du nombre total d'utilisateurs

if ($result_total_users->num_rows > 0) {
    // Récupérer le nombre total d'utilisateurs
    $row_total_users = $result_total_users->fetch_assoc();
    $total_users = $row_total_users['total_users'];
}

// Requête SQL pour obtenir le nombre d'utilisateurs ayant saisi une note
$sql_users_with_notes = "SELECT COUNT(*) AS users_with_notes FROM utilisateurs WHERE note IS NOT NULL AND role IS NULL";
$result_users_with_notes = $conn->query($sql_users_with_notes);

$users_with_notes = 0; // Initialisation du nombre d'utilisateurs ayant saisi une note

if ($result_users_with_notes->num_rows > 0) {
    // Récupérer le nombre d'utilisateurs ayant saisi une note
    $row_users_with_notes = $result_users_with_notes->fetch_assoc();
    $users_with_notes = $row_users_with_notes['users_with_notes'];
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Affichage du nombre d'utilisateurs ayant saisi une note par rapport au nombre total d'utilisateurs dans le HTML -->
<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Utilisateurs ayant saisi une note</div>
<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $users_with_notes; ?> / <?php echo $total_users; ?></div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php
$servername = '154.56.47.52';
$username = 'u139181064_judi';
$password = 'FuturAfric2023@';
$dbname = 'u139181064_judi';
// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour obtenir le nombre total d'utilisateurs qui ont saisi une note
$sql_users_with_notes = "SELECT COUNT(*) AS users_with_notes FROM utilisateurs WHERE note IS NOT NULL AND role IS NULL";
$result_users_with_notes = $conn->query($sql_users_with_notes);

$users_with_notes = 0; // Initialisation du nombre total d'utilisateurs ayant saisi une note

if ($result_users_with_notes->num_rows > 0) {
    // Récupérer le nombre total d'utilisateurs ayant saisi une note
    $row_users_with_notes = $result_users_with_notes->fetch_assoc();
    $users_with_notes = $row_users_with_notes['users_with_notes'];
}

// Requête SQL pour obtenir le nombre total d'utilisateurs ayant un rôle nul
$sql_total_users = "SELECT COUNT(*) AS total_users FROM utilisateurs WHERE role IS NULL";
$result_total_users = $conn->query($sql_total_users);

$total_users = 0; // Initialisation du nombre total d'utilisateurs

if ($result_total_users->num_rows > 0) {
    // Récupérer le nombre total d'utilisateurs
    $row_total_users = $result_total_users->fetch_assoc();
    $total_users = $row_total_users['total_users'];
}

// Calcul du pourcentage des utilisateurs ayant saisi une note
if ($total_users > 0) {
    $percentage_users_with_notes = ($users_with_notes / $total_users) * 100;
} else {
    $percentage_users_with_notes = 0;
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Affichage du pourcentage des utilisateurs ayant saisi une note dans le HTML -->
<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pourcentage des utilisateurs ayant saisi une note</div>
<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($percentage_users_with_notes, 2); ?>%</div>


                               
                                    </div>
                                </div>
                            </div>
                        </div>


      
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php
// Connexion à la base de données
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname ='judy';

// $servername = '154.56.47.52';
// $username = 'u139181064_judi';
// $password = 'FuturAfric2023@';
// $dbname = 'FuturAfric2023@';

$servername = '154.56.47.52';
$username = 'u139181064_judi';
$password = 'FuturAfric2023@';
$dbname = 'u139181064_judi';

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour compter le nombre total de sessions
$sql = "SELECT COUNT(*) as total_sessions FROM session";
$result = $conn->query($sql);

$total_sessions = 0; // Initialisation du nombre total de sessions

if ($result->num_rows > 0) {
    // Récupérer le nombre total de sessions
    $row = $result->fetch_assoc();
    $total_sessions = $row['total_sessions'];
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Affichage du nombre total de sessions dans le HTML -->
<div class="col mr-2">
    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
    Total des sessions de discussion enregistrées
    </div>
    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_sessions; ?></div>
</div>

                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                 
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                       

                    </div>

           <!-- DataTable Example -->
           <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des Utilisateurs</h6>
    </div>

    
    
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Note</th>
                    <th>Date d'inscription</th>
                    <th>Action</th> <!-- Nouvelle colonne pour le bouton Supprimer -->
                </tr>
            </thead>
            <tbody>
            <?php
    // Connexion à la base de données
    // $servername = 'localhost';
    // $username = 'root';
    // $password = '';
    // $dbname = 'judy';

    // $servername = '154.56.47.52';
    // $username = 'u139181064_judi';
    // $password = 'FuturAfric2023@';
    // $dbname = 'FuturAfric2023@';

    $servername = '154.56.47.52';
    $username = 'u139181064_judi';
    $password = 'FuturAfric2023@';
    $dbname = 'u139181064_judi';

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les utilisateurs ayant un rôle null
    $sql = "SELECT * FROM utilisateurs WHERE role IS NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les données dans le tableau
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row["id"] . '</td>
                    <td>' . $row["nom"] . '</td>
                    <td>' . $row["prenom"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["note"] . '</td>
                    <td>' . $row["date_inscription"] . '</td>
                    <td><button class="btn btn-danger btn-sm" onclick="deleteUser(' . $row["id"] . ')">Supprimer</button></td>
                </tr>';
        }
    } else {
        echo "Aucun utilisateur trouvé avec un rôle null.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
?>
            </tbody>
        </table>
    </div>
    <!-- Bouton de téléchargement inclus dans le même conteneur que le tableau -->
    <!-- <button id="downloadExcelBtn" class="btn btn-primary">Télécharger en Excel</button> -->
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>
    document.getElementById('downloadExcelBtn').addEventListener('click', function () {
        var table = document.getElementById('dataTable');
        var wb = XLSX.utils.table_to_book(table);
        var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }

        saveAs(new Blob([s2ab(wbout)], { type: "application/octet-stream" }), 'tableau_des_utilisateurs.xlsx');
    });
</script>

<!-- Ajoutez cette balise script à votre page -->
<script>
    function deleteUser(userId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
            // Requête AJAX pour supprimer l'utilisateur
            $.ajax({
                url: 'delete_user.php', // Chemin vers le script PHP qui supprime l'utilisateur
                type: 'POST',
                data: { id: userId }, // ID de l'utilisateur à supprimer
                success: function(response) {
                    alert("Utilisateur supprimé avec succès !");
                    // Recharger la page pour mettre à jour la liste des utilisateurs
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert("Une erreur s'est produite lors de la suppression de l'utilisateur : " + xhr.responseText);
                }
            });
        }
    }
</script>

                    <!-- End DataTable Example -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include 'footer.php'; ?> <!-- Inclure le fichier footer.php -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<!-- Inclure jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Inclure DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Inclure DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Inclure DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

<!-- Inclure DataTables Buttons JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>

<!-- Votre code HTML et PHP existant -->

<!-- DataTables JavaScript -->
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        "language": {
            "sEmptyTable":     "Aucune donnée disponible dans le tableau",
            "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing":     "Traitement...",
            "sSearch":         "Rechercher :",
            "sZeroRecords":    "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst":      "Premier",
                "sLast":       "Dernier",
                "sNext":       "Suivant",
                "sPrevious":   "Précédent"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                    "_": "Vous avez sélectionné %d lignes",
                    "0": "Aucune ligne sélectionnée",
                    "1": "1 ligne sélectionnée"
                }
            },
        },
       
    });
});
</script>

<!-- Votre code HTML et PHP existant continue ici -->




</body>
</html>


</div>  
