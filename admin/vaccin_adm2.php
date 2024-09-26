<meta charset="utf-8">
<?php 
session_start();

// Include the database connection file
include 'bdd.php';

// Check if form fields are set and not empty
if (isset($_POST['nom_vaccin']) && isset($_POST['nb_injection']) && isset($_POST['date_1_injection'])) {

    // Retrieve form data and sanitize it to prevent SQL injection
    $nom_vaccin = htmlspecialchars($_POST['nom_vaccin']);
    $nb_injection = intval($_POST['nb_injection']);
    $date_1_injection = $_POST['date_1_injection'];

    // Prepare the SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO vaccin (nom_vaccin, nb_injection, date_1_injection) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nom_vaccin, $nb_injection, $date_1_injection);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo 'Votre vaccin a été ajouté avec succès.';
    } else {
        echo 'Erreur lors de l\'ajout du vaccin : ' . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();

} else {
    echo '<font color="red" size=6>Attention, un champ est vide !</font>';
}
?>

