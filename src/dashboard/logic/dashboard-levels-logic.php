<?php
    session_start();
    // appelé par dashboard-level

    // variables de travail
    $chevron = "";
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);

    // récupération du numéro de (level)
    // fournit par learning-logic.php
    $_SESSION['current-level'] = (int) htmlspecialchars($_GET['level']);
    $currentLevel = $_SESSION['current-level'];

    // partie aléatoire
    $linkLevel = "dashboard-levels.php?level=";
    $learningWorld = "./../../assets/img/learning-world-";