<?php
    session_start(); 
    // page include de dashboard-lessons.php

    
    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];
    
    // numéro de la dernière leçon (lesson) validée
    // utilisé pour invalider les lessons non encore effectuées
    $lesson = $_SESSION['lesson-user'];
    
    // variable reçu en get  // -------------------------------------------------- //
    // permet de savoir le niveau des leçons à afficher suivant la demande
    if (isset($_GET['level'])) {
        
        $levelLessons = (int) htmlspecialchars($_GET['level']);
    } else {
        
        $levelLessons = htmlspecialchars($_SESSION['level-user']);
    }
    
    // permet de récupèrer le nom de planète suivant le (level)
    include("./../shared/planets-name.php");   
    
    // Lessons des différents levels // --------------------------------------------- //
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

    // $_SESSION['endLesson'] est utilisé pour connaitre le numéro de la dernière leçon
    // pour la boucle de test de passage à un niveau suppérieur
    // dans learning-logic.php
    $_SESSION['endLesson'] = $endLesson;


    
       
    
