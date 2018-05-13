<?php
    session_start();

    echo "---- je passe par dashboard-lessons-logic.php ---";

    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];

    // numéro de la dernière leçon validée
    $lesson = $_SESSION['lesson-user'];