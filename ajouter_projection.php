
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
 


$queryfilm= "SELECT DUREE, CATEGORIE FROM films WHERE ID_FILM = '$film'";
$resultfilm = mysql_query($queryfilm);

 
 while($row = mysql_fetch_array($resultfilm)){
$duree[0] = $row['DUREE'];
$cat[0] = $row['CATEGORIE'];

}

/*-----Traitement date------*/
$tabDate = explode('/' , $datej);
$date_conv  = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
 
$heure=$_POST['heure'];
$min=$_POST['min'];
$datej= $date_conv." ".$heure.":".$min.":00";

$date =  strtotime($datej);
$datej = date('Y-m-d H:i:s', $date);

echo $heureproj = date('H:i:s',$date);
echo $jourproj = date('Y-m-d', $date);

//30 minutes de présentation 
$date2 = strtotime("+30 minutes", $date);
//durée du film
$date = strtotime("+$duree[0] minutes", $date2);
$datefin = date('Y-m-d H:i:s', $date);

/*-----Fin traitement date------*/

$z=0;
$querytest= "SELECT TIME(DATE_DEBUT_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter WHERE ID_SALLE like '$salle'";
 $resulttest = mysql_query($querytest);

 while($array2 = mysql_fetch_array($resulttest)){
echo $heuretest[$z] = $array2['TIME(DATE_DEBUT_PROJECTION)'];
echo $jourtest[$z] = $array2['DATE(DATE_DEBUT_PROJECTION)'];
echo "</br>";
$z++;
}

$r=0;
for($a=0;$a<$z;$a++)
{
	if( $jourproj==$jourtest[$a]){		
		if( $heureproj>= "08:00:00" && $heureproj<= "12:59:00")
		{		
			if( $heuretest[$a]>= "08:00:00" && $heuretest[$a]<= "12:59:00")
			{
			$r++;
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

if($r==0){
	$queryproj= "INSERT INTO projeter (ID_FILM, ID_SALLE, DATE_DEBUT_PROJECTION, DATE_FIN_PROJECTION) VALUES ($film,$salle,'".$datej."','".$datefin."')";
				$insertion = mysql_query($queryproj);
}
else{
	echo "pas bon";
}
 


  ?>
  </body>
  </html>