<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="general.css" media="all">
        <link rel="stylesheet" type="text/css" href="menuvertical.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles.css" media="all"> <!-- Qui sera a supprimer-->
        <title> Lister Hébergement</title>	
    </head>  

    <body>
        <?php include("entete.php");?>
        <?php include("menuappli.php");?>

        <div>
            <ul class="menu-vertical">
                <li class="mv-item"><a href="caracteristique.php">Ajouter</a></li>
                <li class="mv-item"><a href="#">Modifier</a></li>
                <li class="mv-item"><a href="lister_hebergement.php">Lister</a></li>
                <li class="mv-item"><a href="#">test4</a></li>
            </ul>
        </div>

        <div id="caracteristics">
            <?php
            $host = "localhost";  
            $user = "root";
            $bdd = "filrouge";
            $password  = "";
            //Récupération de la variable
            $ID=$_GET['ID_H'];
            // Connexion au serveur
            $con = mysqli_connect($host, $user, $password);
            mysqli_select_db($con, $bdd) or die("erreur lors de la selection de la bd");
            // Creation et envoi de la requete
            $query = "SELECT NUMERO_RUE_HEBERGEMENT, RUE_HEBERGEMENT, CODE_POSTAL_HEBERGEMENT, VILLE_HEBERGEMENT FROM HEBERGEMENT WHERE ID_HEBERGEMENT LIKE '".$ID."'";
            //Test de la requète
            ?>
            <table id="liste_adresse">
                            <tr>
                    <th>Numéro de rue </th>
                    <th>Nom de rue </th>
                    <th>Code postal</th>
                    <th>Ville</th>
                    </tr>
            <?php
            if ($result=mysqli_query($con,$query))
              {
              while ($row=mysqli_fetch_row($result))
                {
                            $Num_rue = $row[0]; 
                            $Nom_rue = $row[1];
                            $cp = $row[2];
                            $Ville = $row[3];
                            echo "
                            <tr>
                            <td>$Num_rue</td>
                            <td><a>$Nom_rue</a></td>
                            <td><a>$cp</a></td>
                            <td><a>$Ville</a></td>
                            </tr>
                            ";
                }
                    mysqli_free_result($result);
              }
            else
                    {
                            printf("Erreur lors de l'execution de la requète");
                    }
            // Free result set
            mysqli_close($con);
            ?> 
            </table>
        </div>
    </body>
</html>