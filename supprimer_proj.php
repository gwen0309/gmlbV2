
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
$query=("DELETE FROM projeter WHERE ID_PROJECTION = '$ids'");
 $result = mysql_query($query);
 
 	echo'<script>
alert("Projection supprimée");
document.location.href="planning.php";
</script>';
  ?>
  </body>
  </html>