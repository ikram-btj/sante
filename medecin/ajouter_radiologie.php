<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

// Include the database connection
include 'bdd.php';
$conn = getDBConnection();
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Collect form data
    $type_rad = $_POST['type_rad'];
    $partie_corps = $_POST['partie_corps'];
    $motif_radio = $_POST['motif_radio'];
    $date_resultat_radio = date('Y-m-d', strtotime($_POST['date_resultat_radio'])); // Convert date format to YYYY-MM-DD
    $commentaires_radio = $_POST['commentaires_radio'];

    // Prepare and execute SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO radiologie (type_rad, partie_corps, motif_radio, date_resultat_radio, commentaires_radio) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $type_rad, $partie_corps, $motif_radio, $date_resultat_radio, $commentaires_radio);
    
    if ($stmt->execute()) {
        $message = "Données enregistrées avec succès!";
    } else {
        $message = "Erreur: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}

// Include the sidebar
include 'sidebar.php'; // Adjust this path according to your project structure
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Examen Radiologique</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center  w-full shadow-md">
            <h1 class="text-2xl">Ajouter Examen Radiologique</h1>
        </div>

       <div class="flex justify-center items-center min-h-screen my-16">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <form class="formoid-solid-green" method="post" action="">
            <div class="title mb-6 text-center">
                <h2 class="text-2xl font-semibold text-gray-800">Examens Radiologiques</h2>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="type_rad">Type d'examen</label>
                <input class="border border-gray-300 rounded-lg p-3 w-full" type="text" name="type_rad" placeholder="Type d'examen" required />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="partie_corps">Partie du corps examinée</label>
                <input class="border border-gray-300 rounded-lg p-3 w-full" type="text" name="partie_corps" placeholder="Partie du corps examinée" required />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="motif_radio">Motif de l'examen</label>
                <textarea class="border border-gray-300 rounded-lg p-3 w-full" name="motif_radio" cols="20" rows="5" placeholder="Motif de l'examen" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="date_resultat_radio">Date de résultat</label>
                <input class="border border-gray-300 rounded-lg p-3 w-full" type="date" name="date_resultat_radio" required />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="commentaires_radio">Rapport médical</label>
                <textarea class="border border-gray-300 rounded-lg p-3 w-full" name="commentaires_radio" cols="20" rows="5" placeholder="Rapport médical"></textarea>
            </div>

            <div class="mt-6">
                <input class="bg-sky-700 text-white rounded-lg py-2 px-4 w-full hover:bg-sky-600 transition duration-200" type="submit" value="Envoyer" name="submit">
            </div>
        </form>

        <!-- Print message at the end of the form -->
        <?php if ($message): ?>
            <div class="message mt-4 text-green-600">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
    </div>
</body>
</html>

