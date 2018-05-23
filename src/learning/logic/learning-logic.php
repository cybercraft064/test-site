<?php
session_start();

// cette page est appelé par learning.php
// init des Valeurs Variable
$backgroundLesson = '../../assets/img/bg-learning-';
$level = (int) htmlspecialchars($_SESSION['level-user']);

// appel de la BD
include("../shared/bd-manager.php"); 


// les variables session s'ont initialisées dans ( start-learning.php )
// si le step est à: saisie de l'utilisateur "userInput"
if ($_SESSION['step'] === "userInput") {  /* ******************************  */
  
  // incrementation mot suivant et sert de compteur de ligne
  $_SESSION['wordIndex']++;
  
  if ($_SESSION['wordIndex'] > $_SESSION['wordsNbInLesson']) {  /* ************************ */

    //traitements des annonces dans winner.php
    // si le numéro de la lesson en cours et inférieur de celui enregistré en base
    // alors s'est que nous sommes en révision
    if ($_SESSION['current-lesson'] <= $_SESSION['lesson-user']) { /* ************************* */

        $_SESSION['revision'] = true;

       } else { /* ******* */

        $_SESSION['revision'] = false;

        // Validation en base du numéro de leçon terminé / table -> users
        // recupération de l'id user (1)
        $id_user = (int) htmlspecialchars($_SESSION['id-user']);
    
        // incrementation du numéro de leçon (2)
        $_SESSION['lesson-user']++;
        $lesson_user = (int) htmlspecialchars($_SESSION['lesson-user']);
        
        // fonction de mise à jour du nouveau numéro (3)
        updateLessons($id_user,$lesson_user);  
        
        // passage à l'index des lesson suivant
        // sans faire de mise à jour, puisque pas encore validé
        $_SESSION['lesson-index'] = $lesson_user +1;

        
        // test de passage à un (level) niveau supperieur 
        if ($_SESSION['lesson-index'] > 12){  /* *********************** */
          
            // récupération du dernier (level) validé
            $levelCurrent = (int) htmlspecialchars($_SESSION['level-user']);
            $levelCurrent++;
              
            // function de mise jour du niveau base -> users
            updateLevel($id_user, $levelCurrent);

            // direction la page de changement de NIVEAU  
            header( "location: ../dashboard/dashboard-levels.php?level=".$levelCurrent) ;  
            
            } else { // on est seulement dans le cas de la lecon suivante

              // direction la page winner de lessons
              header('Location: winner.php');      
            }

        }
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



