<!DOCTYPE html>

<?php
session_start();
?>
<html lang="fr">  
    <head>
            <link rel="stylesheet" type="text/css" href="styles.css" media="all"> <!-- A modifier par menuhorizontal.css-->
            <link rel="stylesheet" type="text/css" href="menuhorizontal.css" media="all">

    </head>
    <body>
	<?php 
	if ($_SESSION['login'] != null)
		include("entete_deconnexion.php");?>
        <nav> 
            <ul id="menu">
                <li> <a href="index_hebergement.html">Gestion des hébergements</a></li>
                <li> <a href="#">Gestion des projections</a></li>
            </ul>
        </nav>
    </body>
</html>