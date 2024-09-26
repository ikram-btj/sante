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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Collect form data
    $type_analyse = $_POST['type_analyse'];
    $nom_analyse = $_POST['nom_analyse'];
    $date_resultat_analyse = date('Y-m-d', strtotime($_POST['date_resultat_analyse'])); // Convert date format to YYYY-MM-DD
    $image_path = null; // Initialize image_path to null

    // Check for duplicate entries
    $stmt = $conn->prepare("SELECT COUNT(*) FROM analyse WHERE type_analyse = ? AND nom_analyse = ? AND date_resultat_analyse = ?");
    $stmt->bind_param("sss", $type_analyse, $nom_analyse, $date_resultat_analyse);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $message = "Cette analyse existe déjà.";
    } else {
        // Handle file upload
        if ($_FILES['image_analyse']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            
            // Check if the upload directory exists, if not, create it
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0755, true)) {
                    $message = "Échec de la création du répertoire: $uploadDir";
                }
            }

            $uploadFile = $uploadDir . basename($_FILES['image_analyse']['name']);
            if (move_uploaded_file($_FILES['image_analyse']['tmp_name'], $uploadFile)) {
                $image_path = $uploadFile;
            } else {
                $message = "Erreur lors du déplacement du fichier téléchargé. Code d'erreur: " . $_FILES['image_analyse']['error'];
            }
        } else {
            $message = "Erreur lors du téléchargement du fichier. Code d'erreur: " . $_FILES['image_analyse']['error'];
        }

        // Prepare and execute SQL query to insert data
        if ($image_path !== null) {
            $stmt = $conn->prepare("INSERT INTO analyse (type_analyse, nom_analyse, date_resultat_analyse, image_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $type_analyse, $nom_analyse, $date_resultat_analyse, $image_path);
            if ($stmt->execute()) {
                $message = "Données enregistrées avec succès!";
            } else {
                $message = "Erreur: " . $stmt->error;
            }
            $stmt->close();
        }
    }

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
    <title>Ajouter Analyse</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path to your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Main content -->
    <div class="flex-1 ml-64">
        <div class="bg-sky-700 text-white p-4 flex justify-center fixed w-full shadow-md">
            <h1 class="text-2xl">Ajouter Analyse</h1>
        </div>

        <div class="flex justify-center items-center min-h-screen mt-16">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
                <div class="dimo">
                    <form class="space-y-4" method="post" action="" enctype="multipart/form-data">
                        <div class="element-radio">
                            <label class="title">Type analyse<span class="required">*</span></label>        
                            <div class="flex flex-col space-y-2">
                                <label><input type="radio" name="type_analyse" value="Hematologie" required="required"/>
                                <span>Hématologie</span></label>
                                <label><input type="radio" name="type_analyse" value="Examens biochimiques" required="required"/>
                                <span>Examens biochimiques</span></label>
                                <label><input type="radio" name="type_analyse" value="Examens microbiologiques" required="required"/>
                                <span>Examens microbiologiques</span></label>
                            </div>
                        </div>
    
                        <div class="element-input">
                            <label class="title"></label>
                            <div class="item-cont">
                                <input class="border border-gray-300 rounded-lg p-2 w-full" type="text" name="nom_analyse" placeholder="Nom analyse" required/>
                            </div>
                        </div>
    
                        <div class="element-date">
                            <label class="title"></label>
                            <div class="item-cont">
                                <input class="border border-gray-300 rounded-lg p-2 w-full" type="date" name="date_resultat_analyse" placeholder="Date de résultat" required/>
                            </div>
                        </div> 
    
                        <div class="element-input">
                            <label class="title"></label>
                            <div class="item-cont">
                                <input class="border border-gray-300 rounded-lg p-2 w-full" type="file" name="image_analyse" placeholder="Résultat" required/>
                            </div>
                        </div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000000000">
    
                        <div class="submit">
                            <input class="bg-sky-700 text-white rounded-lg py-2 px-4 hover:bg-sky-600" type="submit" value="Envoyer" name="submit">
                        </div>
                    </form>
                </div>

                <!-- Print message at the end of the form -->
                <?php if ($message): ?>
                    <div class="message mt-4 text-green-600" style="margin: 20px;">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>

