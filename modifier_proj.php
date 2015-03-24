
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajout des projections</title>
</head>

<body>

  <?php 
  
	include("date_festival.php");
	include ("test_ajout_projection.php");
	include("connexion_bdd.php");
	include("entete_deconnexion.php");
	session_start();
	
	$ids=$_POST['ids'];
	$datej=$_POST['datejour'];
	$tr=$_POST['tr'];
	$heure=$_POST['heure'];
	$min=$_POST['min'];

	$query= "SELECT CATEGORIE, DUREE, p.ID_SALLE AS sallep FROM projeter p INNER JOIN films f ON f.ID_FILM = p.ID_FILM INNER JOIN salle s ON s.ID_SALLE = p.ID_SALLE WHERE ID_PROJECTION = '".$ids."'";
    $resultat = mysqli_query($con,$query) or die ("Erreur dans la requête SQL ".mysql_error());

	while($array = mysqli_fetch_array($resultat)){
	$cat = $array['CATEGORIE'];
	$duree = $array['DUREE'];
    $salle = $array['sallep'];
	}
	
	$date_conv= date_eclat($datej);
	$date = date_debut($datej,$heure,$min);
	$heureproj= traitement_heure($date);
	$jourproj= traitement_jour($date);
	$datefin =  date_fin($date,$tr,$duree);
	$datej= date_fest($date);
	
	$test= test_ajout($cat,$salle,$heureproj,$jourproj,$tr); 
	if(	$date_conv< $jourp || $date_conv> $jourd)
{
	$test=99999;
}
 

if($test==900){
	$queryproj= "UPDATE projeter SET DATE_DEBUT_PROJECTION = '".$datej."' , DATE_FIN_PROJECTION = '".$datefin."', ID_SALLE = '".$salle[0]."' WHERE ID_SALLE = '$salle[0]' AND ID_PROJECTION = '$ids'";
	$insertion = mysqli_query($con, $queryproj);

	echo'<script>
alert("Projection modifiée");
document.location.href="planning.php";
</script>';
}else if($test>900&&$test<9000)
	{
		echo'<script>
alert("Créneau non libre");
document.location.href="planning.php";
</script>';
}
else if($test>=9000&&$test<99999)
	{
		echo'<script>
alert("Pas de tapis rouge le matin");
document.location.href="planning.php";
</script>';
}else if($test<900){
	echo'<script>
alert("Salle non appropriée !!");
document.location.href="planning.php";
</script>';
}
else if($test=99999){
	echo'<script>
alert("Date ne correspond pas");
document.location.href="planning.php";
</script>';
}
  ?>
  </body>
  </html>