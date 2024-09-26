<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

$error_message = '';
$success_message = '';

// Include the database connection file
include 'bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Collect and sanitize input data
        $nom_m = $conn->real_escape_string($_POST['nom_m']);
        $sex_m = $conn->real_escape_string($_POST['sex_m']);
        $adresse_m = $conn->real_escape_string($_POST['adresse_m']);
        $telephone_m = $conn->real_escape_string($_POST['telephone_m']);
        $specialite = $conn->real_escape_string($_POST['specialite']);
        $mail = $conn->real_escape_string($_POST['mail']);
        $login_m = $conn->real_escape_string($_POST['login_m']);
        $password_m = $conn->real_escape_string($_POST['password_m']); // No hashing, storing plain text

        // Check if all fields are filled
        if (empty($nom_m) || empty($sex_m) || empty($adresse_m) || empty($telephone_m) || 
            empty($specialite) || empty($mail) || empty($login_m) || empty($password_m)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        // Check if login already exists
        $check_login = $conn->query("SELECT * FROM medecin WHERE login_m = '$login_m'");
        if ($check_login->num_rows > 0) {
            throw new Exception("Ce nom d'utilisateur existe déjà.");
        }

        // Insert new doctor
        $sql = "INSERT INTO medecin (nom_m, sex_m, adresse_m, telephone_m, specialite, mail, login_m, password_m) 
                VALUES ('$nom_m', '$sex_m', '$adresse_m', '$telephone_m', '$specialite', '$mail', '$login_m', '$password_m')";
        
        if ($conn->query($sql) === TRUE) {
            $success_message = "Le médecin a été ajouté avec succès.";
        } else {
            throw new Exception("Erreur lors de l'ajout du médecin: " . $conn->error);
        }

    } catch (Exception $e) {
        $error_message = $e->getMessage();
    } finally {
        if (isset($conn) && $conn instanceof mysqli) {
            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Médecin</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
        }
        #wrapper {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: none;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        /* Error and Success Messages */
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }
        /* Form Layout */
        .radio-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <h1>Ajouter un Médecin</h1>
        <?php
        if (!empty($error_message)) {
            echo "<p class='error-message'>Erreur: $error_message</p>";
        }
        if (!empty($success_message)) {
            echo "<p class='success-message'>$success_message</p>";
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label for="nom_m">Nom:</label>
                <input type="text" id="nom_m" name="nom_m" required>
            </div>
            <div class="radio-group">
                <label>Sexe:</label>
                <input type="radio" id="femme" name="sex_m" value="Femme" required>
                <label for="femme">Femme</label>
                <input type="radio" id="homme" name="sex_m" value="Homme" required>
                <label for="homme">Homme</label>
            </div>
            <div>
                <label for="adresse_m">Adresse:</label>
                <input type="text" id="adresse_m" name="adresse_m" required>
            </div>
            <div>
                <label for="telephone_m">Téléphone:</label>
                <input type="tel" id="telephone_m" name="telephone_m" required>
            </div>
            <div>
                <label for="specialite">Spécialité:</label>
                <input type="text" id="specialite" name="specialite" required>
            </div>
            <div>
                <label for="mail">Email:</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            <div>
                <label for="login_m">Nom d'utilisateur:</label>
                <input type="text" id="login_m" name="login_m" required>
            </div>
            <div>
                <label for="password_m">Mot de passe:</label>
                <input type="password" id="password_m" name="password_m" required>
            </div>
            <div>
                <input type="submit" value="Ajouter le médecin">
            </div>
        </form>
        <p><a href="admin_dashboard.php">Retour au tableau de bord</a></p>
    </div>
</body>
</html>

