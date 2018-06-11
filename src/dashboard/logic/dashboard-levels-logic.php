<?php
    session_start();
    //include de dashboard-level.php
    include("../shared/bd-manager.php");

    // variables de travail
    $chevronLeft = "";
    $chevronRight = "";
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);

    //test si il sagit d'un nouvelle utilisateur ou changement de langage
    // cas d'appel par home.php avec comme paramètre ?newLang
    
    // Test si s'est un nouvelle utilisateur
    if (isset($_SESSION['new-user']) && $_SESSION['validated-klm-bd'] == 0 ) {
        

        // choix de la langue
        if (isset($_GET['newLang']) && !empty($_GET['newLang']) ) {
            $_SESSION['current-code-language'] = htmlspecialchars($_GET['newLang']); 
    
            // mise à jour du choix langage en bd
            updateLang( $_SESSION['id-user'], $_SESSION['current-code-language']);

        $_SESSION['dashboard-level-logic-Maj-lang'] = "ok"; // ----------------------------------------------- debug //   

        unset($_SESSION['new-user']);    
        $currentLevel = 1;
        $currentLesson = 0;
        $currentCodeLang = $_SESSION['current-code-language'];
       

    } elseif (!isset($_SESSION['new-user']) ) {  // ----------------------------------------------------------------------------------- //

        // Cas changement de langage en cours de session  
    $_SESSION['dash-level-logic-CAS-changement-Langage-en-cours'] = "ok"; // ----------------------------------------------- debug //  

        // choix du language
        $_SESSION['current-code-language'] = htmlspecialchars($_GET['newLang']); 

        // Test si s'est une reprise ou un nouveau choix
        $checklg = checkLang($_SESSION['id-user'], $_SESSION['current-code-language']);

            if ($checklg) :
                loadCurrentLessons($_SESSION['id-user'], $_SESSION['current-code-language']);


            else :
                updateLang($_SESSION['id-user'], $_SESSION['current-code-language']);

            endif;













    } else {  

    
        // numéro du niveau à afficher
        // fournit par 
        $_SESSION['current-level'] = (int) htmlspecialchars($_GET['level']);
    
        // ($currentLevel) sert aussi à choisir un autre niveau
        // pour révision par exemple
        $currentLevel = $_SESSION['current-level'];
    
        // et pour la redirection vers ces leçons
        $currentLesson = $_SESSION['validated-lesson-bd'];
        $linkLessons = "dashboard-lessons.php?lesson=";
    
        // partie aléatoire
        $linkLevel = "dashboard-levels.php?level=";
        $backgroundLevel = '../../assets/img/bg-learning-';
        $learningWorld = "./../../assets/img/learning-world-";

        } 

        // la on est dans la session en cours
        $currentCodeLang = $_SESSION['current-code-language']; // j'en est besoin que de une
    } //


