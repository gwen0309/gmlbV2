<!DOCTYPE html>
<html lang="fr">  
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/general.css" media="all">
    </head>
	
	<body>
<?php
session_start();
session_destroy();
header('location:index.php');
exit;
?>
	</body>

</html>