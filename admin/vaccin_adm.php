<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Formulaire d'ajout de vaccin</title>
    <style type="text/css">
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        #wrapper {
            max-width: 450px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        legend {
            color: #0481b1;
            font-size: 18px;
            padding: 10px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }

        fieldset {
            border: none;
            padding-right: 25px;
        }

        input[type="text"],
        input[type="date"],
        input[type="submit"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
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
            transition: background 0.3s;
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
        }

        button:hover {
            background: #e0e0e0;
        }

        .small {
            font-size: 12px;
            color: #999;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <form method="post" action="vaccin_adm2.php">
            <fieldset>
                <legend>Ajouter un vaccin</legend>
                <div>
                    <input type="text" id="nom_vaccin" name="nom_vaccin" placeholder="Type de vaccin" required />
                </div>
                <div>
                    <input type="text" id="nb_injection" name="nb_injection" placeholder="Nombre d'injections" required />
                </div>
                <div>
                    <input type="date" id="date_1_injection" name="date_1_injection" required />
                </div>
                <input type="submit" name="submit" value="Ajouter" />
                <button type="button" onclick="window.location.href='admin_dashboard.php'">Retour au tableau de bord</button>
            </fieldset>    
        </form>
    </div>
</body>
</html>

