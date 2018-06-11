<?php
    session_start();
    include("../shared/bd-manager.php");

    // Variables de contexte
    $pseudo_user = $_SESSION['pseudo-user'];
    $idUser = (int) $_SESSION['id-user'];

    // test si s'est le premier passage dans home.php -> choix langue non efféctué
    if (isset($_GET['newLang'])) { 

        echo "apres test isset(newLang) : ".$_GET['newLang']." ----- ";

    //test si il sagit d'un nouvelle utilisateur ou changement de langage
    // cas d'appel par home.php avec -> ?newLang
    
    // Test si s'est un nouvelle utilisateur
    if (isset($_SESSION['new-user']) && $_SESSION['validated-klm-bd'] == 0 ) {

            $_SESSION['home-logic-new-user'] = true; // ------------------------------------------------------ DEBUG //
        
            $_SESSION['current-code-language'] = htmlspecialchars($_GET['newLang']); 
    
            // mise à jour du choix langage en bd
            updateLang($idUser, $_SESSION['current-code-language']);

            $_SESSION['home-logic-Create-lang'] = "ok"; // ----------------------------------------------- DEBUG //   

            unset($_SESSION['new-user']); 
            unset($_GET['newLang']);   
            $currentCodeLang = $_SESSION['current-code-language'];

            // direction le premier niveau
            header("Location: ../dashboard/dashboard-levels.php?level=1&lesson=0&lang=".$currentCodeLang);

        

         } elseif (!isset($_SESSION['new-user']) && !empty($_GET['newLang'])) {  // -------------  Test de Changement de langage en cours de session   ----------------------- //

          $_SESSION['home-logic-changement-Language-en-cours'] = "ok"; // ----------------------------------------------- DEBUG //  
       
          $currentCodeLang = $_SESSION['current-code-language'];
          // choix du language
          $newLang = htmlspecialchars($_GET['newLang']); 

          // Test si s'est une reprise ou un nouveau choix
          $checkLg = checkLang($idUser, $newLang);
            if ($checkLg == 1) { 

                $_SESSION['home-logic-valeurDe-$checkLg'] = $checkLg; // --------------------------------------------- DEBUG // 

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

                header("Location: ../dashboard/dashboard-lessons.php?level=".$validatedLevel."&lesson=".$validatedLesson."&lang=".$neWcurrentLanguage); 



             } else {  // s'est une nouvelle langue à aprendre //

                $_SESSION['home-logic-nouvelle-langue-apprendre'] = "ok"; // ------------------------------------------- DEBUG //
                
                $currentLanguage = $_SESSION['current-code-language'];
                $_SESSION['home-logic-valeur-de-$currentLanguage'] = $currentLanguage; // ------------------------------ DEBUG //

                $newLanguage = htmlspecialchars($_GET['newLang']);
                
                $_SESSION['home-logic-ajout-nouvelle-lang'] = "Ancienne lang: ".$currentLanguage." nouvelle: ".$newLanguage; // ------------  DEBUG //  

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

                header("Location: ../dashboard/dashboard-levels.php?level=1&lesson=0&lang=".$neWcurrentLanguage); 

        }          
      }        
   }

  echo " pas encore de choix Premier appel de Home.php ";
