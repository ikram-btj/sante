
<?php

session_start();
include('control/bdd.php');

if(isset($_POST['login_p'])&& isset($_POST['password_p']))
{

$login_p=$_POST['login_p'];
$password_p=$_POST['password_p'];
//$specialite=$_POST['specialite'];
$req=$bdd->prepare("select * from patient where login_p='$login_p' and password_p='$password_p'");
 //and specialite='$specialite'");
$req->execute();
$table=$req->fetch();
if($table!=false)
{
	
	$_SESSION['type']='patient';
	$_SESSION['login_p']=$table['id_p'];
	
header('location:../patient/acc_patient.php?id_p='.$_SESSION['login_p'].'');

}
else header('location:index.php?connexion=acc_patient');
}
else header('location:index.php?erreur');
?>
