<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

// Include database connection
include 'bdd.php'; // Ensure this path is correct

// Establish the database connection
$conn = getDBConnection(); // Get the connection

// Initialize variables for filtering
$type_antecedent = isset($_GET['type_antecedent']) ? $_GET['type_antecedent'] : '';
$type_maladie = isset($_GET['type_maladie']) ? $_GET['type_maladie'] : '';
$nom_maladie = isset($_GET['nom_maladie']) ? $_GET['nom_maladie'] : '';

// Build the query with filters
$query = "SELECT * FROM antecedents WHERE 1=1";

if (!empty($type_antecedent)) {
    $query .= " AND type_antecedent LIKE '%" . $conn->real_escape_string($type_antecedent) . "%'";
}

if (!empty($type_maladie)) {
    $query .= " AND type_maladie LIKE '%" . $conn->real_escape_string($type_maladie) . "%'";
}

if (!empty($nom_maladie)) {
    $query .= " AND nom_maladie LIKE '%" . $conn->real_escape_string($nom_maladie) . "%'";
}

// Fetch antecedent data
$antecedents = [];
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $antecedents[] = $row;
    }
    $result->free();
} else {
    echo "Query failed: " . htmlspecialchars($conn->error);
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Antécédents</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
 <style>
        /* Custom scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Make the sidebar scrollable */
        .sidebar-scroll {
            max-height: calc(100vh - 2rem);
            overflow-y: auto;
        }
    </style>

</head>
<body class="bg-gray-100 flex h-screen">
      <!-- Sidebar -->
    <div class="w-64 bg-sky-900 text-white flex flex-col p-4 fixed h-full">
        <h2 class="text-2xl font-bold mb-6">Doctor Dashboard</h2>
        <nav class="space-y-4 sidebar-scroll">
            <a href="aff_patient.php" class="block px-4 py-2 rounded hover:bg-blue-700">Mes Patients</a>

            <!-- Antecedents Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="antecedents">Antecedents</button>
                <div id="antecedents" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_antecedent.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_antecedent.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <!-- Vaccinations Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="vaccinations">Vaccinations</button>
                <div id="vaccinations" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_vaccination.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_vaccination.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <!-- Mode de Vie Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="mode-de-vie">Mode de Vie</button>
                <div id="mode-de-vie" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_mode_de_vie.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_mode_de_vie.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <!-- Consultation Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="consultation">Consultation</button>
                <div id="consultation" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_consultation.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_consultation.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <!-- Analyse Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="analyse">Analyse</button>
                <div id="analyse" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_analyse.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_analyse.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <!-- Radiologie Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="radiologie">Radiologie</button>
                <div id="radiologie" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_radiologie.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_radiologie.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <!-- Hospitalisation Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="hospitalisation">Hospitalisation</button>
                <div id="hospitalisation" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_hospitalisation.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_hospitalisation.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <!-- Intervention Dropdown -->
            <div class="relative">
                <button class="dropdown-toggle block w-full px-4 py-2 text-left rounded hover:bg-blue-700" data-dropdown="intervention">Intervention</button>
                <div id="intervention" class="dropdown-menu hidden absolute bg-white text-black rounded shadow-md w-full mt-1 z-10">
                    <a href="ajouter_intervention.php" class="block px-4 py-2 hover:bg-gray-200">Ajouter</a>
                    <a href="lister_intervention.php" class="block px-4 py-2 hover:bg-gray-200">Lister</a>
                </div>
            </div>

            <a href="logout.php" class="block px-4 py-2 rounded bg-red-600 hover:bg-red-500">Logout</a>
        </nav>
    </div>  
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center fixed w-full shadow-md">
            <h1 class="text-2xl">Affichage des Antécédents</h1>
        </div>

        <section class="flex items-center justify-center min-h-screen py-20">
            <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Liste des Antécédents</h2>

                <!-- Search Form -->
                <form method="GET" class="mb-6 flex justify-center gap-4">
                    <input type="text" name="type_antecedent" value="<?php echo htmlspecialchars($type_antecedent); ?>" placeholder="Type Antécédent" class="p-2 border rounded">
                    <input type="text" name="type_maladie" value="<?php echo htmlspecialchars($type_maladie); ?>" placeholder="Type Maladie" class="p-2 border rounded">
                    <input type="text" name="nom_maladie" value="<?php echo htmlspecialchars($nom_maladie); ?>" placeholder="Nom Maladie" class="p-2 border rounded">
                    <button type="submit" class="bg-blue-600 text-white p-2 rounded">Rechercher</button>
                </form>

                <?php if (empty($antecedents)): ?>
                    <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                        Aucun antécédent trouvé.
                    </div>
                <?php else: ?>
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4 border">Type Antécédent</th>
                                <th class="py-2 px-4 border">Type Maladie</th>
                                <th class="py-2 px-4 border">Nom Maladie</th>
                                <th class="py-2 px-4 border">Date Maladie</th>
                                <th class="py-2 px-4 border">Remarque</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($antecedents as $antecedent): ?>
                                <tr>
                                    <td class="py-2 px-4 border"><?php echo htmlspecialchars($antecedent['type_antecedent']); ?></td>
                                    <td class="py-2 px-4 border"><?php echo htmlspecialchars($antecedent['type_maladie']); ?></td>
                                    <td class="py-2 px-4 border"><?php echo htmlspecialchars($antecedent['nom_maladie']); ?></td>
                                    <td class="py-2 px-4 border"><?php echo htmlspecialchars($antecedent['date_maladie']); ?></td>
                                    <td class="py-2 px-4 border"><?php echo htmlspecialchars($antecedent['remarque_antecedent']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>
    </div>

   <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            const dropdownMenus = document.querySelectorAll('.dropdown-menu');

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const dropdownId = this.getAttribute('data-dropdown');
                    const dropdown = document.getElementById(dropdownId);

                    dropdownMenus.forEach(menu => {
                        if (menu.id !== dropdownId) {
                            menu.classList.add('hidden');
                        }
                    });

                    dropdown.classList.toggle('hidden');
                });
            });

            document.addEventListener('click', function() {
                dropdownMenus.forEach(menu => {
                    menu.classList.add('hidden');
                });
            });
        });
    </script>
</body>
</html>

