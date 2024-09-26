<?php
// bdd.php
function getDBConnection() {
    $db = mysqli_connect('localhost', 'root', '123456789', 'carnet_de_sante');
    if (!$db) {
        die('Erreur de connexion: ' . mysqli_connect_error());
    }
    return $db;
}
?>

