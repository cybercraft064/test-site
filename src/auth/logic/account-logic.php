<?php
session_start();
// include de account.php

// Logo du langage
$currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);

// test si on à terminé les modifs
if (isset($_SESSION['step']) && $_SESSION['step'] == "carry-on") {
    header('Location: ../dashboard/dashboard-levels.php?level=1 ');  // prevoir un retour à l'envoyeur (une variable stock le chemin de la page demandeur)
}

// Gestion des changements de login est password par l'utilisateur

// developpement futur
$code_parrain = "Aey3BtfgrD"; // $_SESSION['cd-parrain']
$nb_parrains = 6; // $_SESSION['nb-parrain']


// variables de travail
$email_user = htmlspecialchars($_SESSION['mail']);
$pseudo_user = htmlspecialchars($_SESSION['mail']);
$password_user = "";

// variable changement de couleur field-input du password
$check1 = "";
$check2 = "";