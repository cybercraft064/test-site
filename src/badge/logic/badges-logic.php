<?php
session_start();

include('../shared/bd-manager.php');
// récupération sous forme de tableau de la table -> badges
$rowBadge = getBadge();
$nb_badges = count($rowBadge);

 $currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);
 $km = (int) ($_SESSION['validated-km-bd']);

// Variables de contexte
$currentBadge = 1;
$titleBadge = "voyageur junior";
$currentKm = "118";
$nextBadge = "faceBook.png";
$kmNextBadge = "6";
$challengeBadge = "faceBook.png";
$titleChallengeBadge = "Roi des touristes";
$KmChallenge = "50";


