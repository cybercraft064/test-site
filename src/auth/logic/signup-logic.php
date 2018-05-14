<?php
    if (!isset($_SESSION)) { session_start(); }

// init du placeHolder de l'input Email
// sera modifié si l'email existe dans la base
$NewMail = "Email";

// utilisé pour le css (.bad-mail)
$bad_mail = "good"; 

// utilisé pour modifier la couleur de saisie de l'input mail dans le css (.field-input-bad)
$field_input_mail = "field-input";

$mail = "";
$password = "";
$pseudo = "";

// test si utilisateur s'est trompé de manip.
if (isset($_SESSION['email'])) {

    header('Location: ../../dashboard/dashboard-levels.php');

    } else if (isset($_POST["newUserEmail"])) {         

        $mail = htmlspecialchars($_POST["newUserEmail"]);
        $password = htmlspecialchars($_POST["newUserPassword"]); 
        $pseudo = htmlspecialchars($_POST["newUserPseudo"]); 
        
    // appel gestion de la base  
    include_once("./../shared/bd-manager.php");
               
    //Fonction verification de l'uniciticé de l'email
    $exist = chekMail($mail);

        if ($exist != 1) {
            //fonction d'ajout utilisateur
             addUser($mail, $password, $pseudo);
             header('Location: ../home/home.php');    

        } else {
            // si l'email existe en base -> Avertissement par un message transmit par le placeholder de l'input du mail
            $NewMail = "Déja utilisé: ".$mail;

            //passe en rouge la zone de saisie (css)
            $bad_mail = "bad-mail";

            // change la couleur de la police en blanc
            // pour voir la nouvelle saisie sur fond rouge! (css)
            $field_input_mail = "field-input-bad";
    }
}// 

