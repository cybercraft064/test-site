<?php
session_start();

// init du placeHolder de l'input Email
// sera modifié si l'email existe dans la base
$userMail = "Email";
$userPassword = "Mot de passe";

// changement de la couleur du texte de saisie input (css)
$field_input_mail ="field-input";
$field_input_pwd = "field-input";

// utilisé pour le css (.bad-mail)
$bad_mail = "good"; 
$bad_psw = "good";

$mail = "";
$password = "";
$return = "";

// verification session en cours
if (isset($_SESSION['email'])) {

     header('Location: ../dashboard/dashboard-lessons.php'); 

// chargement des variables de controles
} else 	if (isset($_POST['email']) && isset($_POST['password'])) {
    $mail = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); 

    // appel gestionnaire de la base
    include_once("./../shared/bd-manager.php");

    // execution de la fonction de controle utilisateurs
    $return = connexion($mail, $password);
  
    // suivant la valeur return de la fonction 
    if ($return == "badUser") { 
      $userMail = "Inconnu: ".$mail;
      $bad_mail = "bad-mail";
      $field_input_mail = "field-input-bad";

    } else if ($return == "badPassword") {
      $userPassword = "Erreur de mot de passe";
      $bad_pwd = "bad-mail"; // mm couleur rouge dans le css -> .bad-mail
      $field_input_pwd = "field-input-bad";
    }

} // 

