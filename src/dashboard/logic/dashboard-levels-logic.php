<?php
    session_start();
    // appelé par dashboard-level

    // variables de travail
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);

    // numéro du dernier niveau validé
    $level = (int) htmlspecialchars($_SESSION['level-user']);

    // partie aléatoire
    $linkLevel = "dashboard-levels.php?level=";