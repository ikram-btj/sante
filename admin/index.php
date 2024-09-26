<?php
session_start();

// Adjust the path as necessary
$bddPath = __DIR__ . '/../connexion/control/bdd.php';

if (!file_exists($bddPath)) {
    die("Cannot find database connection file. Please check the path: " . $bddPath);
}

require_once $bddPath;

// Check if $bdd is set and is a PDO object
if (!isset($bdd) || !($bdd instanceof PDO)) {
    die("Database connection failed. Please check your configuration.");
}

if(isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    try {
        $req = $bdd->prepare("SELECT * FROM admin WHERE login = :login AND password = :password");
        $req->execute(['login' => $login, 'password' => $password]);
        $admin = $req->fetch();
        
        if($admin) {
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: admin_dashboard.php');
            exit();
        } else {
            $error = "Invalid login credentials";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="vid-container">
        <div class="inner-container">
            <div class="box">
                <h1>Admin Login</h1>
                <form method="post" action="">
                    <input type="text" name="login" placeholder="Username" required/>
                    <input type="password" name="password" placeholder="Password" required/>
                    <button type="submit">Login</button>
                </form>
                <?php if(isset($error)): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>
