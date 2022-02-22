<?php
  
    // On calcule le timestamp correspondant Ã  la date entrÃ©e
    $timestamp_naissance = time();
    // On rÃ©cupÃ¨re le numÃ©ro du jour correspondant au timestamp (0, 1, 2, 3...)
    $numero_jour = date('w', $timestamp_naissance);
    
    // On crÃ©e un array pour numÃ©roter les jours (0 => Dimanche, 1 => Lundi...)
    $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    // On rÃ©cupÃ¨re le nom du jour en franÃ§ais grÃ¢ce Ã  l'array qu'on vient de crÃ©er
    $jour_naissance = $jours[$numero_jour];
    
    // Puis on affiche le rÃ©sultat
    //echo '<p>Le '.$jour_naissance.' '.date('d/m/Y').'</p>';
    $timestamp = time();
    // On rÃ©cupÃ¨re le numÃ©ro du jour correspondant au timestamp (0, 1, 2, 3...)
    $numero_jour = date('w', $timestamp);
    $numero_mois = date('F', $timestamp);
    
    // On crÃ©e un array pour numÃ©roter les jours (0 => Dimanche, 1 => Lundi...) et les mois en fonctionde leur nom anglais
    $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $mois = array('January' => "Janvier", 'February' => 'FÃ©vrier', 'March' => 'Mars', 'April' => 'Avril', 'May' => 'Mai', 'June' => "Juin", 'July' => "Juillet", 'August' => "AoÃ»t", 'September' => 'Septembre', 'October' => 'Octobre', 'November' => "Novembre", 'December' => "DÃ©cembre");
    // On rÃ©cupÃ¨re le nom du jour et du mois en franÃ§ais grÃ¢ce aux array(s) qu'on vient de crÃ©er
    $jour = $jours[$numero_jour];
    $moiss = $mois[$numero_mois];

    
    // Puis on affiche le rÃ©sultat
$date = 'Le '.$jour.' '.date('d').' '.$moiss.' '.date('Y');
echo $date;
?>
