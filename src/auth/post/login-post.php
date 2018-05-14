<?php

session_start();


// remise à vide des variables de test
unset($_SESSION['erreurMail']);
unset($_SESSION['erreurPassword']); 

// variables du post
$mail = "";
$password = "";
$return = "";

// ***************** traitement du POST *********************** //
// chargement des variables de controles
if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']); 

    // verification si l'utilisateur est bien connu en BD
    // appel du gestionnaire de la base
    include("../../shared/bd-manager.php");

    // execution de la fonction de controle utilisateurs
    $return = connexion($mail, $password);

    switch ($return) {

        case "goodUser":
            // redirection vers sont dashboard
            header('location: ../../dashboard/dashboard-lessons.php'); 
            break;

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
            echo "cas non traité !! "; // debug
            break;    
    }

} //