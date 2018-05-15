<?php
    session_start();

//INI DES COMPTEURS DE LA PARTIE  

//init de l'index 
$_SESSION['wordIndex'] = 1; // wordIndex est l'ID de la table traduction
$_SESSION['step'] ="userInput";

//init du compteur de bonne réponse
$_SESSION['cptGoodReply'] = 0;

//init du compteur de mauvaise réponse
$_SESSION['cptBadReply'] = 0;

header('Location: learning.php');