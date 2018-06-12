<?php
    session_start();
    //include de dashboard-level.php

    // variables de travail
    $chevronLeft = "";
    $chevronRight = "";
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);
    $currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);
    $klmInBd = (int) ($_SESSION['validated-klm-bd']);
    $nbLessonsFinichedInLevel = (int) $_SESSION['validated-lesson-bd'];


    
        // numéro du niveau à afficher
        // fournit par 
        $_SESSION['current-level'] = (int) ($_GET['level']);
    
        // ($currentLevel) sert aussi à choisir un autre niveau
        // pour révision par exemple
        $currentLevel = (int) $_SESSION['current-level'];
    
        // et pour la redirection vers ces leçons
        $currentLesson = (int) $_SESSION['validated-lesson-bd'];
        $linkLessons = "dashboard-lessons.php?lesson=";
    
        // partie aléatoire
        $linkLevel = "dashboard-levels.php?level=";
        $backgroundLevel = '../../assets/img/bg-learning-';
        $learningWorld = "./../../assets/img/learning-world-";



