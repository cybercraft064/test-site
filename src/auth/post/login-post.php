<?php
session_start();
// appelé par le form de login.php

include("../../shared/bd-manager.php");

// neutralisation des variables antérieures
unset($_SESSION['erreurMail']);
unset($_SESSION['erreurPassword']); 
$return = "";

// variables du post
$mail = "";
$password = "";

// chargement des variables de contrôle provenants du POST
if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']); 

    // execution de la fonction de controle utilisateurs
    $rep = checkUserConnexion($mail, $password);

    if ($rep == "badMail") {
        $_SESSION['erreurMail'] = "Inconnu: ".$mail;
        // redirection
        header('location: ../login.php'); 

    } elseif ($rep == "badPassword") {  
        $_SESSION['erreurPassword'] = "Erreur de mot de passe";     
        // redirection
        header('location: ../login.php');    

    } else {   // allez au boulot

        // chargement des variables de session 
        $_SESSION['mail'] = $rep['mail_user'];
        $_SESSION['id-user'] = $rep['id_user'];
        $_SESSION['pseudo-user'] = $rep['pseudo_user'];
        $_SESSION['level-user'] = $rep['level_user'];
        $_SESSION['lesson-user'] = $rep['lesson_user']; // toujours à zéro pour les nouveaux utilisateur 
                                                        // il passera à 1 dès sa première validation.
        //et copie pour la lesson_index
        // sachant que lesson_index doit avoir +1
        // on travaille sur le niveau des leçons qui ne sont pas encore validées
        $_SESSION['lesson-index'] = ($rep['lesson_user'] +1);

        $currentLevel = $_SESSION['level-user'];
        $currentLesson = $_SESSION['lesson-user'];
        header("Location: ../../dashboard/dashboard-lessons.php?lesson=".$currentLesson."&amp;level=".$currentLevel); 

    }              

} //