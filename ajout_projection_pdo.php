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

$con = mysqli_connect($host, $user,$password) or die("erreur de connexion au serveur");
mysqli_select_db($con, $bdd) or die("erreur de connexion a la base de donnees");
  
$querydate= "select NOM_FILM, TIME(DATE_DEBUT_PROJECTION), TIME(DATE_FIN_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter p INNER JOIN films f WHERE f.ID_FILM = p.ID_FILM ORDER BY NOM_FILM";
$result = mysqli_query($con, $querydate);


$queryfilms = "SELECT ID_FILM, NOM_FILM FROM films";
$querysalles = "SELECT ID_SALLE, NOM_SALLE FROM salle ";

$resultfilms = mysqli_query($con, $queryfilms);
$resultsalles = mysqli_query($con, $querysalles);

$p = 0;
$z = 0;

while($array = mysql_fetch_array($resultfilms)){
$idf[$p] = $array['ID_FILM'];
$Nomf[$p] = $array['NOM_FILM'];
$p++;
}

while($array2 = mysql_fetch_array($resultsalles)){
$ids[$z] = $array2['ID_SALLE'];
 $Noms[$z] = $array2['NOM_SALLE'];
$z++;
}

echo "<form method='post' action='planning.php'>
<select name='film' required >";
for($o =0; $o< $p ;$o++){
         echo "<option value='$idf[$o]'>$Nomf[$o]</option>";
    }	
echo "</select><select name='salle' required >";
for($e =0; $e< $z ;$e++){
         echo "<option value='$ids[$e]'>$Noms[$e]</option>";
    }	
echo "</select>
		<table class='ds_box' cellpadding='0' cellspacing='0' id='ds_conclass' style='display: none;'>
			<tr>
				<td id='ds_calclass'></td>
			</tr>
		</table>

		<input type='text' name='datejour' onclick='ds_sh(this);' />
<select name='heure' required >";
for($h =8; $h< 12 ;$h++){
         echo "<option value=$h>$h</option>";
    }	
echo "</select>
<select name='min' required >";
for($min =0; $min<= 59 ;$min++){
         echo "<option value=$min>$min</option>";
    }	
echo "</select>
<input type='submit' value='Ajouter la projection'>
</form>";

?>
</body>
</html>