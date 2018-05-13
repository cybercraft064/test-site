<?php
// session_start();

echo "  ----- tu passe par login-post.php ------------";


// ****************** Init des variables *********************** //
// init du placeHolder de l'input Email
// sera modifié si l'email existe dans la base
$userMail = "E-mail";
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

        echo "la fonction connexion retourne -> goodUser --" ; // debug
        echo ' ----- test de la variable de session $_SESSION["pseudo-user"] :'.$_SESSION['pseudo-user']; //debug
        echo ' ----- test de la variable de session $_SESSION["level-user"] :'.$_SESSION['level-user']; //debug

           // et redirection vers sont dashboard
          header('location: ../../dashboard/dashboard-lessons.php'); 
            break;

        case "badMail":
        echo "je suis dans le case de return avec -> badMail"; // debug
            $userMail = "Inconnu: ".$mail;
            $bad_mail = "bad-mail";
            $field_input_mail = "field-input-bad";
            // redirection
         //   include_once("../login.php");
            break;

        case "badPassword":
        echo "je suis dans le case de return avec -> badPassword"; // debug        
            $userPassword = "Erreur de mot de passe";
            $bad_pwd = "bad-mail"; // mm couleur rouge dans le css -> .bad-mail
            $field_input_pwd = "field-input-bad";
            break;

        default :
            echo "cas non traité !! "; // debug
            break;    
    }

} //