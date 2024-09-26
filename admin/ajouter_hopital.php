<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ajouter un hôpital et un vaccin</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        #wrapper {
            max-width: 450px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        legend {
            color: #0481b1;
            font-size: 22px;
            padding: 10px;
            text-align: center;
            text-transform: uppercase;
            font-weight: 500;
            margin-bottom: 20px;
        }
        fieldset {
            border: none;
            padding: 0;
            width: 100%;
        }
        label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="date"]:focus,
        textarea:focus,
        select:focus {
            border-color: #0481b1;
            outline: none;
            box-shadow: 0 0 5px rgba(4, 129, 177, 0.5);
        }
        input[type="submit"] {
            background: #0481b1;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            transition: background 0.3s;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background: #0370a1;
        }
        button {
            background: #f0f0f0;
            color: #333;
            border: 1px solid #cccccc;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }
        button:hover {
            background: #e0e0e0;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <form method="post" action="">
            <fieldset>
                <legend>Ajouter un hôpital</legend>
                <input type="text" id="nom_h" name="nom_h" placeholder="Nom d'hôpital" required />
                
                <label for="wilaya_h">Wilaya d'hôpital:</label>
                <select name="wilaya_h" required>
                    <option value="" selected disabled>Choisissez votre ville</option> 
                    <option value="Adrar">Adrar</option>
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
                    <option value="Saida">Saida</option>
                    <option value="Skikda">Skikda</option>
                    <option value="Sidi Bel Abbes">Sidi Bel Abbes</option>
                    <option value="Annaba">Annaba</option>
                    <option value="Guelma">Guelma</option>
                    <option value="Constantine">Constantine</option>
                    <option value="Médéa">Médéa</option>
                    <option value="Mostaganem">Mostaganem</option>
                    <option value="M'Sila">M'Sila</option>
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
                    <option value="Souk Ahras">Souk Ahras</option>
                    <option value="Tipaza">Tipaza</option>
                    <option value="Mila">Mila</option>
                    <option value="Ain Defla">Ain Defla</option>
                    <option value="Naama">Naama</option>
                    <option value="Ain Temouchent">Ain Temouchent</option>
                    <option value="Ghardaia">Ghardaia</option>
                    <option value="Relizane">Relizane</option>
                </select>
                
                <label for="region_h">Région d'hôpital:</label>
                <textarea id="region_h" name="region_h" placeholder="Région d'hôpital" required></textarea>
                
                <input type="submit" name="submit" value="Ajouter" />
                <button type="button" onclick="window.location.href='admin_dashboard.php'">Retour au tableau de bord</button>
            </fieldset>
        </form>
    </div>

   <?php 
// Include the database connection file
include 'bdd.php';

if (isset($_POST['nom_h']) && isset($_POST['wilaya_h']) && isset($_POST['region_h'])) {
    $nom_h = $_POST['nom_h'];
    $wilaya_h = $_POST['wilaya_h'];
    $region_h = $_POST['region_h'];

    // SQL query to insert the data
    $sql = "INSERT INTO hopital (nom_h, wilaya_h, region_h) VALUES ('$nom_h', '$wilaya_h', '$region_h')";
    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green;">Votre hôpital a été ajouté.</p>';
    } else {
        echo '<p style="color: red;">Erreur: ' . $sql . '<br>' . $conn->error . '</p>';
    }

    $conn->close(); // Close the connection
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<p style="color: red;">Attention, un champ est vide !</p>';
}
?>
</body>
</html>

