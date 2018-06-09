<?php
    session_start();
    //include de dashboard-level.php

    // variables de travail
    $chevron = "";
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);

    // numéro du niveau à afficher
    // fournit par learning-logic.php / home.php
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

