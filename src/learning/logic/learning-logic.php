<?php
session_start();
// page include de learning.php

// init des Valeurs Variable
$backgroundLesson = '../../assets/img/bg-learning-';
$level = (int) htmlspecialchars($_SESSION['level-user']); // dernière validé en Bd

// appel de la BD
include("../shared/bd-manager.php"); 


// les variables session s'ont initialisées dans ( start-learning.php )
// si le step est à: saisie de l'utilisateur "userInput"
if ($_SESSION['step'] === "userInput") {  /* ******************************  */
  
  // incrementation mot suivant et sert de compteur de ligne
  $_SESSION['wordIndex']++;
  
  if ($_SESSION['wordIndex'] > $_SESSION['wordsNbInLesson']) {  /* ************************ */

    // traitements des annonces dans winner.php
    // si le numéro de la lesson en cours et inférieur ou égale de celui enregistré en base
    // s'est que nous sommes en révision
    if ($_SESSION['current-lesson'] <= $_SESSION['lesson-user']) { /* ************************* */

        $_SESSION['revision'] = true;

       } else { /* alors nous validons cette lesson en Bd */

        $_SESSION['revision'] = false;

        // Validation en base du numéro de leçon terminé / table -> users
        // recupération de l'id user (1)
        $id_user = (int) htmlspecialchars($_SESSION['id-user']);
    
        // incrementation du numéro de leçon (2)
        $_SESSION['lesson-user']++;
        $lesson_user = (int) htmlspecialchars($_SESSION['lesson-user']);
        
        // fonction de mise à jour du nouveau numéro (3)
        updateLessons($id_user,$lesson_user);  
        
        // passage à l'index des lessons suivantes
        // sans faire de mise à jour, puisque non encore validé
        $_SESSION['lesson-index'] = $lesson_user +1;

        
        // Ensuite nous testons si la dernière leçon de ce niveau est atteint
        // test de passage à un (level) niveau supperieur 
        if ($_SESSION['lesson-index'] > $_SESSION['endLesson']){  // endLesson provient de dashboard-lessons-logic.php
          
            // récupération du dernier niveau validé
            $levelCurrent = (int) htmlspecialchars($_SESSION['level-user']);
            $levelCurrent++;
              
            // function de mise jour du (level) / base -> users
            updateLevel($id_user, $levelCurrent);

            // direction la page de changement de NIVEAU  
            header( "location: ../dashboard/dashboard-levels.php?level=".$levelCurrent) ;  
            
            } else { // on est seulement dans le cas de la leçon suivante

              // direction la page winner de lessons
              $levelCurrent = (int) htmlspecialchars($_SESSION['level-user']);
              $levelCurrent++;
              header("Location: winner.php?level=".$levelCurrent);      
            }

        }
    }
    
}  // sinon nous somme en cours de leçon !! //
  
    // vu que s'est un tableau 
    // init de l'index à zéro au premier passage
    $wordIndex = (int) ($_SESSION['wordIndex'] -1);
    
    // chargement de la ligne en cours de traitement
    $translations = $_SESSION['translations'];
    $_SESSION['source'] = $translations[$wordIndex]['source'];
    $_SESSION['reponse'] = $translations[$wordIndex]['reponse'];





