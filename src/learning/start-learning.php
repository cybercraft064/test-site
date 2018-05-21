<?php
    session_start();
// appelé par le POST de dashboard-lessons.php

include("../shared/bd-manager.php"); 

// variable de la boucle principal
$_SESSION['step'] ="userInput";

//INI DES COMPTEURS DE LA PARTIE  
//init de l'index-> correspond au numéro de la ligne à traduire dans le (lesson_index)
$_SESSION['wordIndex'] = 0; 
$_SESSION['wordsNbInLesson'] = 0;

// utilisé pour savoir si on passe à la leçon suivante
// ou en mode révision 
$_SESSION['current-lesson'] = "";
$_SESSION['next-lesson'] = "";
$_SESSION['answerReply'] = "";

// utilisé pour modifier l'affichage du CSS
$_SESSION['value'] = '';
$_SESSION['couleur-css'] = '';
$_SESSION['nextButton-css'] = "";

//init du compteur de bonne réponse
$_SESSION['cptGoodReply'] = 0;
//init du compteur de mauvaise réponse
$_SESSION['cptBadReply'] = 0;

// -----------------------------------------------------------------------------
// récupération du numéro de la leçon à traduire (1)
$_SESSION['current-lesson'] = (int) htmlspecialchars($_GET['lesson']);
// 

// fonction qui récupère les lignes des mots à traduires (2)
$translations = getTranslation($_SESSION['current-lesson']);
$_SESSION['translations'] = $translations;

// nombre de traduction à effecter pour cette leçon
$_SESSION['wordsNbInLesson'] =  count($translations);


header('Location: learning.php');