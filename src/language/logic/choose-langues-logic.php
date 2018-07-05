<?php
session_start();
// Include de choose-langues.php

// appel de la Bd
if (!include("../shared/bd-manager.php")) {include("../../shared/bd-manager.php");}

  
     // Variables de contexte
     $pseudo_user = htmlspecialchars($_SESSION['pseudo-user']);
     $idUser = (int) $_SESSION['id-user'];
     
     // Listes
     $flagsPays = ["GB","ES","DE","IT","CN","PT","JP","GR","TN","RU"];
     $namesPays = ["anglais","espagnol","allemand","italien","chinois","portugais","japonais","grec","tunisien","russe"];
   
     $nbLevelInBd = "";
     $nbLessonInBd = "";
     $flagActive = ""; 
     $newLang = "";
     $flag = "";

    // Début traitements logic
    // test si s'est le premier passage dans choose-langues-logic.php
    // -> appel par include
    if (isset($_GET['newLang']) && !empty($_GET['newLang'])) { 

        $newLang = htmlspecialchars($_GET['newLang']);

    // Test si s'est un nouvelle utilisateur
    if (isset($_SESSION['new-user']) && $_SESSION['validated-km-bd'] == 0 ) {

        $_SESSION['current-code-language'] = htmlspecialchars($_GET['newLang']); 

        // indication du choix langage en bd
        updateLang($idUser, $_SESSION['current-code-language']);


        unset($_SESSION['new-user']); 
        unset($_GET['newLang']);   
        $currentCodeLang = $_SESSION['current-code-language'];

        // direction le premier niveau
        header("Location: ../../dashboard/dashboard-levels.php?level=1&lesson=0&lang=".$currentCodeLang);

    

     } elseif (!isset($_SESSION['new-user']) && !empty($_GET['newLang'])) {  //  Test de Changement de langage en cours de session   //
  
      $currentCodeLang = $_SESSION['current-code-language'];
      // choix du language
      $newLang = htmlspecialchars($_GET['newLang']); 

      // Test si s'est une reprise ou un nouveau choix
      $checkLg = checkLang($idUser, $newLang);
        if ($checkLg == 1) { 

            // Mise à jour du statut current_lang : TB -> users_languages
            // la nouvelle langue devient current_lang = TRUE
            // et l'ancienne FALSE lol.
            updateStatusCurrentLang($idUser, $currentCodeLang, $newLang);
            
            // Rechargement des variables de session Table-> users_languages
            // les kilomètres ne sont pas impactés par le changement de langage
            $rep = loadLineUserTbUsersLanguages($idUser);
            $_SESSION['validated-level-bd'] = $rep['level_user'];
            $_SESSION['validated-lesson-bd'] = $rep['lesson_user'];    
                                                        
            // et création de la current-lesson
            // sachant que current-lesson doit avoir +1
            // puisque on travaille sur le niveau des leçons qui ne sont pas encore validées en Bd
            $_SESSION['current-lesson'] = ($rep['lesson_user'] +1);

            // nous passons au dashboard-lesson  (1)le niveau en cours  (2)la dernière leçon validée en bd  (3)le code langue
            $validatedLevel = (int) $_SESSION['validated-level-bd'];
            $validatedLesson = (int) $_SESSION['validated-lesson-bd'];
            $_SESSION['current-code-language'] = $newLang;
            $neWcurrentLanguage = $_SESSION['current-code-language'];

            unset($_GET['newLang']);

            header("Location: ../../dashboard/dashboard-lessons.php?level=".$validatedLevel."&lesson=".$validatedLesson."&lang=".$neWcurrentLanguage); 



         } else {  // s'est une nouvelle langue à aprendre //

            
            $currentLanguage = $_SESSION['current-code-language'];

            $newLanguage = htmlspecialchars($_GET['newLang']);
            

            // création en BD de la nouvelle langue indexé par l'id utilisateur
            $_SESSION['home-logic-id-user: '] = $idUser;
            createNewLang($idUser, $newLanguage);


            // Mise à jour du statut current_lang : TB -> users_languages
            // la nouvelle langue devient current_lang = TRUE
            updateStatusCurrentLang($idUser, $currentLanguage, $newLanguage);

            // Rechargement des variables de session Table-> users_languages
            // les kilomètres ne sont pas impactés par le changement de langage
            $vs = loadLineUserTbUsersLanguages($idUser);
            $_SESSION['validated-level-bd'] = $vs['level_user'];
            $_SESSION['validated-lesson-bd'] = $vs['lesson_user'];    
                                                        
            // et création de la current-lesson
            // sachant que current-lesson doit avoir +1
            // puisque on travaille sur le niveau des leçons qui ne sont pas encore validées en Bd
            $_SESSION['current-lesson'] = ($vs['lesson_user'] +1);

            // nous passons au dashboard-levels  (1)le niveau en cours  (2)la dernière leçon validée en bd  (3)le code langue
            $_SESSION['current-code-language'] = $newLang;
            $neWcurrentLanguage = $_SESSION['current-code-language'];

            // on fait les poussières
            unset($_GET['newLang']);

            header("Location: ../../dashboard/dashboard-levels.php?level=1&lesson=0&lang=".$neWcurrentLanguage); 

    } // nouvelle langue          
  } // test changement de langage       
} // test premier passage

// ------------------------------------------------------------- Partie toujours executé ------------------------------------------ //

       // Affichage des niveaus déjà effectués par langues
       // tb -> users_languages
       $alreadySelected = loadNbLevelForLanguages($idUser);
 
      
 

