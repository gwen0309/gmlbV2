
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajout des projections</title>
</head>

<body>

  <?php 
$host = "localhost";  
$user = "root";
$bdd = "filrouge";
$password  = "";

mysql_connect($host, $user,$password) or die("erreur de connexion au serveur");
mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");


$film=$_POST['film'];
$salle=$_POST['salle'];
$datej=$_POST['datejour'];
$tr=$_POST['tr'];

$j=0;
if(isset($_POST['jury']))
{
	$jury=$_POST['jury'];
	$resultjury = mysql_query("SELECT ID_INDIVIDU FROM jury WHERE N__JURY = '$jury'");
	 while($array2 = mysql_fetch_array($resultjury)){
	 $jure[$j] = $array2['ID_INDIVIDU'];
	 $j++;
	 
	 }
}

$queryfilm= "SELECT DUREE, CATEGORIE FROM films WHERE ID_FILM = '$film'";
$resultfilm = mysql_query($queryfilm);

 
 while($array = mysql_fetch_array($resultfilm)){
$duree[0] = $array['DUREE'];
$cat[0] = $array['CATEGORIE'];

}

/*-----Traitement date------*/
$tabDate = explode('/' , $datej);
$date_conv  = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
 
$heure=$_POST['heure'];
$min=$_POST['min'];
$datej= $date_conv." ".$heure.":".$min.":00";

$date =  strtotime($datej);
$datej = date('Y-m-d H:i:s', $date);

 $heureproj = date('H:i:s',$date);
 $jourproj = date('Y-m-d', $date);

//30 minutes de présentation, 60 si tapis rouge
if($tr=="oui")
{
$date2 = strtotime("+60 minutes", $date);

}
else
{
$date2 = strtotime("+30 minutes", $date);

}
//durée du film
$date = strtotime("+$duree[0] minutes", $date2);
$datefin = date('Y-m-d H:i:s', $date);

/*-----Fin traitement date------*/

/*-------Teste s'il y a des film prevus dans la meme salle---*/
$z=0;
$r=0;
$querytest= "SELECT TIME(DATE_DEBUT_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter WHERE ID_SALLE like '$salle'";
 $resulttest = mysql_query($querytest);

 if($resulttest==true){
 while($array2 = mysql_fetch_array($resulttest)){
$heuretest[$z] = $array2['TIME(DATE_DEBUT_PROJECTION)'];
$jourtest[$z] = $array2['DATE(DATE_DEBUT_PROJECTION)'];
$z++;
}

for($a=0;$a<$z;$a++)
{
	if((($salle=="1" || $salle=="4") && $cat[$a]=="LM")
		||($salle=="2" && ($cat[$a]=="UCR"|| $cat[$a]=="CM"))
		||($salle=="3" &&$cat[$a]=="CM")
		||($salle=="4" &&$cat[$a]=="UCR")){
		if( $jourproj==$jourtest[$a]){		
			if( $heureproj>= "08:00:00" && $heureproj<= "12:59:00")
			{		
				if( $heuretest[$a]>= "08:00:00" && $heuretest[$a]<= "12:59:00")
				{
				if($tr!="oui")
					{
					$r++;
					}
					else{
					$r=9000;
					}
				}

			}
			else if( $heureproj>= "16:00:00" && $heureproj<= "23:59:00")
			{
				if( $heuretest[$a]>= "16:00:00" && $heuretest[$a]<= "23:59:00")
				{
				$r++;
				}
						
			}
		}

	}
	else {
	$r=5000;
	}
}
 }
 /*-----Fin test--------------*/
if($r==0){
	$queryproj= "INSERT INTO projeter (ID_FILM, ID_SALLE, DATE_DEBUT_PROJECTION, DATE_FIN_PROJECTION) VALUES ($film,$salle,'".$datej."','".$datefin."')";
	$insertion = mysql_query($queryproj);
	for($f=0;$f<$j;$f++)
	{
		$insertjury = mysql_query("INSERT INTO juger (ID_INDIVIDU, ID_FILM) values ($jure[$f],$film)");
	}
	echo'<script>
alert("Projection ajoutée");
document.location.href="planning.php";
</script>';
}else if($r>=5000)
	{
		echo'<script>
alert("Salle non appropriée pour le film");
document.location.href="ajout_projection.php";
</script>';
}
else if($r>=9000)
	{
		echo'<script>
alert("Pas de tapis rouge le matin");
document.location.href="ajout_projection.php";
</script>';
}else{
	echo'<script>
alert("Ajout Réussi !!");
document.location.href="ajout_projection.php";
</script>';
}
  ?>
  </body>
  </html>