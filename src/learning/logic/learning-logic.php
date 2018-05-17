<?php
session_start();

// cette page est appelé par learning.php

// appel de la BD
include("../shared/bd-manager.php"); 


// si le step est à: entrée de l'utilisateur
// on incrémente [wordIndex] 
// les variables de session s'ont initialisées dans ( start-learning.php )
if ($_SESSION['step'] === "userInput") {

    $_SESSION['wordIndex']++;

    // compteur de traduction effectué
    $_SESSION['count']++;

    if ($_SESSION['count'] > 3) { // 5 origine   3 pour le debug

      // recupération de l'id user
      $id_user = (int) htmlspecialchars($_SESSION['id-user']);

       // on incrémente le numéro de lesson 
       $_SESSION['lesson-user']++;
       $lesson_user = (int) htmlspecialchars($_SESSION['lesson-user']);
            
       // controle des nouvelles valeurs
       $_SESSION['controle_valeur_lesson'] = $lesson_user;
       $_SESSION['controle_valeur_id_user'] = $id_user;
       // fonction Update du numéro de leçon
       updateLessons($id_user,$lesson_user);     
       
       // direction la page winner
       header('Location: winner.php');      

      }
} 


// chargement de l'index de la table traduction
$wordIndex = (int) $_SESSION['wordIndex'];

// appel de la fonction qui récupère la ligne de traduction
$translations = getTranslation($wordIndex);

// chargement de la ligne en cours d'utilisation
$_SESSION['source'] = $translations['source'];
$_SESSION['reponse'] = $translations['reponse'];


