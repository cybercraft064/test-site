<?php
    session_start();

//INI DES COMPTEURS DE LA PARTIE  

//init de l'index 
$_SESSION['wordIndex'] = 0;
$_SESSION['step'] ="userInput";

//init du compteur de bonne réponse
$_SESSION['cptGoodReply'] = 0;

//init du compteur de mauvaise réponse
$_SESSION['cptBadReply'] = 0;

header('Location: learning.php');