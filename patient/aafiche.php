<?php
include('control/bdd.php');
session_start();
$id_p = $_SESSION['login_p'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Analyse</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="css/plugins/morris/morris.css">
  <link rel="stylesheet" href="css/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="css/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="css/plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">

<?PHP include("menu/header.php"); include("menu/nav_bar.php"); ?>

<br><br><br>

<section>
  <br>
  <center>
    <form>
    <?php
include('control/bdd.php');
session_start();

// Assuming you're logged in with `login_p` in the session
$id_p = $_SESSION['login_p'];

try {
    // Prepare SQL query to fetch patient data by `login_p`
    $sql = "SELECT * FROM patient WHERE login_p = ?";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $id_p);
    $stmt->execute();
    
    // Check if any record is fetched
    if ($row = $stmt->fetch()) {
        // Display patient details
        echo "<h1>Les informations personnelles :</h1>";
        echo "Nom: " . $row['nom'] . "<br>";
        echo "Prénom: " . $row['prenom'] . "<br>";
        echo "Date de naissance: " . $row['date_n'] . "<br>";
        echo "Adresse: " . $row['adresse'] . "<br>";
        echo "Téléphone: " . $row['tel'] . "<br>";
        // You can add other fields as necessary
    } else {
        // If no data is found, output this message
        echo "Aucune information trouvée pour cet utilisateur.";
    }
} catch (PDOException $e) {
    // Catch and display any errors in the SQL query or connection
    echo "Erreur SQL : " . $e->getMessage();
}
?>
    </form>
  </center>
</section>

<script type="text/javascript" src="css/formoid_files/formoid1/jquery.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

