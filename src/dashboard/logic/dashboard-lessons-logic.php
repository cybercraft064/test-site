<?php
    if (!isset($_SESSION)) { session_start(); }
        
    echo "---- je passe par dashboard-lessons-logic.php ---";

    print_r($_SESSION);

   // echo ' ----- test de la variable de session $_SESSION["pseudo-user"] :'.$_SESSION['pseudo-user']; //debug
   // echo ' ----- test de la variable de session $_SESSION["level-user"] :'.$_SESSION['lesson-user']; //debug

    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];

    // numéro de la dernière leçon validée
    $lesson = $_SESSION['lesson-user'];