
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <script src="http://code.jquery.com/jquery-latest.js"></script>
 
  <script>
  $(document).ready(function(){
 
	$('table td').dblclick(function(){
		var cell = $(this).attr('id');
		var aa = document.getElementById(cell).innerHTML;
		alert('Cellule: '+aa);
 
	});
  });
  </script>

</head>

<body>
  
	  <table width="800" border="1">

  <?php 
$host = "localhost";  
$user = "root";
$bdd = "filrouge";
$password  = "";

mysql_connect($host, $user,$password) or die("erreur de connexion au serveur");
mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");

if($_POST['film']!=null){
$film=$_POST['film'];
$salle=$_POST['salle'];
 $datej=$_POST['datejour'];

 $tabDate = explode('/' , $datej);
 $date_conv  = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
 
 $heure=$_POST['heure'];
 $min=$_POST['min'];
 echo $datej= $date_conv." ".$heure.":".$min.":00";

 $date =  strtotime($datej);

echo $datej = date('Y-m-d H:i:s', $date);


 $queryproj= "INSERT INTO projeter (ID_FILM, ID_SALLE, DATE_DEBUT_PROJECTION) VALUES ($film,$salle,'".$datej."')";
  $insertion = mysql_query($queryproj);
}
$querydate= "select NOM_FILM, NOM_SALLE, TIME(DATE_DEBUT_PROJECTION), TIME(DATE_FIN_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter p INNER JOIN films f ON f.ID_FILM = p.ID_FILM  INNER JOIN salle s ON s.ID_SALLE = p.ID_SALLE ORDER BY NOM_FILM";
$result = mysql_query($querydate);

$querysalle= "select NOM_SALLE, ID_SALLE FROM salle";
$resultsalle = mysql_query($querysalle);

$i = 0;
$b =0;
$compteur=0;

while($rowsalle = mysql_fetch_array($resultsalle)){
$ids[$b] = $rowsalle['ID_SALLE'];
$Noms[$b] = $rowsalle['NOM_SALLE'];
$b++;
}

while($row = mysql_fetch_array($result)){
$Nomsp[$i] =	$row['NOM_SALLE'];
$Nomf[$i] = $row['NOM_FILM'];
$DateDeb[$i] = $row['TIME(DATE_DEBUT_PROJECTION)'];
$DateFin[$i] = $row['TIME(DATE_FIN_PROJECTION)'];
$jourDebut[$i] = $row['DATE(DATE_DEBUT_PROJECTION)'];
$i++;
}

echo "<tr>
    <td>Heures</td>";
	for($h=0;$h<$b;$h++){
		echo "<td>Salle $Noms[$h]</td>";
	}
echo "</tr>";
for($jour=6;$jour<21;$jour++){
	if($jour<10){
	echo "<tr><td>Projection matin du 2015-05-0$jour</td>";
	for($h=0;$h<$b;$h++){		
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00" && $Nomsp[$j]==$Noms[$h] ){
					echo  "<td id='film".$compteur."'>$Nomf[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
		
					}
					else{
						echo "<td></td>";
					}
				}
			}
		}
	}	
	else{
	echo "<tr><td>Projection matin du 2015-05-$jour</td>";
	for($h=0;$h<$b;$h++){		
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-".$jour){ 
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"&& $Nomsp[$j]==$Noms[$h]){
					echo  "<td id='film".$compteur."'>$Nomf[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
									}
						else{
						echo "<td></td>";
					}
				}
			}
		}
	}
	echo "</tr><tr>";
	
	if($jour<10){
	echo "<tr><td>Projection AM du 2015-05-0$jour</td>";
	for($h=0;$h<$b;$h++){		
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				if($DateDeb[$j]>= "16:00:00" && $DateDeb[$j]<= "23:59:00"&& $Nomsp[$j]==$Noms[$h]){
					echo  "<td id='film".$compteur."'>$Nomf[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
			
					}
						else{
						echo "<td></td>";
					}
				}
			}
		}
	}	
	else{
	echo "<tr><td>Projection AM du 2015-05-$jour</td>";
	for($h=0;$h<$b;$h++){		
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-".$jour){ 
				if($DateDeb[$j]>= "16:00:00" && $DateDeb[$j]<= "23:59:00"&& $Nomsp[$j]==$Noms[$h]){
					echo  "<td id='film".$compteur."'>$Nomf[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
			
					}
						else{
						echo "<td></td>";
					}
				}
			}
		}
	}
	
echo "</tr>";
}
	echo "</table>"


?>

<form action='ajout_projection.php' > 
<input type='submit' value='Ajouter une projection'>
</form>

</body>
</html>