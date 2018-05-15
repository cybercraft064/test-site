<?php

session_start();

// déclaration des variables
$_SESSION['value'] = "";
$_SESSION['couleur'] = "";
$_SESSION['etat'] = "";
$_SESSION['nextButton'] = "";


// si le step est à: verifier la réponse
if ($_SESSION['step'] === "checkAnswer") {

    $_SESSION['wordIndex']++;

} 

// chargement de l'index de la table traduction
$wordIndex = (int) $_SESSION['wordIndex'];

// appel de la BD
include("../shared/bd-manager.php");
// appel de la fonction qui récupère la ligne de traduction
getTranslation($wordIndex);

/*
// init des variables
$nextButton = "";

// Controle de la saisie
if (!empty($_POST["input-reply"]) && $_SESSION['step'] !== "checkAnswer") {

    $_SESSION['step'] = "checkAnswer";

    // variable de comparaison
    $reponse = htmlspecialchars($_POST["input-reply"]);

    if (strtolower($reponse) == strtolower($_SESSION["reponse"])) {
        $couleur = "good-reply";
        $_SESSION['cptGoodReply']++;

    } else {
        $couleur = "bad-reply";  
        $etat = "bad-container";
        $nextButton = "nextButton";
        $_SESSION['cptBadReply']++;
    }


} else {

    $_SESSION['step'] = "userInput";

} */
