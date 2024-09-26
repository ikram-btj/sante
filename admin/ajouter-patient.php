<?php
// Include the database connection file
include 'bdd.php';

// Fetch all doctors to populate the dropdown
$sql_medecins = "SELECT id_m, nom_m FROM medecin";
$result_medecins = mysqli_query($conn, $sql_medecins);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $date_n = mysqli_real_escape_string($conn, $_POST['date_n']);
    $lieu_n = mysqli_real_escape_string($conn, $_POST['lieu_n']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $ville = mysqli_real_escape_string($conn, $_POST['ville']);
    $adresse = mysqli_real_escape_string($conn, $_POST['adresse']);
    $groupage = mysqli_real_escape_string($conn, $_POST['groupage']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    
    // Ensure medecin_f is a valid integer (id of the selected doctor)
    $medecin_f = isset($_POST['medecin_f']) && ctype_digit($_POST['medecin_f']) ? intval($_POST['medecin_f']) : 'NULL';

    $prenom_pere = mysqli_real_escape_string($conn, $_POST['prenom_pere']);
    $groupage_pere = mysqli_real_escape_string($conn, $_POST['groupage_pere']);
    $nom_mere = mysqli_real_escape_string($conn, $_POST['nom_mere']);
    $prenom_mere = mysqli_real_escape_string($conn, $_POST['prenom_mere']);
    $groupage_mere = mysqli_real_escape_string($conn, $_POST['groupage_mere']);
    $login_p = mysqli_real_escape_string($conn, $_POST['login_p']);
    $password_p = mysqli_real_escape_string($conn, $_POST['password_p']); // No hashing, storing in plain text

    // Insert the data into the database
    $sql = "INSERT INTO patient (nom, prenom, date_n, lieu_n, sex, ville, adresse, groupage, tel, medecin_f, prenom_pere, groupage_pere, nom_mere, prenom_mere, groupage_mere, login_p, password_p)
            VALUES ('$nom', '$prenom', '$date_n', '$lieu_n', '$sex', '$ville', '$adresse', '$groupage', '$tel', $medecin_f, '$prenom_pere', '$groupage_pere', '$nom_mere', '$prenom_mere', '$groupage_mere', '$login_p', '$password_p')";

    if ($conn->query($sql) === TRUE) {
        echo "Patient added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
<!-- HTML form part remains unchanged --><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        #wrapper {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        fieldset {
            border: none;
            margin: 0;
            padding: 0;
        }
        legend {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .radio-group {
            display: flex;
            align-items: center;
        }
        .radio-group label {
            margin-right: 20px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <form method="post" action="ajouter-patient.php">
            <fieldset>
                <legend>Ajouter un patient</legend>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
                </div>
<div class="form-group">
    <label for="date_n">Date de naissance</label>
    <input type="date" id="date_n" name="date_n" required>
</div>
                <div class="form-group">
                    <label for="lieu_n">Lieu de naissance</label>
                    <select id="lieu_n" name="lieu_n" required>
                        <option value="" disabled selected>Choisissez votre ville</option>
                        <option value="Adrar">adrar</option>
  <option value="Chlef">Chlef</option>
  <option value="Laghouat">Laghouat</option>
  <option value="Oum El Bouaghi">Oum El Bouaghi</option>
  <option value="Batna">Batna</option>
  <option value="Béjaia">Béjaia</option>
  <option value="Biskra">Biskra</option>
  <option value="Béchar">Béchar</option>
  <option value="Blida">Blida</option>
  <option value="Bouira">Bouira</option>
  <option value="Tamanrasset">Tamanrasset</option>
  <option value="Tébessa">Tébessa</option>
  <option value="Tlemcen">Tlemcen</option>
  <option value="Tiaret">Tiaret</option>
  <option value="Tizi Ouzou">Tizi Ouzou</option>
  <option value="Alger">Alger</option>
  <option value="Djelfa">Djelfa</option>
  <option value="Djijel">Djijel</option>
  <option value="Sétif">Sétif</option>
  <option value="Saida">saida</option>
  <option value="Skikda">skikda</option>
  <option value="Sidi Bel Abbes">sidi bel abbes</option>
  <option value="Annaba">Annaba</option>
  <option value="Guelma">Guelma</option>
  <option value="Constantine">Constantine</option>
  <option value="Médéa">Médéa</option>
  <option value="Mostaganem">Mostaganem</option>
  <option value="M'Sila">M'sila</option>
  <option value="Mascara">Mascara</option>
  <option value="Ouargla">Ouargla</option>
  <option value="Oran">Oran</option>
  <option value="El Bayadh">El Bayadh</option>
  <option value="Illizi">Illizi</option>
  <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
  <option value="Boumerdes">Boumerdes</option>
  <option value="El Tarf">El Tarf</option>
  <option value="Tindouf">Tindouf</option>
  <option value="Tissemssilt">Tissemssilt</option>
  <option value="El Oued">El Oued</option>
  <option value="Khenchela">Khenchela</option>
  <option value="Souk Ahras">Souk ahras</option>
  <option value="Tipaza">Tipaza</option>
  <option value="Mila">Mila</option>
  <option value="Ain Defla">Ain defla</option>
  <option value="Naama">Naama</option>
  <option value="Ain Temouchent">Ain temouchent</option>
  <option value="Ghardaia">Ghardaia</option>
  <option value="Relizane">Relizane</option>
                    </select>
                </div>

                <div class="form-group radio-group">
                    <label for="sex">Sexe:</label>
                    <label>
                        <input type="radio" name="sex" value="Femme" checked> Femme
                    </label>
                    <label>
                        <input type="radio" name="sex" value="Homme"> Homme
                    </label>
                </div>

                <div class="form-group">
                    <label for="ville">Ville actuelle</label>
                    <select id="ville" name="ville" required>
                        <option value="Adrar">adrar</option>
  <option value="Chlef">Chlef</option>
  <option value="Laghouat">Laghouat</option>
  <option value="Oum El Bouaghi">Oum El Bouaghi</option>
  <option value="Batna">Batna</option>
  <option value="Béjaia">Béjaia</option>
  <option value="Biskra">Biskra</option>
  <option value="Béchar">Béchar</option>
  <option value="Blida">Blida</option>
  <option value="Bouira">Bouira</option>
  <option value="Tamanrasset">Tamanrasset</option>
  <option value="Tébessa">Tébessa</option>
  <option value="Tlemcen">Tlemcen</option>
  <option value="Tiaret">Tiaret</option>
  <option value="Tizi Ouzou">Tizi Ouzou</option>
  <option value="Alger">Alger</option>
  <option value="Djelfa">Djelfa</option>
  <option value="Djijel">Djijel</option>
  <option value="Sétif">Sétif</option>
  <option value="Saida">saida</option>
  <option value="Skikda">skikda</option>
  <option value="Sidi Bel Abbes">sidi bel abbes</option>
  <option value="Annaba">Annaba</option>
  <option value="Guelma">Guelma</option>
  <option value="Constantine">Constantine</option>
  <option value="Médéa">Médéa</option>
  <option value="Mostaganem">Mostaganem</option>
  <option value="M'Sila">M'sila</option>
  <option value="Mascara">Mascara</option>
  <option value="Ouargla">Ouargla</option>
  <option value="Oran">Oran</option>
  <option value="El Bayadh">El Bayadh</option>
  <option value="Illizi">Illizi</option>
  <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
  <option value="Boumerdes">Boumerdes</option>
  <option value="El Tarf">El Tarf</option>
  <option value="Tindouf">Tindouf</option>
  <option value="Tissemssilt">Tissemssilt</option>
  <option value="El Oued">El Oued</option>
  <option value="Khenchela">Khenchela</option>
  <option value="Souk Ahras">Souk ahras</option>
  <option value="Tipaza">Tipaza</option>
  <option value="Mila">Mila</option>
  <option value="Ain Defla">Ain defla</option>
  <option value="Naama">Naama</option>
  <option value="Ain Temouchent">Ain temouchent</option>
  <option value="Ghardaia">Ghardaia</option>
  <option value="Relizane">Relizane</option>                    </select>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" placeholder="Adresse" required>
                </div>

                <div class="form-group">
                    <label for="groupage">Groupe Sanguin</label>
                    <input type="text" id="groupage" name="groupage" placeholder="Groupe Sanguin" required>
                </div>

                <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="text" id="tel" name="tel" placeholder="Téléphone (10 chiffres)" pattern="[0-9]{10}" required>
                </div>

   <div class="form-group">
                    <label for="medecin_f">Médecin de famille</label>
                    <select name="medecin_f" id="medecin_f" required>
                        <option value="" disabled selected>Choisissez un médecin</option>
                        <?php while ($row = mysqli_fetch_assoc($result_medecins)): ?>
                            <option value="<?php echo $row['id_m']; ?>"><?php echo $row['nom_m']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <hr>

                <h3>Informations sur les parents</h3>

                <div class="form-group">
                    <label for="prenom_pere">Prénom du père</label>
                    <input type="text" id="prenom_pere" name="prenom_pere" placeholder="Prénom du père" required>
                </div>

                <div class="form-group">
                    <label for="groupage_pere">Groupe sanguin du père</label>
                    <input type="text" id="groupage_pere" name="groupage_pere" placeholder="Groupe sanguin du père" required>
                </div>

                <div class="form-group">
                    <label for="nom_mere">Nom de la mère</label>
                    <input type="text" id="nom_mere" name="nom_mere" placeholder="Nom de la mère" required>
                </div>

                <div class="form-group">
                    <label for="prenom_mere">Prénom de la mère</label>
                    <input type="text" id="prenom_mere" name="prenom_mere" placeholder="Prénom de la mère" required>
                </div>

                <div class="form-group">
                    <label for="groupage_mere">Groupe sanguin de la mère</label>
                    <input type="text" id="groupage_mere" name="groupage_mere" placeholder="Groupe sanguin de la mère" required>
                </div>

                <hr>

                <h3>Informations de connexion</h3>

                <div class="form-group">
                    <label for="login_p">Nom d'utilisateur</label>
                    <input type="text" id="login_p" name="login_p" placeholder="Nom d'utilisateur" required>
                </div>

                <div class="form-group">
                    <label for="password_p">Mot de passe</label>
                    <input type="password" id="password_p" name="password_p" placeholder="Mot de passe" required>
                </div>

                <input type="submit" name="submit" value="Ajouter">
            </fieldset>
        </form>
    </div>
</body>
</html>

