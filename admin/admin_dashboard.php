<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafc;
            color: #2c3e50;
        }

        /* Centering the content */
        h1 {
            text-align: center;
            color: #2c3e50;
            margin: 20px 0;
            font-size: 2.5rem;
        }

        nav {
            background-color: #2980b9;
            padding: 15px 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            background-color: #3498db;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #2980b9;
        }

        /* Main content section */
        .content {
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
        }

        .content p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #34495e;
        }

        .content button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .content button:hover {
            background-color: #c0392b;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            nav ul {
                flex-direction: column;
                gap: 15px;
            }

            nav ul li a {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="ajouter_medecin.php">Ajouter un Médecin</a></li>
            <li><a href="ajouter-patient.php">Ajouter un Patient</a></li>
            <li><a href="ajouter_hopital.php">Ajouter un Hôpital</a></li>
            <li><a href="vaccin_adm.php">Gérer les Vaccins</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
    
    <div class="content">
        <p>Bienvenue dans le tableau de bord administrateur. Ici, vous pouvez gérer les médecins, les patients, les hôpitaux et les vaccins avec facilité.</p>
            </div>
</body>
</html>

