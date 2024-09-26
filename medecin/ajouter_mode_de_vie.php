<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

// Include the database connection
include 'bdd.php';
$conn = getDBConnection();

// Ensure connection exists
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize success message variable
$successMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign form inputs to variables
    $tabac = $_POST['tabac'];
    $age_comance_fum = (int)$_POST['age_comance_fum'];
    $nbr_cigr = $_POST['nbr_cigr'];
    $arreter = $_POST['arreter'];
    $fois_arreter = (int)$_POST['fois_arreter'];
    $frq_alco = $_POST['frq_alco'];
    
    // Get the patient_id from session or as needed (update as per your session handling)
    $patient_id = $_SESSION['patient_id']; // Assuming you have patient_id stored in session

    // Prepare the SQL statement
    $sql = "INSERT INTO mode_de_vie (patient_id, tabac, age_comance_fum, nbr_cigr, arreter, fois_arreter, frq_alco) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "isssiis", $patient_id, $tabac, $age_comance_fum, $nbr_cigr, $arreter, $fois_arreter, $frq_alco);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $successMessage = "Les données ont été enregistrées avec succès.";
        } else {
            $successMessage = "Erreur lors de l'enregistrement des données: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $successMessage = "Erreur de préparation de la requête: " . mysqli_error($conn);
    }
}

// Fetch data from the vaccin table
$sql = "SELECT * FROM vaccin";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Include the sidebar
include 'sidebar.php'; // Adjust this path according to your project structure
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Vaccins</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center fixed w-full shadow-md">
            <h1 class="text-2xl">mode de vie</h1>
        </div>

        <div class="flex justify-center items-center h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
                <!-- Display success message -->
                <?php if (!empty($successMessage)): ?>
                    <div class="p-4 mb-4 text-green-600 bg-green-100 border border-green-300 rounded">
                        <?php echo $successMessage; ?>
                    </div>
                <?php endif; ?>

                <form method="post" class="space-y-4">
                    <h2 class="text-xl font-semibold mb-4">Mode de vie</h2>

                    <div>
                        <label class="block text-sm font-medium">Fumez-vous?<span class="text-red-500">*</span></label>
                        <div class="flex items-center mt-2">
                            <label class="mr-4"><input type="radio" name="tabac" value="Oui" required class="mr-1"/>Oui</label>
                            <label><input type="radio" name="tabac" value="Non" required class="mr-1"/>Non</label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">À quel age vous commencé à fumer?</label>
                        <input type="number" name="age_comance_fum" placeholder="Age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Combien de cigarettes fumez-vous par jour?<span class="text-red-500">*</span></label>
                        <div class="flex items-center mt-2">
                            <label class="mr-4"><input type="radio" name="nbr_cigr" value="Moins de 5" required class="mr-1"/>Moins de 5</label>
                            <label class="mr-4"><input type="radio" name="nbr_cigr" value="Entre 5 et 10" required class="mr-1"/>Entre 5 et 10</label>
                            <label class="mr-4"><input type="radio" name="nbr_cigr" value="Entre 10 et 20" required class="mr-1"/>Entre 10 et 20</label>
                            <label><input type="radio" name="nbr_cigr" value="Plus de 20" required class="mr-1"/>Plus de 20</label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Avez-vous déjà essayé d'arrêter?<span class="text-red-500">*</span></label>
                        <div class="flex items-center mt-2">
                            <label class="mr-4"><input type="radio" name="arreter" value="Oui" required class="mr-1"/>Oui</label>
                            <label><input type="radio" name="arreter" value="Non" required class="mr-1"/>Non</label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Combien de fois?</label>
                        <input type="number" name="fois_arreter" placeholder="Nombre de fois" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium">À quelle fréquence consommez-vous des boissons alcoolisées?<span class="text-red-500">*</span></label>
                        <div class="flex items-center mt-2">
                            <label class="mr-4"><input type="radio" name="frq_alco" value="Jamais" required class="mr-1"/>Jamais</label>
                            <label class="mr-4"><input type="radio" name="frq_alco" value="Occasionnellement" required class="mr-1"/>Occasionnellement</label>
                            <label class="mr-4"><input type="radio" name="frq_alco" value="Souvent" required class="mr-1"/>Souvent</label>
                            <label><input type="radio" name="frq_alco" value="Trés souvent" required class="mr-1"/>Trés souvent</label>
                        </div>
                    </div>

                    <div>
                        <input type="submit" value="Envoyer" name="submit" class="w-full bg-blue-600 text-white font-semibold rounded-lg p-2 hover:bg-blue-700 cursor-pointer"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

