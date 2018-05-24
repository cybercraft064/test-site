<?php
session_start();
// include de login.php

// avant tout traitement vérification si la session et active
// et redirection vers sont dashboard si s'est le cas.
if (isset($_SESSION['mail'])) {

    $currentLevel = $_SESSION['level-user'];
    $currentLesson = $_SESSION['lesson-user'];
    header("Location: ../dashboard/dashboard-lessons.php?lesson=".$currentLesson."&amp;level=".$currentLevel); 

} else {

// ****************** Init des variables *********************** //

// init du placeHolder de l'input Email
if (empty($_SESSION['erreurMail'])){
  $userMail = "E-mail";
  $bad_mail = "good"; 
  $field_input_mail ="field-input";
} else {
   // signalement erreur sur le email user
   $userMail = htmlspecialchars($_SESSION['erreurMail']);
   $bad_mail = "bad-mail"; 
   $field_input_mail ="field-input-bad";
}

// init de la zone password
if (empty($_SESSION['erreurPassword'])){  
    $userPassword = "Mot de passe";
    $bad_psw = "good";
    $field_input_pwd = "field-input";
} else {
    // signalement erreur sur le mot de passe
    $userPassword = htmlspecialchars($_SESSION['erreurPassword']);
    $bad_pwd = "bad-mail";
    $field_input_pwd = "field-input-bad"; 
    }   
}//

