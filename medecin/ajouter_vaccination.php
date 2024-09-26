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

// Handle form submission
$message = '';
if (isset($_POST['submit'])) {
    // Retrieve form data
    $nom_vaccin = $_POST['nom_vaccin'];
    $nbr_injection = $_POST['nbr_injection'];
    $date_inj = $_POST['date_inj'];
    $id_p = $_POST['patient_id']; // Get patient ID from the form input

    // Check if patient ID is provided
    if (!empty($id_p)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO vaccin (nom_vaccin, nb_injection, date_1_injection, id_p) 
                VALUES (?, ?, ?, ?)";

        // Prepare and execute the statement
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, 'sisi', $nom_vaccin, $nbr_injection, $date_inj, $id_p);
            if (mysqli_stmt_execute($stmt)) {
                $message = "Data inserted successfully!";
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            $message = "Error preparing the statement: " . mysqli_error($conn);
        }
    } else {
        $message = "Error: Patient ID is required.";
    }
}

// Close the connection only if it's valid
if ($conn) {
    mysqli_close($conn);
}
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

            <!-- Start Form -->
            <form method="post" class="bg-white p-6 rounded shadow-md w-2/3">
                <h2 class="text-xl text-center font-bold mb-4">Injection</h2>
                <div class="mb-4">
                    <input class="border p-2 w-full" type="text" name="nom_vaccin" placeholder="Nom vaccin" required>
                </div>
                <div class="mb-4">
                    <input class="border p-2 w-full" type="text" name="nbr_injection" placeholder="Nombre d'injection" required>
                </div>
                <div class="mb-4">
                    <input class="border p-2 w-full" type="text" name="num_injection" placeholder="Numéro d'injection" required>
                </div>
                <div class="mb-4">
                    <input class="border p-2 w-full" type="date" name="date_inj" placeholder="Date d'injection" required>
                </div>
                <div class="mb-4">
                    <input class="border p-2 w-full" type="date" name="date_rappel" placeholder="Date de rappel" required>
                </div>
              
    <input type="number" class="border p-2 w-full"  placeholder="ID du Patient"  name="patient_id" required>
  <div class="mb-4"><br>
                    <input type="submit"name="submit" value="Envoyer" class="bg-sky-700 text-white p-2 rounded">
                </div>
                <?php if ($message): ?>
                    <p class="text-green-500"><?php echo $message; ?></p>
                <?php endif; ?>
            </form>
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

