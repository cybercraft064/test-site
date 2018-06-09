<?php
    session_start();
    include("../../shared/bd-manager.php");

    // Variables de contexte
    $pseudo_user = $_SESSION['pseudo-user'];

    // Test si s'est un nouvelle utilisateur
    if (isset($_SESSION['new-user']) & $_SESSION['validated-klm-bd'] == 0 ) {

        // nouvelle utilisateur 
        if (isset($_GET['lang']) & !empty($_GET['lang']) ) {
            $_SESSION['current-code-language'] = htmlspecialchars($_GET['lang']); 
    
            // mise à jour du choix langage en bd
            updateLang($_SESSION['id-user'], $_SESSION['current-code-language']);
            
            // Direction le tableau de bord niveau
            header("Location: ../../dashboard/dashboard-level.php?level=1&lesson=0"); 


    } else {

        echo "<h1> HO HO !! </h1>";

    } //


    } //


