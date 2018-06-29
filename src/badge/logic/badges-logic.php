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

$pseudo_user = $_SESSION['pseudo-user'];
$currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);
$currentKm = (int) ($_SESSION['validated-km-bd']);

// Boucle manipulation des badges 
$b = 0;
while ($b < $nb_badges) { 

    // badge courrant
    if ($currentKm >= $rowBadge[$b]['km_badge']) {
        $currentBadge = $b;
        $titleBadge = $rowBadge[$b]['title_badge'];
            // variable progress bar
            $lowBar = $rowBadge[$b]['km_badge'];


        // km badge suivant
        if ($currentBadge == $nb_badges -1) {                 
            $kmNextBadge = ( $rowBadge[$b]['km_badge'] - $currentKm );
                // variable progress bar 
                $highBar = $rowBadge[$b]['km_badge']; 

        } else {
            $kmNextBadge = ( $rowBadge[$b +1]['km_badge'] - $currentKm );
                // variable progress bar
                $highBar = $rowBadge[$b +1]['km_badge'];
        }
    }

    // badge suivant
    if ($currentBadge == $nb_badges){
        $nextBadge = $currentBadge;
    } else {
        $nextBadge = $currentBadge +1;
    }

$b++;
}




