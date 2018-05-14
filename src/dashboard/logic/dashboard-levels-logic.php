<?php
    if (!isset($_SESSION)) { session_start(); }

    // variables de travail
    $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);

    // numéro du dernier niveau validé
    $level = $_SESSION['level-user'];