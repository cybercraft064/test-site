<?php
    session_start();
    //include de dashboard-level.php

    // variables de travail
    $chevron = "";
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);

    // numéro du dernier niveau (level) validé
    // fournit par learning-logic.php
    $_SESSION['current-level'] = (int) htmlspecialchars($_GET['level']);

    // ($currentLevel) sert aussi à choisir un autre niveau
    // pour révision entre autre
    $currentLevel = $_SESSION['current-level'];

    // et pour la redirection vers ces leçons
    $currentLesson = $_SESSION['lesson-user'];
    $linkLessons = "dashboard-lessons.php?lesson=";

    // partie aléatoire
    $linkLevel = "dashboard-levels.php?level=";
    $backgroundLevel = '../../assets/img/bg-learning-';
    $learningWorld = "./../../assets/img/learning-world-";

