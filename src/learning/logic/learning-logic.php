<?php

session_start();

// si le step est à: entrée de l'utilisateur
// on incrémente [wordIndex] pour passer à la suivante
if ($_SESSION['step'] === "userInput") {

    $_SESSION['wordIndex']++;

    // compteur de traduction effectué
    $_SESSION['count']++;

    if ($_SESSION['count'] > 5){

       // on incrémente le numéro de lesson 
       $_SESSION['lesson-user']++;
       $lesson_user = (int) htmlspecialchars($_SESSION['lesson-user']);

       // recupération de son id
       $id_user = (int) htmlspecialchars($_SESSION['id-user']);


       // appel de la BD
   //    include("../shared/bd-manager.php"); 
       // fonction Update du numéro de leçon
   //    updateLessons($id_user,$lesson_user);     
       
       // direction la page winner
   header('Location: winner.php');      
      }
} 


// chargement de l'index de la table traduction
$wordIndex = (int) $_SESSION['wordIndex'];

// appel de la BD
include("../shared/bd-manager.php");
// appel de la fonction qui récupère la ligne de traduction
$translations = getTranslation($wordIndex);

// chargement de la ligne en cours d'utilisation
$_SESSION['source'] = $translations['source'];
$_SESSION['reponse'] = $translations['reponse'];


