<?php
session_start();
// appelé par choose-langues.php

// récupération du code langue
if (isset($_GET['langID']) && !empty($_GET['langID']) ) {
    
    
    $selectLang = htmlspecialchars($_GET['langID']);
   
    // envoi vers la logic
    header("location: ../logic/choose-langues-logic.php?newLang=".$selectLang);

} else {
    // retour aux choix car erreur de clique
    header("location: ../choose-langues.php");
}
