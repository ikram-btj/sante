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
    $patient_id = $_SESSION['patient_id']; // Assuming patient_id is stored in session
    $admission_date = date('Y-m-d H:i:s', strtotime($_POST['date_hosp'])); // Convert date format to YYYY-MM-DD HH:MM:SS
    $discharge_date = NULL; // This will be set when the patient is discharged
    $reason = $_POST['service']; // Assuming the service is the reason for hospitalization
    $treatment_details = $_POST['motif_hosp']; // Assuming motif_hosp contains treatment details
    $status = 'Admitted'; // Default status

    // Prepare and execute SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO hospitalisation (patient_id, admission_date, discharge_date, reason, treatment_details, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $patient_id, $admission_date, $discharge_date, $reason, $treatment_details, $status);
    
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
    <title>Ajouter Hospitalisation</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center w-full shadow-md">
            <h1 class="text-2xl">Ajouter Hospitalisation</h1>
        </div>

        <div class="flex justify-center items-center min-h-screen my-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
                <form class="formoid-solid-green" method="post" action="">
                    <div class="title mb-6 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Hospitalisation</h2>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="date_hosp">Date d'entrée</label>
                        <input class="border border-gray-300 rounded-lg p-3 w-full" type="date" name="date_hosp" placeholder="Date d'entrée" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="service">Service</label>
                        <input class="border border-gray-300 rounded-lg p-3 w-full" type="text" name="service" placeholder="Service" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="motif_hosp">Motif d'hospitalisation</label>
                        <textarea class="border border-gray-300 rounded-lg p-3 w-full" name="motif_hosp" cols="20" rows="5" placeholder="Motif d'hospitalisation" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="duree_hosp">Durée d'hospitalisation</label>
                        <input class="border border-gray-300 rounded-lg p-3 w-full" type="text" name="duree_hosp" placeholder="Durée d'hospitalisation" required />
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

