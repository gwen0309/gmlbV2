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
      
    $querydate= "select NOM_FILM, TIME(DATE_DEBUT_PROJECTION), TIME(DATE_FIN_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter p INNER JOIN films f WHERE f.ID_FILM = p.ID_FILM ORDER BY NOM_FILM";
    $result = mysql_query($querydate);

    $queryfilms = "SELECT * FROM films";
    $querysalles = "SELECT * FROM salle ";

	$resultfilms = mysql_query($queryfilms);
    $resultsalles = mysql_query($querysalles);

    $p = 0;
    $z = 0;
	$ju = 0;

    while($array = mysql_fetch_array($resultfilms)){
    $idf[$p] = $array['ID_FILM'];
    $Nomf[$p] = $array['NOM_FILM'];
    $Dureef[$p] = $array['DUREE'];
    $Catf[$p] = $array['CATEGORIE'];

    $p++;
    }

    while($array2 = mysql_fetch_array($resultsalles)){
    $ids[$z] = $array2['ID_SALLE'];
     $Noms[$z] = $array2['NOM_SALLE'];
    $z++;
    }

    ?>

    <div id="caracteristics">
    <div id="general">
	<form action='ajout_jury.php' > 
	<input type='submit' value='Associer un jury à un film'/>

	</form>
	
    <form method='post' action='ajouter_projection.php'>

    <label>Nom du film :</label> 
    <select name='film' required >"
    <?php
    for($o =0; $o< $p ;$o++){
             echo "<option value='$idf[$o]'>$Nomf[$o]</option>";
    }?>
    </select></br>

    <label>Nom de la salle :</label> 
    <select name='salle' required >
    <?php
    for($e =0; $e< $z ;$e++){
             echo "<option value='$ids[$e]'>$Noms[$e] et $ids[$e]</option>";
    }?>
    </select></br>

    <label>Projection avec tapis rouge :</label> 
    <input type= "radio" name="tr" value="oui"/> Oui
    <input type= "radio" checked name="tr" value="non"/> Non</br>

    <label>Jour de projection :</label> 
    <table class='ds_box' cellpadding='0' cellspacing='0' id='ds_conclass' style='display: none;'>
            <tr>
                    <td id='ds_calclass'></td>
            </tr>
    </table>
    <input type='text' name='datejour' onclick='ds_sh(this);' /></br>

    <label>Heure de projection :</label> 
    <select name='heure' required >
    <?php
    for($h =8; $h< 12 ;$h++){
             echo "<option value=$h>$h</option>";
        }
    for($h =16; $h< 22 ;$h++){
             echo "<option value=$h>$h</option>";
        }	
    echo "</select>
    <select name='min' required >";
    for($min =0; $min<= 59 ;$min++){
             echo "<option value=$min>$min</option>";
        }	
    ?></select></br>
	
    <input type='submit' value='Ajouter la projection'>
    </div>
    </div>

    </form>
    </body>
</html>