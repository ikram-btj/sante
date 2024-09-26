<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

// Include the database connection
include 'bdd.php';
$conn = getDBConnection();
$hospitalisations = [];
$message = "";

// Handle search
$date_search = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $date_search = $_POST['date_search'];
    $sql = "SELECT * FROM hospitalisation WHERE DATE(admission_date) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $date_search);
} else {
    $sql = "SELECT * FROM hospitalisation";
    $stmt = $conn->prepare($sql);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $hospitalisations[] = $row;
    }
} else {
    $message = "Erreur lors de la récupération des données: " . $conn->error;
}

$stmt->close();
$conn->close();

// Include the sidebar
include 'sidebar.php'; // Adjust this path according to your project structure
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Hospitalisations</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center w-full shadow-md">
            <h1 class="text-2xl">Liste des Hospitalisations</h1>
        </div>

        <div class="flex justify-center items-center min-h-screen my-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
                <?php if ($message): ?>
                    <div class="message mb-4 text-red-600">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="" class="mb-4">
                    <div class="flex items-center">
                        <input type="date" name="date_search" value="<?php echo htmlspecialchars($date_search); ?>" class="border border-gray-300 rounded-lg p-2 w-full" required />
                        <input type="submit" value="Rechercher" name="search" class="bg-sky-700 text-white rounded-lg py-2 px-4 ml-2 hover:bg-sky-600 transition duration-200" />
                    </div>
                </form>

                <?php if (empty($hospitalisations)): ?>
                    <div class="text-gray-700">Aucune hospitalisation trouvée.</div>
                <?php else: ?>
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 p-2">ID</th>
                                <th class="border border-gray-300 p-2">Patient ID</th>
                                <th class="border border-gray-300 p-2">Date d'entrée</th>
                                <th class="border border-gray-300 p-2">Date de sortie</th>
                                <th class="border border-gray-300 p-2">Motif</th>
                                <th class="border border-gray-300 p-2">Détails du traitement</th>
                                <th class="border border-gray-300 p-2">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hospitalisations as $hosp): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="border border-gray-300 p-2"><?php echo $hosp['id']; ?></td>
                                    <td class="border border-gray-300 p-2"><?php echo $hosp['patient_id']; ?></td>
                                    <td class="border border-gray-300 p-2"><?php echo date('d-m-Y H:i', strtotime($hosp['admission_date'])); ?></td>
                                    <td class="border border-gray-300 p-2"><?php echo $hosp['discharge_date'] ? date('d-m-Y H:i', strtotime($hosp['discharge_date'])) : 'En cours'; ?></td>
                                    <td class="border border-gray-300 p-2"><?php echo $hosp['reason']; ?></td>
                                    <td class="border border-gray-300 p-2"><?php echo $hosp['treatment_details']; ?></td>
                                    <td class="border border-gray-300 p-2"><?php echo $hosp['status']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>

