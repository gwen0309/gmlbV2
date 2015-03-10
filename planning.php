
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
  
$querydate= "select NOM_FILM, TIME(DATE_DEBUT_PROJECTION), TIME(DATE_FIN_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter p INNER JOIN films f WHERE f.ID_FILM = p.ID_FILM ORDER BY NOM_FILM";

$result = mysql_query($querydate);

if($insertion === FALSE ) { 
    die(mysql_error()); 
}


$i = 0;
$compteur=0;

while($row = mysql_fetch_array($result)){
	foreach($row as $key => $value)

$Nom[$i] = $row['NOM_FILM'];
$DateDeb[$i] = $row['TIME(DATE_DEBUT_PROJECTION)'];
$DateFin[$i] = $row['TIME(DATE_FIN_PROJECTION)'];
$jourDebut[$i] = $row['DATE(DATE_DEBUT_PROJECTION)'];
$i++;

}

echo
 "<tr>
    <td>Heures</td>
	<td>Salle</td>
    <td>J-1 06/05/15</td>
	<td>J-2 07/05/15</td>
	<td>J-3 08/05/15</td>
	<td>J-4 09/05/15</td>
	<td>J-5 10/05/15</td>
  </tr>";

//Projection matin dans 3 les salles
echo"<tr>  <td></td>
	<td>Salle 1</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
	if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"&& $DateDeb[$j]<= "12:59:00"){
					echo  "<td id='film".$compteur."'>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
					$compteur++;
				}
			}
			
		}
	}else{
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-".$jour){ 
				
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}

echo "</tr>
	<tr>  <td>Projection Matin</td>
	<td>Salle 2</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
		if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}else{
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-".$jour){ 
				
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}
echo "</tr>
<tr>  <td></td>
<td>Salle 3</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
		if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}else{
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-".$jour){ 
				
				if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}
echo "</tr>";
//Fin projection matin


//Projection AM dans 3 les salles
echo"<tr>  <td></td>
<td>Salle 1</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
		if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				
				if($DateDeb[$j]>= "13:00:00" && $DateDeb[$j]<= "16:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($jour>=10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=='2015-05-'.$jour){ 
			
				if($DateDeb[$j]>= "13:00:00" && $DateDeb[$j]<= "16:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}

echo "</tr>
	<tr>  <td>Projection Après-midi</td>
	<td>Salle 2</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
		if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				
				if($DateDeb[$j]>= "13:00:00" && $DateDeb[$j]<= "16:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}else{
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-".$jour){ 
				
				if($DateDeb[$j]>= "13:00:00" && $DateDeb[$j]<= "16:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}
echo "</tr>
<tr>  <td></td>
<td>Salle 3</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
	if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
		
				if($DateDeb[$j]>= "13:00:00" && $DateDeb[$j]<= "16:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}else{
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=='2015-05-'.$jour){ 
			
				if($DateDeb[$j]>= "13:00:00" && $DateDeb[$j]<= "16:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j] </td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}

echo "</tr>";
//Fin projection AM

//Projection soir dans 3 les salles
echo"<tr>  <td></td>
<td>Salle 1</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
		if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				
				if($DateDeb[$j]>= "17:00:00" && $DateDeb[$j]<= "20:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($jour>=10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=='2015-05-'.$jour){ 
			
				if($DateDeb[$j]>= "17:00:00" && $DateDeb[$j]<= "20:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}

echo "</tr>
	<tr>  <td>Projection Soir</td>
	<td>Salle 2</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
		if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
				
				if($DateDeb[$j]>= "17:00:00" && $DateDeb[$j]<= "20:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}else{
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-".$jour){ 
				
				if($DateDeb[$j]>= "17:00:00" && $DateDeb[$j]<= "20:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}
echo "</tr>
<tr>  <td></td>
<td>Salle 3</td>";
for($jour=6;$jour<11;$jour++){
	$c=0;
	if($jour<10){
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=="2015-05-0".$jour){ 
		
				if($DateDeb[$j]>= "17:00:00" && $DateDeb[$j]<= "20:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j]</td>"; 
					$c++;
				}
			}
			
		}
	}else{
		for( $j=0;$j<$i;$j++){
			if($jourDebut[$j]=='2015-05-'.$jour){ 
			
				if($DateDeb[$j]>= "17:00:00" && $DateDeb[$j]<= "20:59:00"){
					echo  "<td>$Nom[$j]<br>$DateDeb[$j] - $DateFin[$j] </td>"; 
					$c++;
				}
			}
			
		}
	}
	if($c==0)
	{
		echo "<td></td>";
	}
}

echo "</tr></table>";
//Fin projection Soir

?>

<form action='ajout_projection.php' > 
<input type='submit' value='Ajouter une projection'>
</form>

</body>
</html>