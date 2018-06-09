<?php
    session_start();
// appelé par dashboard-lessons.php avec un $_GET['lesson'];

include("../shared/bd-manager.php"); 

// variable de la boucle principal
// réponse à la première question de la leçcon
$_SESSION['step'] ="userInput";

//INI DES COMPTEURS DE LA PARTIE  
//init de l'index du mot à traduire (sont rang dans la leçon) table --> traduction
$_SESSION['wordIndex'] = 0; 
$_SESSION['Nbtranslation-InLesson'] = 0; // recupération du nombre de mots/phrases à traduire pour cette leçon

// utilisé pour savoir si on passe à la leçon suivante
// ou en mode révision 
$_SESSION['current-lesson'] = "";
$_SESSION['next-lesson'] = "";
$_SESSION['answer-reply'] = "";

// utilisé pour modifier l'affichage du CSS
$_SESSION['value'] = '';
$_SESSION['couleur-css'] = '';
$_SESSION['nextButton-css'] = "";

//init du compteur de bonne réponse
$_SESSION['cptGoodReply'] = 0;
//init du compteur de mauvaise réponse
$_SESSION['cptBadReply'] = 0;


// récupération du numéro de la leçon à traduire (1)
// provient de dashboard-lessons.php
$_SESSION['current-lesson'] = (int) htmlspecialchars($_GET['lesson']);


// fonction qui récupère sous forme de tableau toutes les lignes de mots/phrases à traduires (2)
$translations = getTranslation($_SESSION['current-code-language'], $_SESSION['current-lesson']);
$_SESSION['translations'] = $translations;

// nombre de traduction à effecter pour cette leçon
$_SESSION['Nbtranslation-InLesson'] = count($translations);

//$levelCurrent = (int) htmlspecialchars($_SESSION['validate-level-bd']);
//header("Location: learning.php?level=".$levelCurrent);
header("Location: learning.php");