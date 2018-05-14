<?php
    if (!isset($_SESSION)) { session_start(); }

    // affichage de sont pseudo
    $pseudo_user = $_SESSION['pseudo-user'];