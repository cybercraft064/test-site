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

                <div class="source-container">
                    <?= $_SESSION["source"]; ?>
                </div>  
            
                <!-- $couleur change suivant la réponse -->
                <div class="target-container <?= $_SESSION['couleur-css']; ?>">
                
                    <form method="post" action="post/learning-post.php">                        
                        <input type="text" name="input-reply" class="in-reply" value="<?= htmlspecialchars($_SESSION['value']); ?>" autocomplete="off" autofocus />
                        <input type="submit" value="Envoyer" class="next-button <?= $_SESSION['nextButton-css']; ?>" />
                    </form>                  
                </div>

                <?php if($_SESSION['step'] === "check-answer" && $_SESSION['answer-reply'] === "incorrect")

                { ?>
                    <div class="correction-container"><?= $_SESSION["reponse"]; ?></div>
                <?php }
                
/*                 // décrémentation du compteur de lignes
                $_SESSION['wordIndex']--;  */
                ?> 

            </div> 

            <footer>
            <div class="pseudo"><?= $pseudo_user; ?></div>
            </footer>
        </div>     
        <script src="../shared/js/burger.js"> </script>   
    </body>
</html>
