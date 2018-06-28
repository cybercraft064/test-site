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

        // chargement des variables de session Table-> users
        $_SESSION['mail'] = $rep['mail_user'];
        $_SESSION['id-user'] = (int )$rep['id_user'];
        $_SESSION['pseudo-user'] = $rep['pseudo_user'];
        $_SESSION['validated-km-bd'] = $rep['km_user'];

             // chargement des variables de session Table-> users_languages
              $rep1 = loadLineUserTbUsersLanguages((int) $rep['id_user']);
              $_SESSION['current-code-language'] = $rep1['code_language'];
              $_SESSION['validated-level-bd'] = $rep1['level_user'];
              $_SESSION['validated-lesson-bd'] = $rep1['lesson_user'];    

                                                        
        // et création de la current-lesson
        // sachant que current-lesson doit avoir +1
        // puisque on travaille sur le niveau des leçons qui ne sont pas encore validées en Bd
        $_SESSION['current-lesson'] = ($rep1['lesson_user'] +1);

        // nous passons au dashboard-lesson  (1)le niveau en cours  (2)la dernière leçon validée en bd
        $validatedLevel = (int) $_SESSION['validated-level-bd'];
        $validatedLesson = (int) $_SESSION['validated-lesson-bd'];

        // netoyage des variables du post
        $mail = "";
        $password = "";

        // redirection
        header("Location: ../../dashboard/dashboard-lessons.php?level=".$validatedLevel."&lesson=".$validatedLesson); 

    }              

} //