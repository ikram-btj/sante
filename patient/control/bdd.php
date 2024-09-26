<?php
try {
    $dsn = 'mysql:host=localhost;dbname=carnet_de_sante';
    $username = 'root';  // Replace with your actual database username
    $password = '123456789';  // Replace with your actual database password
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );
    
    // Create a PDO instance (connect to the database)
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Handle error
    die('Connection failed: ' . $e->getMessage());
}
?>

