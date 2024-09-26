<?php
session_start();
if (isset($_SESSION['login'])) {
    // Include the connection file
    include('bdd.php');

    // Establish the database connection
    $db = getDBConnection();
    
    // Get the logged-in doctor's ID
    $id_m = $_SESSION['login'];

    // Initialize search variables
    $search_id = isset($_GET['search_id']) ? mysqli_real_escape_string($db, $_GET['search_id']) : '';
    $search_nom = isset($_GET['search_nom']) ? mysqli_real_escape_string($db, $_GET['search_nom']) : '';
    $search_prenom = isset($_GET['search_prenom']) ? mysqli_real_escape_string($db, $_GET['search_prenom']) : '';

    // Build the SQL query with improved search conditions
    $sql = "SELECT * FROM patient WHERE medecin_f='$id_m'";
    if (!empty($search_id)) {
        $sql .= " AND id_p = '$search_id'";
    }
    if (!empty($search_nom)) {
        $sql .= " AND nom LIKE '$search_nom%'";
    }
    if (!empty($search_prenom)) {
        $sql .= " AND prenom LIKE '$search_prenom%'";
    }

    $result = mysqli_query($db, $sql) or die('Erreur SQL !' . $sql . '<br>' . mysqli_error($db));

    // HTML starts here
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DOCTEUR</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <!-- CSS links remain the same -->
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="css/dist/css/skins/_all-skins.min.css">

        <!-- Additional styles -->
        <style>
            /* ... (previous styles remain unchanged) ... */

            /* Styles for modal */
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.4);
            }
 .message {
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
            }
            .success {
                background-color: #d4edda;
                border-color: #c3e6cb;
                color: #155724;
            }
            .error {
                background-color: #f8d7da;
                border-color: #f5c6cb;
                color: #721c24;
            }
            .modal-content {
                background-color: #fefefe;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

  h1 {
                text-align: center;
                color: #0056b3;
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 30px;
            }
h3 {
                color: #333;
                font-size: 24px;
                margin-bottom: 20px;
            }
.form-container {
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 8px;
                margin-top: 20px;
                border: 1px solid #ddd;
            }

 .form-group label {
                font-weight: bold;
            }

.btn-back
{
 background-color: white;

}
            .btn-primary {
                background-color: #0056b3;
                border-color: #0056b3;
            }
/* Table styling */
            .table th {
                background-color: #0056b3;
                color: #fff;
                text-align: center;
            }

            .table td {
                text-align: center;
                vertical-align: middle;
            }
.no-results {
                text-align: center;
                font-size: 18px;
                color: red;
                padding: 20px;
            }
        </style>
     </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Header and sidebar code remains the same -->

        <div class="content-wrapper">
            <!-- Centered title -->
            <section class="content-header">
                <h1 class="">Liste des Patients</h1>
            </section>
<section class="content">
                <?php
                // Display message if set
                if (isset($_SESSION['message'])) {
                    $message_class = (strpos($_SESSION['message'], 'successfully') !== false) ? 'success' : 'error';
                    echo "<div class='message {$message_class}'>{$_SESSION['message']}</div>";
                    unset($_SESSION['message']); // Clear the message after displaying
                }
                ?>
            <!-- Content section with search functionality -->
            <section class="content">
                <div class="box form-container">
                    <!-- Back button -->
                    <a href="dashboard_medecin.php" class="btn btn-back">
                        <i class="fa fa-arrow-left"></i> Retour à l'accueil
                    </a>

                    <div class="box-header">
                        <!-- Mini title for search section -->
                        <h3 class="box-title">Rechercher des Patients</h3>
                    </div>
                    <div class="box-body">
                        <form method="GET" action="">
                            <div class="form-row">
                                <!-- Search by patient ID -->
                                <div class="form-group col-md-3">
                                    <label for="search_id">ID Patient:</label>
                                    <input type="text" class="form-control" id="search_id" name="search_id" value="<?php echo htmlspecialchars($search_id); ?>" placeholder="Entrez l'ID exact">
                                </div>
                                <!-- Search by patient last name -->
                                <div class="form-group col-md-3">
                                    <label for="search_nom">Nom:</label>
                                    <input type="text" class="form-control" id="search_nom" name="search_nom" value="<?php echo htmlspecialchars($search_nom); ?>" placeholder="Commence par...">
                                </div>
                                <!-- Search by patient first name -->
                                <div class="form-group col-md-3">
                                    <label for="search_prenom">Prénom:</label>
                                    <input type="text" class="form-control" id="search_prenom" name="search_prenom" value="<?php echo htmlspecialchars($search_prenom); ?>" placeholder="Commence par...">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary form-control">Rechercher</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
       <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($patient = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$patient['id_p']}</td>
                                    <td>{$patient['nom']}</td>
                                    <td>{$patient['prenom']}</td>
                                    <td>{$patient['adresse']}</td>
                                    <td>{$patient['tel']}</td>
                                    <td>
                                        <button onclick='openUpdateModal({$patient['id_p']})' class='btn btn-primary btn-sm'>Modifier</button>
                                        <button onclick='openDeleteModal({$patient['id_p']})' class='btn btn-danger btn-sm'>Supprimer</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='no-results'>Aucun patient trouvé</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Update Modal -->
        <div id="updateModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Modifier le patient</h2>
                <form id="updateForm" method="POST" action="update_patient.php">
                    <input type="hidden" id="update_id_p" name="id_p">
                    <div class="form-group">
                        <label for="update_nom">Nom:</label>
                        <input type="text" class="form-control" id="update_nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="update_prenom">Prénom:</label>
                        <input type="text" class="form-control" id="update_prenom" name="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="update_adresse">Adresse:</label>
                        <input type="text" class="form-control" id="update_adresse" name="adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="update_tel">Téléphone:</label>
                        <input type="text" class="form-control" id="update_tel" name="tel" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Supprimer le patient</h2>
                <p>Êtes-vous sûr de vouloir supprimer ce patient ?</p>
                <form id="deleteForm" method="POST" action="delete_patient.php">
                    <input type="hidden" id="delete_id_p" name="id_p">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Annuler</button>
                </form>
            </div>
        </div>

        <script src="css/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <script src="css/bootstrap/js/bootstrap.min.js"></script>
        <script>
            // Get the modals
            var updateModal = document.getElementById("updateModal");
            var deleteModal = document.getElementById("deleteModal");

            // Get the <span> element that closes the modal
            var spans = document.getElementsByClassName("close");

            // When the user clicks on <span> (x), close the modal
            for (let span of spans) {
                span.onclick = function() {
                    updateModal.style.display = "none";
                    deleteModal.style.display = "none";
                }
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == updateModal) {
                    updateModal.style.display = "none";
                }
                if (event.target == deleteModal) {
                    deleteModal.style.display = "none";
                }
            }

            function openUpdateModal(id) {
                updateModal.style.display = "block";
                document.getElementById("update_id_p").value = id;
                // You would typically fetch the patient's data here and populate the form
            }

            function openDeleteModal(id) {
                deleteModal.style.display = "block";
                document.getElementById("delete_id_p").value = id;
            }

            function closeDeleteModal() {
                deleteModal.style.display = "none";
            }
        </script>
    </body>
    </html>
    <?php
} else {
    header('location:../connexion/index.php');
}
?>
