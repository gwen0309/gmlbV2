<?php

 /*--------A modifier chaque année-------*/
$anneeD=15;
$moisD=05;
$jourD=13;
$jourDS="jeudi";
$duree=16;

/*-------------Jours du festival--------------*/
$dateD  = $anneeD.'-'.$moisD.'-'.$jourD;
$date =  strtotime($dateD);


for($jj=0;$jj<$duree;$jj++)
{
$date2 = strtotime("+$jj days", $date);
$atamp=date('Y', $date2);
$mtamp=date('m', $date2);
$jtamp=date('d', $date2);
$jourF[$jj] = $atamp.'-'.$mtamp.'-'.$jtamp;
}
$jj--;
$jourp=$jourF[0];
$jourd=$jourF[$jj];

//calcul du dimanche de relache
if($jourDS=="lundi"){
$date3 = strtotime("+6 days", $date);
}
else if ($jourDS=="mardi")
{$date3 = strtotime("+5 days", $date);
}
else if ($jourDS=="mercredi")
{$date3 = strtotime("+11 days", $date);
}
else if ($jourDS=="jeudi")
{$date3 = strtotime("+10 days", $date);
}
else if ($jourDS=="vendredi")
{$date3 = strtotime("+9 days", $date);
}
else if ($jourDS=="samedi")
{$date3 = strtotime("+8 days", $date);
}
else if ($jourDS=="dimanche")
{$date3 = strtotime("+7 days", $date);
}

$atamp=date('Y', $date3);
$mtamp=date('m', $date3);
$jtamp=date('d', $date3);
$DR = $atamp.'-'.$mtamp.'-'.$jtamp;

?>