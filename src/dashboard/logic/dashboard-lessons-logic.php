<?php
    if (!isset($_SESSION)) { session_start(); }
        
    echo "---- je passe par dashboard-lessons-logic.php ---";

    print_r($_SESSION);

    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];



    // numéro de la dernière leçon validée
    $lesson = $_SESSION['lesson-user'];  

    // activation ou non de la carte lesson
    for ($i = 12; $i > $lesson; $i --){
        $filter = "filter$i"; // toujour la dernière valeur
    }
    

   // echo $filter = "filter";