
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
echo $jury=$_POST['jury'];
$j=0;
$resultjury = mysql_query("SELECT ID_INDIVIDU FROM jury WHERE N__JURY = '$jury'");
while($array2 = mysql_fetch_array($resultjury)){
echo $jure[$j] = $array2['ID_INDIVIDU'];
$j++; 
}


for($i=0;$i<$j;$i++){
	$queryproj= "INSERT INTO juger (ID_FILM, ID_INDIVIDU) VALUES ($film,$jure[$i])";
	$insertion = mysql_query($queryproj);
}
	echo'<script>
alert("Jury ajouté");
document.location.href="ajout_projection.php";
</script>';

  ?>
  </body>
  </html>