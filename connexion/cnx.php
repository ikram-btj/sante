<?php

session_start();
include('control/bdd.php');

if(isset($_POST['login_m']) && isset($_POST['password_m']))
{
    $login_m = $_POST['login_m'];
    $password_m = $_POST['password_m'];
    
    $req = $bdd->prepare("SELECT * FROM medecin WHERE login_m = ? AND password_m = ?");
    $req->execute([$login_m, $password_m]);
    $table = $req->fetch();
    
    if($table != false)
    {
        $_SESSION['type'] = 'medecin';
        $_SESSION['login'] = $table['id_m'];
        header('Location: ../medecin/dashboard_medecin.php?id_m=' . $_SESSION['login']);
    }
    else {
        header('Location: index.php?connexion=error');
    }
}
else {
    header('Location: index.php?erreur');
}
?>

