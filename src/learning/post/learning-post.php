<?php
session_start();

// Init des Variables
$reponse ="";

// Controle de la saisie
if (!empty($_POST["input-reply"]) && $_SESSION['step'] !== "checkAnswer") {

    $_SESSION['step'] = "checkAnswer"; // etat verification de la reponse

    // variable de comparaison
    $reponse = htmlspecialchars($_POST["input-reply"]);

    if (strtolower($reponse) == strtolower($_SESSION["reponse"])) {
        $_SESSION['value'] = $reponse;
        $_SESSION['couleur'] = "good-reply";
        $_SESSION['cptGoodReply']++;
        // retour à l'envoyeur
        header('location: ../learning.php');

    } else {
        $_SESSION['couleur'] = "bad-reply";  
        $_SESSION['etat'] = "bad-container";
        $_SESSION['nextButton'] = "nextButton";
        $_SESSION['cptBadReply']++;
        // retour à l'envoyeur

        echo "-- je suis dans mauvaise réponse --";
      //  header('location: ../learning.php');        
    }


}  else {
    echo " -- je suis dans else --";
   /* $_SESSION['step'] = "userInput";
        // retour à l'envoyeur
        header('location: ../learning.php'); */
} 