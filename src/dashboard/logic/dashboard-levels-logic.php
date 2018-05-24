<?php
    session_start();
    // page include de dashboard-level.php

    // variables de travail
    $chevron = "";
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);

    // numéro du dernier niveau (level) validé
    // fournit par learning-logic.php
    $_SESSION['current-level'] = (int) htmlspecialchars($_GET['level']);
    $currentLevel = $_SESSION['current-level'];

    // partie aléatoire

    $linkLevel = "dashboard-levels.php?level=";
    $backgroundLevel = '../../assets/img/bg-learning-';
    $learningWorld = "./../../assets/img/learning-world-";