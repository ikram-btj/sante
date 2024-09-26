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

// Fetch data from the mode_de_vie table
$sql = "SELECT * FROM mode_de_vie";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Store fetched data in an array
$modeDeVieData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $modeDeVieData[] = $row;
}

// Include the sidebar
include 'sidebar.php'; // Adjust this path according to your project structure
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Modes de Vie</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center w-full shadow-md">
            <h1 class="text-2xl">Liste des Modes de Vie</h1>
        </div>

        <div class="flex justify-center items-center mt-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Patient ID</th>
                            <th class="border px-4 py-2">Tabac</th>
                            <th class="border px-4 py-2">Âge de début</th>
                            <th class="border px-4 py-2">Cigarettes par jour</th>
                            <th class="border px-4 py-2">Arrêt</th>
                            <th class="border px-4 py-2">Nombre d'arrêts</th>
                            <th class="border px-4 py-2">Fréquence alcool</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($modeDeVieData as $data): ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo $data['id']; ?></td>
                                <td class="border px-4 py-2"><?php echo $data['patient_id']; ?></td>
                                <td class="border px-4 py-2"><?php echo $data['tabac']; ?></td>
                                <td class="border px-4 py-2"><?php echo $data['age_comance_fum']; ?></td>
                                <td class="border px-4 py-2"><?php echo $data['nbr_cigr']; ?></td>
                                <td class="border px-4 py-2"><?php echo $data['arreter']; ?></td>
                                <td class="border px-4 py-2"><?php echo $data['fois_arreter']; ?></td>
                                <td class="border px-4 py-2"><?php echo $data['frq_alco']; ?></td>
                                <td class="border px-4 py-2">
                                    <button class="text-blue-500 hover:underline" onclick="openModal(<?php echo $data['id']; ?>)">Modifier</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal for updating data -->
        <div id="updateModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Modifier Mode de Vie</h2>
                <form id="updateForm" method="post">
                    <input type="hidden" name="id" id="modalId" />
                    <div>
                        <label class="block text-sm font-medium">Fumez-vous?<span class="text-red-500">*</span></label>
                        <div class="flex items-center mt-2">
                            <label class="mr-4"><input type="radio" name="tabac" value="Oui" required class="mr-1"/>Oui</label>
                            <label><input type="radio" name="tabac" value="Non" required class="mr-1"/>Non</label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Âge de début de la consommation de tabac</label>
                        <input type="number" name="age_comance_fum" id="modalAge" placeholder="Age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Nombre de cigarettes par jour</label>
                        <input type="text" name="nbr_cigr" id="modalNbrCigr" placeholder="Nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
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
                        <input type="number" name="fois_arreter" id="modalFoisArreter" placeholder="Nombre de fois" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Fréquence de consommation d'alcool</label>
                        <input type="text" name="frq_alco" id="modalFrqAlco" placeholder="Fréquence" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                    </div>
                    <div>
                        <input type="submit" value="Mettre à jour" class="w-full bg-blue-600 text-white font-semibold rounded-lg p-2 hover:bg-blue-700 cursor-pointer"/>
                        <button type="button" onclick="closeModal()" class="w-full mt-2 bg-red-600 text-white font-semibold rounded-lg p-2 hover:bg-red-700 cursor-pointer">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('updateModal').classList.remove('hidden');
            document.getElementById('modalId').value = id;
            // Load data into modal (you'll need to adjust this to fetch the existing data for the given ID)
            // For demo, assuming you already have data in JS (in real case, fetch data using AJAX or set in PHP)
            document.getElementById('modalAge').value = ''; // Populate this with actual data
            document.getElementById('modalNbrCigr').value = ''; // Populate this with actual data
            document.getElementById('modalFoisArreter').value = ''; // Populate this with actual data
            document.getElementById('modalFrqAlco').value = ''; // Populate this with actual data
        }

        function closeModal() {
            document.getElementById('updateModal').classList.add('hidden');
        }
    </script>
</body>
</html>

