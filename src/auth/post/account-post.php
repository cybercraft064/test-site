<?php
session_start();
// Appelé par le poste de (account.php)

include("../../shared/bd-manager.php");

// init variables du post
$newPseudo = "";



// post modification du password
// en trois étapes

// (1) saisie du nouveau password
if (isset($_POST['pwd']) && !empty($_POST['pwd']) && $_SESSION['step'] == "first-input-pwd" ) {
    
    $_SESSION['newPassword1'] = htmlspecialchars($_POST['pwd']);
    
    // changement de step
    $_SESSION['step'] = "ctrl-input-pwd";
    // demande de confirmation
    $_SESSION['txt-password'] = "CONFIRME ce mot de passe";
    $_SESSION['txt-button-pwd'] = "deuxième saisie";
    // redirection
    header("location: ../account.php?checkPwd=1"); 
    
    
    // (2) confirmation du nouveau mot de passe et mise à jour en Bd
} elseif (isset($_POST['pwd']) && !empty($_POST['pwd']) && $_SESSION['step'] == "ctrl-input-pwd" ) { 
    
    $_SESSION['newPassword2'] = htmlspecialchars($_POST['pwd']);
    
    // structure de contrôle des saisies
    if ($_SESSION['newPassword1'] == $_SESSION['newPassword2']) {
        
        // Mise à jour de la base: Tb -> users
        $newPassword = htmlspecialchars($_SESSION['newPassword2']);
        updatePassword((int) $_SESSION['id-user'], $newPassword);  
        
        // message de validation
        $_SESSION['txt-password'] = "Nouveau mot de passe validé";
        $_SESSION['txt-button-pwd'] = "Continuer";
        
        
        // Nettoyage des variables
        unset($_SESSION['newPassword1'],$_SESSION['newPassword2'] );
        
        // retour
        header("location: ../account.php?checkPwd=2");         
        
        
    } else { //  (3) gestion des erreures
        
        // erreur dans la saisie
        $_SESSION['step'] = "first-input-pwd";
        $_SESSION['txt-password'] = "La saisie ne correspond pas !!";
        $_SESSION['txt-button-pwd'] = '** Effacer et recommencer **';
        $_SESSION['newPassword1'] = "1";
        $_SESSION['newPassword2'] = "2";
        // retour
        $_SESSION['err-saisie'] = 1;
        header("location: ../account.php?checkPwd=3"); 
        
    }
    
} elseif ($_SESSION['err-saisie'] == 1) {  
    
    // Nous somme dans le cas d'une re-saisie
    $_SESSION['err-saisie'] = "";
    header("Location: ../start-account.php");
    
} else {
    
    // on indique que l'on à fini les validations
    $_SESSION['step'] = "carry-on";
    header("Location: ../account.php");  // la logic traitera la redirection //
    
} //



// post modification du pseudo
if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && $_SESSION['end-pseudo'] == 0) {

    $_SESSION['valeur de POST[pseudo]'] = $_POST['pseudo'] ;  // ---------------------------------  DEBUG ------------------------------------- //

     $newPseudo = htmlspecialchars($_POST['pseudo']); 
     // fonction de mise à jour du pseudo en Bd
     updatePseudo((int) $_SESSION['id-user'], $newPseudo); 

    // on indique que l'on à validé le pseudo
    // message de validation
    $_SESSION['pseudo-user'] = $newPseudo;
    $_SESSION['txt-pseudo'] = $newPseudo;
    $_SESSION['txt-button-pseudo'] = " Modification ok Continuer ";
    // retour
    $_SESSION['end-pseudo'] = 1;   
    header("location: ../account.php?checkPseudo=1"); 

} elseif ($_SESSION['end-pseudo'] == 1) {

    // cas clique sur CONTINUER
    $_SESSION['end-pseudo'] = 0;
    $_SESSION['txt-button-pseudo'] = "Changer de pseudo";
    //retour
    $_SESSION['step'] = "carry-on";
    header("Location: ../account.php");  // la logic traitera la redirection avec le step à: carry-on //

} // sa ne nous regarde pas!