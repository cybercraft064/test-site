<?php
    session_start();
    // includ de signup.php

    // appel gestion de la base  
    include("./../shared/bd-manager.php");


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
// avec un retour sur son dashboard
if (isset($_SESSION['email'])) {

    $validatedLevel = $_SESSION['validated-level-bd'];
    $validatedLesson = $_SESSION['validated-lesson-bd'];
    header("Location: ../dashboard/dashboard-lessons.php?level=".$validatedLevel."&lesson=".$validatedLesson); 


    //sinon on récupère le post
    } else if (isset($_POST["newUserEmail"])) {         

        $mail = htmlspecialchars($_POST["newUserEmail"]);
        $password = htmlspecialchars($_POST["newUserPassword"]); 
        $pseudo = htmlspecialchars($_POST["newUserPseudo"]); 
             
    //Fonction vérification de l'uniciticé de l'email
    $exist = chekMail($mail);

        if ($exist != 1) {

            // ok l'email n'existe pas, création de cette user
            //fonction ajout utilisateur / table -> users
            $user = addUser($mail, $password, $pseudo);
    
            // chargement des variables de session
            $_SESSION['mail'] = $user['mail_user'];
            $_SESSION['id-user'] = $user['id_user'];
            $_SESSION['pseudo-user'] = $user['pseudo_user'];
            $_SESSION['validated-level-bd'] = $user['level_user'];
            $_SESSION['validated-lesson-bd'] = $user['lesson_user'];

            // direction le dashboard levels           
      //      header("Location: ../dashboard/dashboard-levels.php?level=1"); // puisque nouvelle utilisateur
      header("Location: ../home/home.php"); // accueil nouvelle utilisateur

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

