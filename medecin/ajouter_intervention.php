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

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $date_intr = $_POST['date_intr'];
    $partie_corps = $_POST['partie_corps'];
    $motif_intr = $_POST['motif_intr'];
    $typ_anst = $_POST['typ_anst'];
    $commentaire_intr = $_POST['commentaire_intr'];

    // SQL query to insert data into the intervention table
    $sql = "INSERT INTO intervention (date_intr, partie_corps, motif_intr, typ_anst, commentaire_intr) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $date_intr, $partie_corps, $motif_intr, $typ_anst, $commentaire_intr);

    if ($stmt->execute()) {
        $message = "Intervention successfully added!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Include the sidebar
include 'sidebar.php'; // Adjust this path according to your project structure
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Intervention</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center w-full shadow-md">
            <h1 class="text-2xl">Ajouter Intervention</h1>
        </div>

        <div class="flex justify-center items-center min-h-screen my-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
                <?php if ($message): ?>
                    <div class="message mb-4 text-green-600">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form class="formoid-solid-green" method="post" action="">
                    <div class="title mb-6 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Intervention</h2>
                    </div>

                    <div class="element-date mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="date_intr">Date</label>
                        <input class="border border-gray-300 rounded-lg p-3 w-full" type="date" name="date_intr" placeholder="Date" required/>
                    </div>

                    <div class="element-input mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="partie_corps">Organe(s) concerné(s)</label>
                        <input class="border border-gray-300 rounded-lg p-3 w-full" type="text" name="partie_corps" placeholder="L'organe(s) concerné(s)" required/>
                    </div>

                    <div class="element-input mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="motif_intr">Motif</label>
                        <input class="border border-gray-300 rounded-lg p-3 w-full" type="text" name="motif_intr" placeholder="Motif" required/>
                    </div>

                    <div class="element-radio mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Type d'anesthésie <span class="required">*</span></label>
                        <div class="flex items-center">
                            <label class="mr-4">
                                <input type="radio" name="typ_anst" value="Locale" required/>
                                <span>Locale</span>
                            </label>
                            <label>
                                <input type="radio" name="typ_anst" value="Generale" required/>
                                <span>Générale</span>
                            </label>
                        </div>
                    </div>

                    <div class="element-textarea mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="commentaire_intr">Rapport médical</label>
                        <textarea class="border border-gray-300 rounded-lg p-3 w-full" name="commentaire_intr" cols="20" rows="5" placeholder="Rapport médical"></textarea>
                    </div>

                    <div class="submit">
                        <input class="bg-sky-700 text-white rounded-lg py-2 px-4 w-full hover:bg-sky-600 transition duration-200" type="submit" value="Envoyer" name="submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

