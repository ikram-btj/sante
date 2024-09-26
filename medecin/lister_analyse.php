<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

// Include the database connection
include 'bdd.php';
$conn = getDBConnection();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the analyse table
$sql = "SELECT id, type_analyse, nom_analyse, date_resultat_analyse, image_path FROM analyse";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Store fetched data in an array
$analyses = [];
while ($row = mysqli_fetch_assoc($result)) {
    $analyses[] = $row;
}

// Close the connection
mysqli_close($conn);
include 'sidebar.php'; // Adjust this path according to your project structure

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Analyses</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center w-full shadow-md">
            <h1 class="text-2xl">Liste des Analyses</h1>
        </div>

        <div class="flex justify-center items-start h-screen"> <!-- Adjusted to align items at the top -->
            <div class="bg-white p-6 my-12 rounded-lg shadow-lg w-full max-w-2xl">
                <h2 class="text-2xl font-bold text-center text-green-600 mb-4">Analyses Disponibles</h2>
                
                <!-- Search input -->
                <div class="mb-2">
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher par nom d'analyse..." class="w-full p-2 border border-gray-300 rounded">
                </div>

                <table class="min-w-full bg-white border border-gray-300 shadow-md">
                    <thead>
                        <tr class="bg-gray-300 text-white">
                            <th class="py-1 px-4 border-b">Type Analyse</th> <!-- Reduced padding -->
                            <th class="py-1 px-4 border-b">Nom Analyse</th> <!-- Reduced padding -->
                            <th class="py-1 px-4 border-b">Date Résultat</th> <!-- Reduced padding -->
                            <th class="py-1 px-4 border-b">Voir Résultat</th> <!-- Reduced padding -->
                        </tr>
                    </thead>
                    <tbody id="analysisTableBody">
                        <?php foreach ($analyses as $analyse): ?>
                            <tr class='hover:bg-gray-100 transition-colors'>
                                <td class='py-1 px-4 border-b'><?php echo htmlspecialchars($analyse['type_analyse']); ?></td>
                                <td class='py-1 px-4 border-b'><?php echo htmlspecialchars($analyse['nom_analyse']); ?></td>
                                <td class='py-1 px-4 border-b'><?php echo htmlspecialchars($analyse['date_resultat_analyse']); ?></td>
                                <td class='py-1 px-4 border-b'>
                                    <button onclick="openModal('<?php echo htmlspecialchars($analyse['image_path']); ?>')" class="text-blue-500">Voir</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Analyse Resultat" class="w-full h-auto">
        </div>
    </div>

    <script>
        // Open modal and set the image source
        function openModal(imagePath) {
            document.getElementById('modalImage').src = imagePath;
            document.getElementById('myModal').style.display = "block";
        }

        // Close modal
        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        // Close modal when clicking outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                closeModal();
            }
        }

        // Search function
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('analysisTableBody');
            const tr = table.getElementsByTagName('tr');

            for (let i = 0; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[1]; // Column index for 'nom_analyse'
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
                }
            }
        }
    </script>
</body>
</html>

