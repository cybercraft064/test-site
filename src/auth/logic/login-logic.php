<?php
    if (!isset($_SESSION)) { session_start(); }

// avant tout traitement verification si la session et active
// et redirection vers sont dashboard si s'est le cas.
if (isset($_SESSION['mail'])) {

     header('Location: ../../dashboard/dashboard-lessons.php'); 

} else {
    echo " ----- (login-logic.php) la session est nouvelle ------- ";
    print_r($_SESSION);

// ****************** Init des variables *********************** //

// init du placeHolder de l'input Email
if (empty($_SESSION['userMail'])){
  $userMail = "E-mail";
  $bad_mail = "good"; 
  $field_input_mail ="field-input";
} else {
   // signalement erreur sur le email user
   $userMail = htmlspecialchars($_SESSION['userMail']);
   $bad_mail = "bad-mail"; 
   $field_input_mail ="field-input-bad";
}

// init de la zone password
if (empty($_SESSION['userPassword'])){  
    $userPassword = "Mot de passe";
    $bad_psw = "good";
    $field_input_pwd = "field-input";
} else {
    // signalement erreur sur le mot de passe
    $userPassword = htmlspecialchars($_SESSION['userPassword']);
    $bad_pwd = "bad-mail";
    $field_input_pwd = "field-input-bad"; 
    }   
}//








