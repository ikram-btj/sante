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

// Initialize search term
$search_term = "";
$data = [];

// Handle search form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_term = $_POST['search_term'];
}

// Fetch data from the database
if ($search_term) {
    // Prepare the SQL query with a WHERE clause for filtering
    $stmt = $conn->prepare("SELECT * FROM radiologie WHERE type_rad LIKE ? ORDER BY date_resultat_radio DESC");
    $like_term = "%" . $search_term . "%";
    $stmt->bind_param("s", $like_term);
} else {
    // Fetch all records if no search term is provided
    $stmt = $conn->prepare("SELECT * FROM radiologie ORDER BY date_resultat_radio DESC");
}

$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
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
    <title>Liste des Examens Radiologiques</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center w-full shadow-md">
            <h1 class="text-2xl">Liste des Examens Radiologiques</h1>
        </div>

        <div class="flex justify-center items-center min-h-screen my-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
                <form method="post" action="" class="mb-6">
                    <div class="flex items-center">
                        <input type="text" name="search_term" placeholder="Rechercher par type d'examen" value="<?= htmlspecialchars($search_term) ?>" class="border border-gray-300 rounded-lg p-3 w-full" />
                        <button type="submit" name="search" class="bg-sky-700 text-white rounded-lg py-2 px-4 ml-2 hover:bg-sky-600 transition duration-200">Rechercher</button>
                    </div>
                </form>

                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 border-b">Type d'examen</th>
                            <th class="py-3 px-4 border-b">Partie du corps examinée</th>
                            <th class="py-3 px-4 border-b">Motif de l'examen</th>
                            <th class="py-3 px-4 border-b">Date de résultat</th>
                            <th class="py-3 px-4 border-b">Rapport médical</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($data) > 0): ?>
                            <?php foreach ($data as $exam): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($exam['type_rad']) ?></td>
                                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($exam['partie_corps']) ?></td>
                                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($exam['motif_radio']) ?></td>
                                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($exam['date_resultat_radio']) ?></td>
                                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($exam['commentaires_radio']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="py-3 px-4 border-b text-center text-gray-500">Aucun examen trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

