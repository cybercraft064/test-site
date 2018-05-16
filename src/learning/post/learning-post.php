<?php
session_start();

// Controle de la saisie
if ($_SESSION['step'] === "userInput") {

    // variables de comparaison
    $userAnswer = strtolower(htmlspecialchars($_POST["input-reply"]));
    $correctAnswer = strtolower($_SESSION["reponse"]) ;

    if ($userAnswer == $correctAnswer) {
        $_SESSION['value'] = $userAnswer;
        $_SESSION['couleur-css'] = "good-reply";
        $_SESSION['answerReply'] = "correct";
        $_SESSION['cptGoodReply']++;
        
    } else {
        $_SESSION['value'] = $userAnswer;
        $_SESSION['couleur-css'] = "bad-reply"; 
        $_SESSION['answerReply'] = "incorrect";
        $_SESSION['nextButton-css'] = "nextButton";
        $_SESSION['cptBadReply']++;
        
    }
    
    // changement de step
    $_SESSION['step'] = "checkAnswer"; // etat vérification de la reponse   
    header('location: ../learning.php');
    
}  else {

    $_SESSION['step'] = "userInput"; 
    $_SESSION['value'] = "";
    $_SESSION['couleur-css'] = "";
    $_SESSION['nextButton-css'] = ""; // 

        // retour à l'envoyeur */
        header('location: ../learning.php');
} 