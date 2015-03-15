
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
  <link rel="stylesheet" href="styles.css" type="text/css" />	

</head>

<body>
  
	  <table width="800" border="1">

  <?php 
  
 /*--------A modifier chaque année-------*/
$anneeD=15;
$moisD=05;
$jourD=13;
$jourDS="jeudi";
$duree=15;
/*-----------------Fin--------------------*/
  
$host = "localhost";  
$user = "root";
$bdd = "filrouge";
$password  = "";

mysql_connect($host, $user,$password) or die("erreur de connexion au serveur");
mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");


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


for($jour=0;$jour<$duree;$jour++){//nombre de jours de festival
	$jourP=$jour+$jourD;

	if($jourP<10){
			echo "<tr><td>Projection matin du 20$anneeD-$moisD-$jourP</td>";
			for($h=0;$h<$b;$h++){	
				$compt=0;
				for( $j=0;$j<$i;$j++){
					
					if($jourDebut[$j]=="20".$anneeD."-0".$moisD."-0".$jourP){ 
						
						if( $Nomsp[$j]==$Noms[$h]){
							
							if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"){
								$compt++;
								echo  "<td id='film".$compteur."'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
											}
				
						}
						
					}
				}
				if($compt==0){
					echo "<td></td>";
					}	
			}
		
	echo "</tr>";
	}else{
		echo "<tr><td>Projection matin du 20$anneeD-$moisD-$jourP</td>";
	for($h=0;$h<$b;$h++){	
		$compt=0;
		for( $j=0;$j<$i;$j++){
			
			if($jourDebut[$j]=="20".$anneeD."-0".$moisD."-".$jourP){ 
				
				if( $Nomsp[$j]==$Noms[$h]){
					
					if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"){
						$compt++;
						echo  "<td id='film".$compteur."'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
									}
		
				}
				
			}
		}
		if($compt==0){
			echo "<td></td>";
			}	
	}
	}
	echo "</tr><tr>";
	if($jourP<10){
	echo "<tr><td>Projection AM du 20$anneeD-$moisD-$jourP</td>";
	for($h=0;$h<$b;$h++){	
		$compt=0;
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="20".$anneeD."-0".$moisD."-0".$jourP){ 
				if( $Nomsp[$j]==$Noms[$h]){
					if($DateDeb[$j]>= "16:00:00" && $DateDeb[$j]<= "23:59:00"){
						$compt++;
						echo  "<td id='film".$compteur."'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
									}
		
				}
			}
		}
		if($compt==0){
		echo "<td></td>";
		}
	}
	echo "</tr>";
	}
	else{
	echo "<tr><td>Projection AM du 20$anneeD-$moisD-$jourP</td>";
		for($h=0;$h<$b;$h++){	
		$compt=0;
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="20".$anneeD."-0".$moisD."-".$jourP){ 
				if( $Nomsp[$j]==$Noms[$h]){
					if($DateDeb[$j]>= "16:00:00" && $DateDeb[$j]<= "23:59:00"){
						$compt++;
						echo  "<td id='film".$compteur."'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
									}
		
				}
			}
		}
		if($compt==0){
		echo "<td></td>";
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