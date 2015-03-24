<html>
    <head>
        <meta charset="utf-8">
    </head>
</html>
<?php

$sujet = "Demande de partenariat";
//echo $sujet;

$nomhebergement = $_POST["nom_hebergement"];
//echo $nomhebergement;
$telhebergement = $_POST["telephone"];
//echo $telhebergement;
$typehebergement = $_POST["type"];
//echo $typehebergement;
$numrue = $_POST["numero_rue"];
//echo $numrue;
$nomrue = $_POST["nom_rue"];
//echo $nomrue;
$cp = $_POST["CP"];
//echo $cp;
$ville = $_POST["ville"];
//echo $ville;
$nomcontact = $_POST["nom_contact"];
//echo $nomcontact;
$prenomcontact = $_POST["prenom_contact"];
//echo $prenomcontact;
$mailcontact = $_POST["mail_contact"];
//echo $mailcontact;
$telcontact = $_POST["telephone_contact"];
//echo $telcontact;
//echo "<br/>"; 


$sujet = 'Demande de partenariat';
//echo $sujet; //OK fonction jusque la!

$message = "Bonjour,<br/>
Un nouvel hébergement souhaite faire partie de votre réseau de partenaire. <br/><br/>
Voici les informations du contact : <br/>
Nom de l'hébergement : ".$nomhebergement."<br/>
Numéro de telephone de lhebergement : ".$telhebergement."<br/>
Type d'hébergement : ".$typehebergement."<br/>
<br/>
Adresse de l'hébergement<br/>
- Numéro de la rue : ".$numrue."<br/>
- Nom de la rue : ".$nomrue."<br/>
- Code postal : ".$cp."<br/>
- Ville : ".$ville."<br/>
<br/>
Contact de l'hebergement :<br/>
- Nom du contact : ".$nomcontact."<br/>
- Prénom du contact : ".$prenomcontact."<br/>
- Adresse mail du contact : ".$mailcontact."<br/>
- Telephone du contact : ".$telcontact." <br/><br/>
Merci de le recontacter.";
echo $message;

//echo "<br/>";


$destinataire = 'gwen0309@hotmail.fr';

$headers = 'From: '.$nomhebergement.'<"'.$mailcontact.'">'."\n"; 
$headers .= "Reply-To: ".$destinataire."\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";


 //$mail = mail($destinataire,$sujet,$message,$headers);
/*$mail = mail("gwen0309@hotmail.fr","Demande de partenariat","Bonjour,<br/>
Un nouvel hébergement souhaite faire partie de votre réseau de partenaire. <br/><br/>
Voici les informations du contact : <br/>
Nom de l'hébergement : ".$nomhebergement."<br/>
Numéro de telephone de lhebergement : ".$telhebergement."<br/>
Type d'hébergement : ".$typehebergement."<br/>
<br/>
Adresse de l'hébergement<br/>
- Numéro de la rue : ".$numrue."<br/>
- Nom de la rue : ".$nomrue."<br/>
- Code postal : ".$cp."<br/>
- Ville : ".$ville."<br/>
<br/>
Contact de l'hebergement :<br/>
- Nom du contact : ".$nomcontact."<br/>
- Prénom du contact : ".$prenomcontact."<br/>
- Adresse mail du contact : ".$mailcontact."<br/>
- Telephone du contact : ".$telcontact." <br/><br/>
Merci de le recontacter.", 'From: '.$nomhebergement.'<"'.$mailcontact.'">'."\n;Reply-To: ".$destinataire."\n Content-Type: text/html; charset=\"iso-8859-1\"";);*/
$mail = mail('gwen0309@hotmail.fr','Demande de partenariat','Coucou');
echo $mail;

/*if(mail($destinataire,$sujet,$message,$headers))
{
        echo "L'email a bien été envoyé.";
}
else
{
        echo "Une erreur c'est produite lors de l'envois de l'email.";
}*/


?>