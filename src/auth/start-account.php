<?php
    session_start();
// appelé par les menu

// init des variables de travail
$_SESSION['step'] = "";
$_SESSION['txt-password'] = "";
$_SESSION['txt-pseudo'] = "";
$_SESSION['err-saisie'] = "";
$_SESSION['newPassword1'] = "1";
$_SESSION['newPassword2'] = "2";

// première saisie du mot de passe
$_SESSION['step'] = "first-input-pwd";

// le text sera affiché dans le placeholder et dans value du bouton
$_SESSION['txt-pseudo'] = $_SESSION['pseudo-user'];
$_SESSION['txt-button-pseudo'] = " Changer de pseudo ";

$_SESSION['txt-password'] = "Nouveau mot de passe";
$_SESSION['txt-button-pwd'] = "Changer de mot de passe";


// go account.php
header("Location: account.php");
