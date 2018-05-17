<?php
session_start();
include("../../shared/bd-manager.php");

// neutralisation des variables antérieures
unset($_SESSION['erreurMail']);
unset($_SESSION['erreurPassword']); 
$return = "";
// variables du post
$mail = "";
$password = "";

// chargement des variables de controles provenants du POST
if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']); 

    // execution de la fonction de controle utilisateurs
    $return = checkUserConnexion($mail, $password);

    switch ($return) {
        
        case "badMail":
        $_SESSION['erreurMail'] = "Inconnu: ".$mail;
        // redirection
        header('location: ../login.php'); 
        break;
        
        case "badPassword":    
        $_SESSION['erreurPassword'] = "Erreur de mot de passe";     
        // redirection
        header('location: ../login.php');         
        break;
        
        default :
        // chargement des variables de session 
        $_SESSION['mail'] = $return['mail_user'];
        $_SESSION['id-user'] = $return['id_user'];
        $_SESSION['pseudo-user'] = $return['pseudo_user'];
        $_SESSION['level-user'] = $return['level_user'];
        $_SESSION['lesson-user'] = $return['lesson_user'];

        // redirection vers sont dashboard
        header('location: ../../dashboard/dashboard-lessons.php'); 

        break; // j'ai un doute sur l'éfficacitée des break;)
        
    }

} //