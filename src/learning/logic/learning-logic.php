<?php
session_start();
// page include de learning.php

// init des Valeurs Variable
$backgroundLesson = '../../assets/img/bg-learning-';
$pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);
$currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);
$level = (int) ($_SESSION['current-level']); 

// recupération de l'id user 
$id_user = (int) ($_SESSION['id-user']);

// appel de la BD
include("../shared/bd-manager.php"); 


// les variables session s'ont initialisées dans ( start-learning.php )
if ($_SESSION['step'] === "userInput") {                                    /* Boucle principal  */
  
  // incrementation mot suivant et sert de compteur de ligne  
  $_SESSION['wordIndex']++; 
  
  if ($_SESSION['wordIndex'] > $_SESSION['Nbtranslation-InLesson']) {              /* test fin de la leçon */

    // traitements des annonces dans winner.php
    // si le numéro de la lesson en cours et inférieur ou égale de celui enregistré en base
    // s'est que nous sommes en révision
    if ($_SESSION['current-lesson'] <= $_SESSION['validated-lesson-bd']) {  /* test le cas d'une révision */

        $_SESSION['revision'] = true;
        $km = "";
        
        // incrementation des kilometres +2 en mode révision
        $km = (int) ($_SESSION['validated-km-bd']);
        $km = $km +2;
        $_SESSION['validated-km-bd'] = $km;
        updateKm($id_user,$km);


       } else { /* sinon nous validons cette leçon normalement  */

        $_SESSION['revision'] = false;
        $km = "";

        // Validation du numéro de leçon : table -> users_languages
    
        // incrementation du numéro de leçon 
        $_SESSION['validated-lesson-bd']++;
        $lesson_user = (int) ($_SESSION['validated-lesson-bd']);
        updateLessons($id_user,$lesson_user);  

        // incrementation des kilometres +5 : table -> users 
        $km = (int) ($_SESSION['validated-km-bd']);
        $km = $km +5;
        $_SESSION['validated-km-bd'] = $km;
        updateKm($id_user,$km);

       }
            // traitement collectif //
        
        // passage à l'index de leçon suivante
        // sans faire de mise à jour, puisque non encore validée
        $_SESSION['current-lesson'] = $lesson_user +1;
     
        // Ensuite nous testons si la dernière leçon de ce niveau est atteint
        // test de passage à un niveau supperieur 
        if ($_SESSION['current-lesson'] > $_SESSION['endLesson-level']) {  // endLesson-level provient de dashboard-lessons-logic.php

            // Incrémentation du niveau actuel
            $_SESSION['validated-level-bd']++;
            $levelCurrent = (int) ($_SESSION['validated-level-bd']);


            // pas d'incrémentation en bd si Mode Révision //
            if ($_SESSION['revision'] = FALSE) {    
                            
            // function de mise jour du niveau : base-> users_languages
            updateLevel($id_user, $levelCurrent);

            }     

            // direction le dashboard level  
            header( "location: ../dashboard/dashboard-levels.php?level=".$levelCurrent) ; 

            
            } else { //sinon nous passons à la leçon suivante

              // direction la page winner de lessons      
              header("Location: winner.php?level=".(int) ($_SESSION['current-level']));  //($_SESSION['validated-level-bd'])
            }

        } // fin test n'est pas une fin de lesson
    } // fin Step -> userInput
    
  // sinon nous somme en Step -> check-answer en cours de leçon !! ------------------------------------ //
  
    // vu que s'est un tableau 
    // init de l'index à zéro au premier passage
    $wordIndex = (int) ($_SESSION['wordIndex'] -1);
    

    $translations = $_SESSION['translations'];
    $_SESSION['source'] = $translations[$wordIndex]['source'];
    $_SESSION['reponse'] = $translations[$wordIndex]['reponse'];
    $_SESSION['bad-reply'] = "";

    // Récupération de ou des réponse(s) ----------------------------> Future
    /* $answersString = $translations[$wordIndex]['reponse'];
    $answersTbl = split(";", $answersString);
    $_SESSION['reponse'] = $answersTbl[0]; 
*/

