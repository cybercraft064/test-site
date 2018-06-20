<?php
session_start();
// include de account.php

// test si on à terminé les modifs
if (isset($_SESSION['step']) && $_SESSION['step'] == "carry-on") {
    header('Location: ../dashboard/dashboard-levels.php?level=1 ');  // prevoir un retour à l'envoyeur (une variable stock le chemin de la page demandeur)
}

// Gestion des changements de login est password par l'utilisateur

// variables de travail
$email_user = "cybercraft64@hotmail.fr"; // $_SESSION['mail'];
$code_parrain = "Aey3BtfgrD";
$nb_parrains = 12;
$pseudo_user = "LaTruffeBlanche";
$password_user = "";

// variable changement de couleur field-input du password
$check1 = "";
$check2 = "";