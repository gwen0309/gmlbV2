<!DOCTYPE html>

<?php
session_start();

// Déclaration des paramètres de connexion
$host = "localhost";  
$user = "root";
$bdd = "filrouge";
$password  = "";

// Connexion au serveur
$con = mysqli_connect($host, $user, $password);
mysqli_select_db($con, $bdd) or die("erreur lors de la selection de la bd");

?>
<html lang="fr">  
    <head>
            <link rel="stylesheet" type="text/css" href="general.css" media="all"> <!-- A modifier par menuhorizontal.css-->
            <link rel="stylesheet" type="text/css" href="menuhorizontal.css" media="all">

    </head>
    <body>
	<?php 
	if ($_SESSION['login'] != null)
		include("entete_deconnexion.php");
	else
		include("entete.php");
	
	
	if ($_SESSION['login'] == 'admin')
		include ("menuadmin.php");
	else if ($_SESSION['login'] == 'hebergement')
		include ("menuhebergement.php");
	else
		include ("menuprojection.php");
	?>
        
    </body>
</html>