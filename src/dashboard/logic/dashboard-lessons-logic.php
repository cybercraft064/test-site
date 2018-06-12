<?php
    session_start(); 
    // page include de dashboard-lessons.php

    
    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];
    $lockLesson = "";

    
    // numéro de la dernière leçon validée
    // utilisé pour invalider les leçons non encore effectuées
    $lesson = $_SESSION['validated-lesson-bd'];

    // Test si on a cliquez sur une leçon encore bloqué  
    if (isset($_GET['lock']) && !empty($_GET['lock'])) { $lockLesson = "lockLesson"; };

    $_SESSION['dashboard-lessons-$lockLesson=:'] = $lockLesson; // --------------------------------------- DEBUG ---------
       
    // variable reçu en $GET  // -------------------------------------------------- //
    // permet de connaitre le niveau des leçons à afficher suivant la demande (cas révision)
    if (isset($_GET['level']) && !empty($_GET['level']) ) {
        $levelLessons = (int) ($_GET['level']);

        $_SESSION['current-level'] = $levelLessons;

        $_SESSION['dashboard-lessons-logic-$levelLesson: '] = $levelLessons; // ------- DEBUG -------

    } else {
        
        $levelLessons = htmlspecialchars($_SESSION['validated-level-bd']);
    }
    
    // permet de récupèrer le nom de planète suivant le (level)
    include("./../shared/planets-name.php");   
    
    // Lessons des différents levels // ----------  des que tu auras du temps crés une table pour la gestion des planetes  ----------- //
    switch ($levelLessons) {
        case 1:
        $startLesson = 0;
        $endLesson = 12;
        $soundLesson = array(2,5,8);
        break;

        case 2:
        $startLesson = 12;
        $endLesson = 24;
        $soundLesson = array(14,17,20);
        break;  
        
        case 3:
        $startLesson = 24;
        $endLesson = 36;
        $soundLesson = array(26,29,32);
        break;

        case 4:
        $startLesson = 36;
        $endLesson = 48;
        $soundLesson = array(38,41,44);
        break;

        case 5:
        $startLesson = 48;
        $endLesson = 60;
        $soundLesson = array(50,53,56);
        break;
    }
 
    // variables varientes :)
    $backgroundLesson = '../../assets/img/bg-learning-';

    // $_SESSION['endLesson-level'] est utilisé pour connaitre le numéro de la dernière leçon
    // pour la boucle de test de passage à un niveau suppérieur
    // dans learning-logic.php
    $_SESSION['endLesson-level'] = $endLesson;


    
       
    
