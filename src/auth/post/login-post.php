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
    // source bd-manager.php
    $rep = checkUserConnexion($mail, $password);

    if ($rep == "badMail") {
        $_SESSION['erreurMail'] = "Inconnu: ".$mail;
        // redirection
        header('location: ../login.php'); 

    } elseif ($rep == "badPassword") {  
        $_SESSION['erreurPassword'] = "Erreur de mot de passe";     
        // redirection
        header('location: ../login.php');    

    } else {   // sinon tout est ok  allez au boulot

        // chargement des variables de session 
        $_SESSION['mail'] = $rep['mail_user'];
        $_SESSION['id-user'] = $rep['id_user'];
        $_SESSION['pseudo-user'] = $rep['pseudo_user'];
        $_SESSION['validated-level-bd'] = $rep['level_user'];
        $_SESSION['validated-lesson-bd'] = $rep['lesson_user']; // toujours à zéro pour les nouveaux utilisateur 
                                                        // il passera à 1 dès sa première validation.
        // et création de la current-lesson
        // sachant que current-lesson doit avoir +1
        // puisque on travaille sur le niveau des leçons qui ne sont pas encore validées en Bd
        $_SESSION['current-lesson'] = ($rep['lesson_user'] +1);

        // nous passons au dashboard-lesson  (1)le niveau en cours  (2)la dernière leçon validée en bd
        $validatedLevel = (int) $_SESSION['validated-level-bd'];
        $validatedLesson = (int) $_SESSION['validated-lesson-bd'];
        header("Location: ../../dashboard/dashboard-lessons.php?level=".$validatedLevel."&lesson=".$validatedLesson); 

    }              

} //