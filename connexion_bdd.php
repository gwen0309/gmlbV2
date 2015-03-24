<?php

// Déclaration des paramètres de connexion
$host = "localhost";
$user = "root";
$bdd = "filrouge";
$password  = "";

// Connexion au serveur
$con = mysqli_connect($host, $user, $password);
mysqli_select_db($con, $bdd) or die("erreur lors de la selection de la bd");
?>