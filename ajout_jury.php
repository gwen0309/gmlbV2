<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="general.css" media="all">
        <link rel="stylesheet" type="text/css" href="menuvertical.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles.css" media="all"> <!-- Qui sera a supprimer-->         	
        <script type="text/javascript" src="scripts/calendrier.js"></script>
		<script type="text/javascript" src="scripts/ProjectionJS.js"></script>

         <title> Saisi Projection</title>	
    </head>  

    <body>

            <?php include("entete.php");?>
            <?php include("menuappli.php");?>

    <?php 
    $host = "localhost";  
    $user = "root";
    $bdd = "filrouge";
    $password  = "";

    mysql_connect($host, $user,$password) or die("erreur de connexion au serveur");
    mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
	
	  $queryfilms = "SELECT NOM_FILM, N__JURY FROM films f INNER JOIN juger j ON j.ID_FILM=f.ID_FILM INNER JOIN jury jj ON jj.ID_INDIVIDU=j.ID_INDIVIDU ";
	
	while($array = mysql_fetch_array($resultfilms)){
    $idf[$p] = $array['ID_FILM'];
    $Nomf[$p] = $array['NOM_FILM'];
    $Dureef[$p] = $array['DUREE'];
    $Catf[$p] = $array['CATEGORIE'];

    $p++;
    }