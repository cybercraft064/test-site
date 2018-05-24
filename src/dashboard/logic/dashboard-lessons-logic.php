<?php
    session_start(); 
    // page include de dashboard-lessons.php
  
    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];

    // numéro de la dernière leçon (lesson) validée
    // utilisé pour invalider les lessons non encore effectuées
    $lesson = $_SESSION['lesson-user'];

    // variables variable :)
    $backgroundLesson = '../../assets/img/bg-learning-';
    $level = $_SESSION['level-user'];

    
       
    
