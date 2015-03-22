
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

$ids=$_POST['ids'];

$query= "SELECT CATEGORIE, ID_FILM, ID_SALLE, DATE_DEBUT_PROJECTION, DATE_FIN_PROJECTION FROM projeter p INNER JOIN films f ON f.ID_FILM = p.ID_FILM INNER JOIN salle s ON s.ID_SALLE = p.ID_SALLE WHERE ID_PROJECTION = '$val'";
    $result = mysql_query($query);

	while($array = mysql_fetch_array($result)){
	$cat[0] = $array['CATEGORIE'];
    $Noms[0] = $array['NOM_SALLE'];
    $Nomf[0] = $array['NOM_FILM'];
    $ddeb[0] = $array['DATE_DEBUT_PROJECTION'];
    $dfin[0] = $array['DATE_FIN_PROJECTION'];

 
 	echo'<script>
alert("Projection supprimée");
document.location.href="planning.php";
</script>';
  ?>
  </body>
  </html>