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

// Initialize an array to hold interventions
$interventions = [];

// Handle search functionality
$search_date = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_date = $_POST['search_date'];

    // Prepare the SQL query with search filter
    $stmt = $conn->prepare("SELECT * FROM intervention WHERE date_intr = ?");
    $stmt->bind_param('s', $search_date);
} else {
    // Prepare the SQL query without filter
    $stmt = $conn->prepare("SELECT * FROM intervention");
}

$stmt->execute();
$result = $stmt->get_result();

// Fetch all interventions into the array
while ($row = $result->fetch_assoc()) {
    $interventions[] = $row;
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
    <title>Liste des Interventions</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center w-full shadow-md">
            <h1 class="text-2xl">Liste des Interventions</h1>
        </div>

        <div class="flex justify-center items-center min-h-screen my-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full mx-12">
                <form method="post" action="" class="mb-6">
                    <div class="flex mb-4">
                        <input class="border border-gray-300 rounded-lg p-3 w-full" type="date" name="search_date" value="<?php echo htmlspecialchars($search_date); ?>" required/>
                        <input class="bg-sky-700 text-white rounded-lg  px-4 ml-2 hover:bg-sky-600 transition duration-200" type="submit" value="Rechercher" name="search"/>
                    </div>
                </form>

                <!-- Table to display interventions -->
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-sky-700 text-white">
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Organe(s) Concerné(s)</th>
                            <th class="py-2 px-4 border-b">Motif</th>
                            <th class="py-2 px-4 border-b">Type d'Anesthésie</th>
                            <th class="py-2 px-4 border-b">Rapport Médical</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($interventions)): ?>
                            <tr>
                                <td colspan="5" class="py-2 px-4 text-center">Aucune intervention trouvée.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($interventions as $intervention): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($intervention['date_intr']); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($intervention['partie_corps']); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($intervention['motif_intr']); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($intervention['typ_anst']); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($intervention['commentaire_intr']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

