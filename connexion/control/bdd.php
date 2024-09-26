<?php
try {
    $host = 'localhost';
    $dbname = 'carnet_de_sante';
    $username = 'root';
    $password = '123456789'; // Replace with your actual database password if there is one

    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
?>
