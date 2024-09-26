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

// Initialize search date
$searchDate = "";

// Fetch data from the consultation table based on search
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchDate = $_POST['search_date'];
    $sql = "SELECT date_cons, medicament, commentaire_cons1 FROM consultation WHERE date_cons = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchDate);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT date_cons, medicament, commentaire_cons1 FROM consultation";
    $result = mysqli_query($conn, $sql);
}

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Store fetched data in an array
$consultationData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $consultationData[] = $row;
}

// Include the sidebar
include 'sidebar.php'; // Adjust this path according to your project structure
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Consultations</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center  w-full shadow-md">
            <h1 class="text-2xl">Liste des Consultations</h1>
        </div>

        <div class="flex justify-center items-center min-h-screen mt-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">

                <!-- Search Form -->
                <form method="post" class="mb-6">
                    <label class="block mb-2 text-gray-700" for="search_date">Rechercher par Date de Consultation:</label>
                    <input type="date" name="search_date" id="search_date" value="<?php echo htmlspecialchars($searchDate); ?>" class="border border-gray-300 rounded-lg p-2 w-full" required>
                    <button type="submit" name="search" class="mt-4 bg-sky-700 text-white rounded-lg py-2 px-4 hover:bg-sky-600">Rechercher</button>
                </form>

                <table class="min-w-full bg-white border border-gray-300 shadow-md">
                    <thead>
                        <tr class="bg-gray-300 text-white">
                            <th class="py-2 px-4 border-b">Date de Consultation</th>
                            <th class="py-2 px-4 border-b">Médicament</th>
                            <th class="py-2 px-4 border-b">Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consultationData as $data): ?>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($data['date_cons']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($data['medicament']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($data['commentaire_cons1']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>

