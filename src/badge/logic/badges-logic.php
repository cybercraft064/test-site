<?php
session_start();

include('../shared/bd-manager.php');
// récupération sous forme de tableau de la table -> badges
$rowBadge = getBadge();
$nb_badges = count($rowBadge);

// init des Variables de contexte
$currentBadge = "";
$titleBadge = "";
$nextBadge = "";
$kmNextBadge = "";

$currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);
$currentKm = (int) ($_SESSION['validated-km-bd']);

// Boucle manipulation des badges 
$b = 0;
while ($b < $nb_badges) { 

    $_SESSION['$b au dernier tour'] = $b;
    $_SESSION['nb-Badge'] = $nb_badges;

    // badge courrant
    if ($currentKm >= $rowBadge[$b]['km_badge']) {
        $currentBadge = $b;
        $titleBadge = $rowBadge[$b]['title_badge'];

        // km badge suivant
        if ($currentBadge == $nb_badges -1) {                 
            $kmNextBadge = ( $rowBadge[$b]['km_badge'] - $currentKm );          
        } else {
            $kmNextBadge = ( $rowBadge[$b +1]['km_badge'] - $currentKm );
        }
    }

    // badge suivant
    if ($currentBadge == $nb_badges){
        $nextBadge = $currentBadge;
    } else {
        $nextBadge = $currentBadge +1;
    }

$b++;
            $_SESSION['b'] = $b; 
}

// calcule de la progress bar
$widthProgressBar = "";



