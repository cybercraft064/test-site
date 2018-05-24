<?php
    session_start(); 
    // page include de dashboard-lessons.php
  
    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];

    // numéro de la dernière leçon (lesson) validée
    // utilisé pour invalider les lessons non encore effectuées
    $lesson = $_SESSION['lesson-user'];

    // variable reçu en get
    // permet de savoir le niveau des leçons à afficher suivant la demande
    if (isset($_GET['level'])) {

        $levelLessons = (int) htmlspecialchars($_GET['level']);
    } else {
        
        $levelLessons = htmlspecialchars($_SESSION['level-user']);
    }

    // variables varientes :)
    $backgroundLesson = '../../assets/img/bg-learning-';


    
       
    
