<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

// Include the database connection
include 'bdd.php';
$conn = getDBConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $date_cons = $_POST['date_cons'];
    $medicament = $_POST['medicament'];
    $commentaire_cons1 = $_POST['commentaire_cons1'];

    // Insert data into the consultation table
    $sql = "INSERT INTO consultation (date_cons, medicament, commentaire_cons1) VALUES (?, ?, ?)";
    
    // Prepare the statement to avoid SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $date_cons, $medicament, $commentaire_cons1);

    if ($stmt->execute()) {
        $successMessage = "Consultation record added successfully!";
    } else {
        $successMessage = "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Include the sidebar
include 'sidebar.php'; // Adjust this path according to your project structure
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Consultation</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center fixed w-full shadow-md">
            <h1 class="text-2xl">Consultation</h1>
        </div>

        <div class="flex justify-center items-center h-screen">
            <div class="bg-white p-6 mt-14 rounded-lg shadow-lg w-full max-w-lg">
                <!-- Display success message -->
                <?php if (!empty($successMessage)): ?>
                    <div class="p-2 mb-4 text-green-600 bg-green-100 border border-green-300 rounded">
                        <?php echo $successMessage; ?>
                    </div>
                <?php endif; ?>

                <form method="post" class="space-y-4">
                    <h2 class="text-xl font-semibold mb-4">Ajouter Consultation</h2>

                    <div class="mb-3">
                        <label for="date_cons" class="block text-gray-700 font-semibold mb-1">Date de Consultation</label>
                        <input id="date_cons" type="date" name="date_cons" required 
                               class="w-full p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                    </div>
                    
                    <div class="mb-3">
                        <label for="medicament" class="block text-gray-700 font-semibold mb-1">Médicament</label>
                        <textarea id="medicament" name="medicament" rows="3" required 
                                  class="w-full p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                  placeholder="Medicaments"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="commentaire_cons1" class="block text-gray-700 font-semibold mb-1">Commentaire</label>
                        <textarea id="commentaire_cons1" name="commentaire_cons1" rows="3" required 
                                  class="w-full p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                  placeholder="Commentaire"></textarea>
                    </div>
                    
                    <div>
                        <button type="submit" name="submit" 
                                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

