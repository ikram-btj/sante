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

// Initialize success message variable
$successMessage = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $type_antecedent = $_POST['type_antecedent'];
    $type_maladie = $_POST['type_maladie'];
    $nom_maladie = $_POST['nom_maladie'];
    $date_maladie = $_POST['date_maladie'];
    $remarque_antecedent = $_POST['remarque_antecedent'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO antecedents (type_antecedent, type_maladie, nom_maladie, date_maladie, remarque_antecedent) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    
    $stmt->bind_param('sssss', $type_antecedent, $type_maladie, $nom_maladie, $date_maladie, $remarque_antecedent);
    
    if ($stmt->execute()) {
        // Set success message
        $successMessage = "Données enregistrées avec succès !";
    } else {
        echo "Execute failed: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Medecin</title>
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
    </div>    <!-- Main content -->
    <div class="flex-1 ml-64">
        <!-- Navbar -->
        <div class="bg-sky-700 text-white p-4 flex justify-center fixed w-full shadow-md">
            <h1 class="text-2xl">Welcome</h1>
        </div>

        <!-- Centered Form Section -->
        <section class="flex items-center justify-center min-h-screen py-20">
            <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg mx-auto">
                <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Antécédents</h2>

        <?php if (!empty($successMessage)): ?>
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
                <form class="space-y-6" method="post" action="">
                    <!-- Type antecedent -->
                    <div class="element-radio">
                        <label class="block text-sm font-medium text-gray-700">Type antecedent<span class="text-red-600">*</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="type_antecedent" value="Personnel" required class="mr-2">
                                <span>Personnel</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_antecedent" value="Familiaux" required class="mr-2">
                                <span>Familiaux</span>
                            </label>
                        </div>
                    </div>

                    <!-- Type maladie -->
                    <div class="element-radio">
                        <label class="block text-sm font-medium text-gray-700">Type maladie</label>
                        <select name="type_maladie" class="w-full p-2 border border-gray-300 rounded mt-1">
                            <option value="">Type maladie</option>
                            <option value="Chronique">Chronique</option>
                            <option value="Hereditaire">Héréditaire</option>
                            <option value="Allergie">Allergie</option>
                        </select>
                    </div>

                    <!-- Nom maladie -->
                    <div class="element-input">
                        <input class="w-full p-2 border border-gray-300 rounded" type="text" name="nom_maladie" placeholder="Nom maladie">
                    </div>

                    <!-- Date maladie -->
                    <div class="element-date">
                        <input class="w-full p-2 border border-gray-300 rounded" type="date" name="date_maladie">
                    </div>

                    <!-- Remarque -->
                    <div class="element-textarea">
                        <textarea class="w-full p-2 border border-gray-300 rounded" name="remarque_antecedent" rows="4" placeholder="Remarque"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="submit">
                        <input type="submit" value="Envoyer" name="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-500 transition">
                    </div>
                </form>
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

