<?php
session_start();
// page include de learning.php

// init des Valeurs Variable
$backgroundLesson = '../../assets/img/bg-learning-';
$level = (int) htmlspecialchars($_SESSION['validated-level-bd']); // dernier niveau validé en Bd

// appel de la BD
include("../shared/bd-manager.php"); 


// les variables session s'ont initialisées dans ( start-learning.php )
// si le step est à saisie de l'utilisateur 
if ($_SESSION['step'] === "userInput") {                                    /* Boucle principal  */
  
  // incrementation mot suivant et sert de compteur de ligne
  $_SESSION['wordIndex']++;
  
  if ($_SESSION['wordIndex'] > $_SESSION['Nbtranslation-InLesson']) {              /* test fin de la leçon */

    // traitements des annonces dans winner.php
    // si le numéro de la lesson en cours et inférieur ou égale de celui enregistré en base
    // s'est que nous sommes en révision
    if ($_SESSION['current-lesson'] <= $_SESSION['validated-lesson-bd']) {  /* test le cas d'une révision */

        $_SESSION['revision'] = true;
        $klm = "";

        // incrementation des kilometres +2 en mode révision
        $klm = (int) htmlspecialchars($_SESSION['validated-klm-bd']);
        $klm = $klm +2;
        $_SESSION['validated-klm-bd'] = $klm;
        updateKlm($id_user,$klm);

       } else { /* sinon nous validons cette lesson en Bd */

        $_SESSION['revision'] = false;
        $klm = "";

        // Validation en Bd du numéro de leçon terminé : table -> users
        // recupération de l'id user (1)
        $id_user = (int) htmlspecialchars($_SESSION['id-user']);
    
        // incrementation du numéro de leçon (2)
        $_SESSION['validated-lesson-bd']++;
        $lesson_user = (int) htmlspecialchars($_SESSION['validated-lesson-bd']);
        updateLessons($id_user,$lesson_user);  

        // incrementation des kilometres +5 (3)
        $klm = (int) htmlspecialchars($_SESSION['validated-klm-bd']);
        $klm = $klm +5;
        $_SESSION['validated-klm-bd'] = $klm;
        updateKlm($id_user,$klm);
        
        // passage à l'index de leçon suivante
        // sans faire de mise à jour, puisque non encore validée
        $_SESSION['current-lesson'] = $lesson_user +1;

        
        // Ensuite nous testons si la dernière leçon de ce niveau est atteint
        // test de passage à un (level) niveau supperieur 
        if ($_SESSION['current-lesson'] > $_SESSION['endLesson-level']){  // endLesson-level provient de dashboard-lessons-logic.php
          
            // Incrémentation du niveau actuel
            $_SESSION['validated-level-bd']++;
            $levelCurrent = (int) htmlspecialchars($_SESSION['validated-level-bd']);
              
            // function de mise jour du (level) / base -> users
            updateLevel($id_user, $levelCurrent);

            // direction le dashboard level  
            header( "location: ../dashboard/dashboard-levels.php?level=".$levelCurrent) ; 

            
            } else { //sinon nous passons à la leçon suivante

              // direction la page winner de lessons      
              header("Location: winner.php?level=".(int) htmlspecialchars($_SESSION['validated-level-bd']));
            }

        }
    }
    
}  // sinon nous somme en cours de leçon !! ------------------------------------ //
  
    // vu que s'est un tableau 
    // init de l'index à zéro au premier passage
    $wordIndex = (int) ($_SESSION['wordIndex'] -1);
    
    // chargement de la ligne en cours de traitement
    $translations = $_SESSION['translations'];
    $_SESSION['source'] = $translations[$wordIndex]['source'];
    $_SESSION['reponse'] = $translations[$wordIndex]['reponse'];





