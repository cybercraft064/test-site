<?php
session_start();
// page include de learning.php

// Récupération des valeurs passé en $_GET 
// de la redirection --> dashboard-lesson.php?lesson=xxx;
$curLesson = (int) ($_GET['lesson']);

// init des Valeurs Variable
$backgroundLesson = '../../assets/img/bg-learning-';
$pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);
$currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);
$level = (int) ($_SESSION['current-level']); 
// recupération de l'id user 
$id_user = (int) ($_SESSION['id-user']);


// appel de la BD
include("../shared/bd-manager.php"); 

/* fonction qui récupère sous forme de tableau 
 toutes les lignes de mots/phrases à traduires  */
 $translations = getTranslation($currentCodeLang, $curLesson );


