<?php
    session_start(); 

    // page appelé de dashboard-lessons.php
  
    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];

    // numéro de la dernière leçon validée
    $lesson = $_SESSION['lesson-user'];
    
       
    
