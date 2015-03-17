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
            // Connexion au serveur
            $con = mysqli_connect($host, $user, $password);
            mysqli_select_db($con, $bdd) or die("erreur lors de la selection de la bd");
            // Creation et envoi de la requete
            $query = "SELECT ID_HEBERGEMENT, NOM_HEBERGEMENT, TEL_HEBERGEMENT, CAPACITE_HEBERGEMENT, NOMBRE_ETOILES FROM HEBERGEMENT ORDER BY ID_HEBERGEMENT";
            //Test de la requète et affichage de la requète
            ?>

            <table id="liste_hebergement">
                            <tr>
                    <th>Nom de l'hébergement</th>
                    <th>Numéro de téléphone</th>
                    <th>Places disponible</th>
                    <th>Nombre d'étoile (*)</th>
                    <th>Services proposés</th>
                    <th>Information Contact</th>
                    <th>Adresse</th>
                    </tr>
            <?php
            if ($result=mysqli_query($con,$query))
              {
              while ($row=mysqli_fetch_row($result))
                {
                            $ID_H = $row[0]; 
                            $Nom_heberg = $row[1];
                            $Tel_heberg = $row[2];
                            $Capa_heberg = $row[3];
                            $etoile_heberg = $row[4];
                            echo "
                            <tr>
                            <td> $Nom_heberg</td>
                            <td>$Tel_heberg</td>
                            <td>$Capa_heberg</td>
                            <td>$etoile_heberg</td> 
                            <td><a href="."afficher_service.php?ID_H=".$ID_H.">Voir</td>	
                            <td><a href="."afficher_contact.php?ID_H=".$ID_H.">Voir</a></td>
                            <td><a href="."afficher_adresse.php?ID_H=".$ID_H.">Voir</a></td>	
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