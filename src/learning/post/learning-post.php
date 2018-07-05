<?php
session_start();
// page appelé par le FORM de learning.php

// Contrôle de la saisie
if ($_SESSION['step'] === "userInput") {  

    // variables de comparaison
    $userAnswer = strtolower(htmlspecialchars($_POST["input-reply"]));
    $correctAnswer = strtolower($_SESSION["reponse"]) ;

    if ($userAnswer == $correctAnswer) {
        $_SESSION['value'] = $userAnswer;
        $_SESSION['couleur-css'] = "good-reply";
        $_SESSION['answer-reply'] = "correct";
        $_SESSION['cptGoodReply']++;

        
    } else {
        $_SESSION['value'] = $userAnswer;
        $_SESSION['couleur-css'] = "bad-reply"; 
        $_SESSION['answer-reply'] = "incorrect";
        $_SESSION['nextButton-css'] = "nextButton";
        $_SESSION['cptBadReply']++;
        
    }
    
    // changement de step 
    $_SESSION['step'] = "check-answer"; // état vérification de la réponse   
    header('location: ../learning.php');
    
}  else { // sinon mot/phrase suivante

    // si la réponse n'est pas bonne [on refait un tour]
    if ($_SESSION['answer-reply'] == "incorrect") {$_SESSION['wordIndex']--;}

    $_SESSION['step'] = "userInput"; 
    $_SESSION['value'] = "";
    $_SESSION['couleur-css'] = "";
    $_SESSION['answer-reply'] = "";
    $_SESSION['nextButton-css'] = ""; 

     // retour à l'envoyeur 
     header('location: ../learning.php');
} //