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

// Initialize search variable
$searchNomVaccin = isset($_POST['nom_vaccin']) ? mysqli_real_escape_string($conn, $_POST['nom_vaccin']) : '';

// Fetch data from the vaccin table with optional filtering
$sql = "SELECT * FROM vaccin" . ($searchNomVaccin ? " WHERE nom_vaccin LIKE '%$searchNomVaccin%'" : '');
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
</head>
<body>
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center fixed w-full shadow-md">
            <h1 class="text-2xl">Affichage des Vaccins</h1>
        </div>

        <section class="flex items-center justify-center min-h-screen py-20">
            <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Liste des Vaccins</h2>

                <!-- Search Form -->
                <form method="post" class="mb-4 flex justify-between">
                    <input type="text" name="nom_vaccin" placeholder="Filtre par Nom Vaccin" value="<?php echo htmlspecialchars($searchNomVaccin); ?>" class="border rounded-lg px-4 py-2 w-full"/>
                    <input type="submit" value="Rechercher" class="ml-2 bg-blue-600 text-white font-semibold rounded-lg px-4 py-2 hover:bg-blue-700 cursor-pointer"/>
                </form>

                <table class="min-w-full bg-white border border-gray-300 shadow-md">
                    <thead>
                        <tr class="bg-gray-300 text-white">
                            <th class="py-2 px-4 border-b">ID Vaccin</th>
                            <th class="py-2 px-4 border-b">Nom Vaccin</th>
                            <th class="py-2 px-4 border-b">Nombre d'Injections</th>
                            <th class="py-2 px-4 border-b">Date de la Première Injection</th>
                            <th class="py-2 px-4 border-b">ID Patient</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Display the fetched data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='hover:bg-gray-100 transition-colors'>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['id_vaccin']) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['nom_vaccin']) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['nb_injection']) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['date_1_injection']) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['id_p']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                // Close the connection
                mysqli_close($conn);
                ?>
            </div>
        </section>
    </div>
</body>
</html>

