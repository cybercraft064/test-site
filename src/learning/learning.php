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
            <a href="../dashboard/dashboard-lessons.php"><div class="close">x</div></a>
             <div class="back-lesson">                              
                <a href="dashboard-levels.php?level=<?= $_SESSION['validated-level-bd']; ?>">Niveaux</a>               
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

                <?php if($_SESSION['step'] === "check-answer" && $_SESSION['answer-reply'] === "incorrect"){ ?>
                <div class="correction-container">
                        <?= $_SESSION["reponse"]; ?> 
                    </div>
                </div>
                <?php } ?>    
        </div>    
    </body>
</html>
