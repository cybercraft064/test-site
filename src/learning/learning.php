<?php
include('logic/learning-logic.php');
?>

<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
        <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/learning.css" rel="stylesheet" type="text/css">
        <title>learning</title>


    </head> 
    <body>
        <div class="page-container" style="background-image: url('<?= $backgroundLesson.$level.".jpg";?>')">
        
            

            <div class="header">
                    <span><img src="../../assets/img/logo-white.png" class="logo" /></span>
                    <img src="../../assets/img/pays/<?= strtoupper($_SESSION['current-code-language']); ?>.png" class="logo-language" />
                    <div class="link-burger" id="link-burger"> 
                        <div class="burger">
                            <div class="barre"></div>
                            <div class="barre"></div>
                            <div class="barre"></div>
                        </div>
                        <ul class="burger-menu">
                            <i class="burger-icon-level icon-level"></i>
                            <li><a href="../dashboard/dashboard-levels.php?level=<?= $_SESSION['validated-level-bd']; ?>">Niveaux</a></li>
                            <i class="burger-icon-badge icon-badge"></i>
                            <li><a href="../badge/badges.php">Tes Badges</a></li>
                            <i class="burger-icon-langue icon-langue"></i>
                            <li><a href="../language/choose-langues.php">Choix des Langues</a></li>
                            <div class="borderLine"></div>
                            <i class="burger-icon-user icon-user"></i>
                            <li><a href="../auth/start-account.php">Ton compte</a></li>
                            <i class="burger-icon-exit icon-exit"></i>
                            <li><a href="../auth/logout.php">déconnexion</a></li>
                        </ul>
                    </div>    
                </div>


            <div class="centered-container">

                <div class="directive-container">                    
                    Traduis l'expression
                </div>

<!--  cette partie passe en script js   -->

                <div class="source-container">
                    <p id="data_WordSource"></p>
                </div>  
            
                <!-- $couleur change suivant la réponse -->
                <div id="data_Couleur_Css" class="target-container">
                                          
                   <input type="text" 
                          id="data_InputReply" 
                          class="in-reply" 
                          autocomplete="off" 
                          value=""
                     />

                   <button id="data_NextButton_Css" 
                           class="next-button" >                          
                    </button>
                                                 
                </div>

                <!-- utilisé seulement en cas de mauvaise réponse -->
                    <div id="data_BadReply">
                        <p id="data_WordReply"></p>
                    </div>                    

            </div> 

            <footer>
            <div class="pseudo"><?= $pseudo_user; ?></div>
            </footer>
        </div> 

        <script>
            /* récupération d'un tableau contenant la leçon à faire */
            var translations = <?php echo json_encode($translations); ?>
            /* récupèration du numéro de leçon en cours */
            var currentLesson = <?php echo $curLesson; ?>
        </script>
        <script src="../shared/js/burger.js"> </script> 
        <script src="js/learning.js"></script>
    
    </body>
</html>
