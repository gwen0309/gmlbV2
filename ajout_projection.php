<!DOCTYPE html>
<html lang="fr"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="calendrier.js"></script>
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
<meta charset="utf-8">	       
<title> Saisi Projection</title>	
</head>  

<body>

<header>

</header>

<?php 
$host = "localhost";  
$user = "root";
$bdd = "filrouge";
$password  = "";

mysql_connect($host, $user,$password) or die("erreur de connexion au serveur");
mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
  
$querydate= "select NOM_FILM, TIME(DATE_DEBUT_PROJECTION), TIME(DATE_FIN_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter p INNER JOIN films f WHERE f.ID_FILM = p.ID_FILM ORDER BY NOM_FILM";
$result = mysql_query($querydate);

if($result === FALSE) { 
    die(mysql_error()); 
}

$queryfilms = "SELECT ID_FILM FROM films";
$querysalle = "SELECT ID_SALLE FROM salle";

$resultfilms = mysql_query($queryfilms);
$resultsalles = mysql_query($querysalle);

$p = 0;
$z=0;

while($array = mysql_fetch_array($resultfilms)){
$Nomf[$p] = $array['ID_FILM'];
$p++;
}

while($array2 = mysql_fetch_array($resultsalles)){
$Salle[$z] = $array2['ID_SALLE'];
$z++;
}

echo "<form method='post' action='planning.php'>
<select name='film' required >";
for($o =0; $o< $p ;$o++){
         echo "<option value='$Nomf[$o]'>$Nomf[$o]</option>";
    }	
echo "</select><select name='salle' required >";
for($e =0; $e< $z ;$e++){
         echo "<option value='$Salle[$e]'>$Salle[$e]</option>";
    }	
echo "</select>
		<table class='ds_box' cellpadding='0' cellspacing='0' id='ds_conclass' style='display: none;'>
			<tr>
				<td id='ds_calclass'></td>
			</tr>
		</table>

		<input type='text' name='datejour' onclick='ds_sh(this);' />
<select name='heure' required >";
for($h =8; $h< 23 ;$h++){
         echo "<option value=$h>$h</option>";
    }	
echo "</select>
<select name='min' required >";
for($min =1; $min<= 60 ;$min++){
         echo "<option value=$min>$min</option>";
    }	
echo "</select>
<input type='submit' value='Ajouter la projection'>
</form>";

?>
</body>
</html>