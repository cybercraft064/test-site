<?php
session_start();

// cette page est appelé par learning.php

// appel de la BD
include("../shared/bd-manager.php"); 


// si le step est à: entrée de l'utilisateur
// les variables session s'ont initialisées dans ( start-learning.php )
if ($_SESSION['step'] === "userInput") {
  
  // incrementation mot suivant et sert de compteur de ligne
  $_SESSION['wordIndex']++;
  
  if ($_SESSION['wordIndex'] > $_SESSION['wordsNbInLesson']) {  

    //traitements des annonces dans winner.php
    // si le numéro de la lesson en cours et inférieur de celui enregistré en base
    // alors s'est que nous sommes en révision
    if ($_SESSION['current-lesson'] <= $_SESSION['lesson-user']) {

        $_SESSION['revision'] = true;

       } else {

        $_SESSION['revision'] = false;

        // Validation en base du numéro de leçon terminé / table -> users
        // recupération de l'id user (1)
        $id_user = (int) htmlspecialchars($_SESSION['id-user']);
    
        // incrementation du numéro de leçon (2)
        $_SESSION['lesson-user']++;
        $lesson_user = (int) htmlspecialchars($_SESSION['lesson-user']);
        
        // fonction de mise à jour (3)
        updateLessons($id_user,$lesson_user);  
        
        // passage au niveau de lesson suivant
        // sans faire de mise à jour, puisque pas encore validé
        $_SESSION['lesson-index'] = $lesson_user +1;
        
        // test passage au niveau de lesson suivant
            // numéro du dernier niveau validé
            $levelCurrent = (int) htmlspecialchars($_SESSION['level-user']);

            if ($_SESSION['lesson-index'] == 12){
              $levelCurrent++;
              // function de mise jour du niveau base -> users
              updateLevel($id_user, $levelCurrent);
            } 
        }

    // direction la page winner de toute les manières
    header('Location: winner.php');      
    
  }
} //

// sinon

// init de l'index 0
// vu que s'est un tableau / la première ligne vaut zéro.
$wordIndex = (int) ($_SESSION['wordIndex'] -1);

// chargement de la ligne en cours de traitement
$translations = $_SESSION['translations'];
$_SESSION['source'] = $translations[$wordIndex]['source'];
$_SESSION['reponse'] = $translations[$wordIndex]['reponse'];



