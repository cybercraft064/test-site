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
        <div class="page-container" style="background-image: url('<?php echo $backgroundLesson.$level.".jpg";?>')">
            <a href="../dashboard/dashboard-lessons.php"><div class="close">x</div></a>
             <div class="destroy-session">                              
                 <a href="close-session.php"><input type="submit" value="closeSession" /></a>               
            </div>
            <div class="centered-container">

                <div class="directive-container">                    
                    Traduis l'expression
                </div>

                <div class="source-container">
                    <?php echo $_SESSION["source"]; ?>
                </div>  
            
                <!-- $couleur change suivant la réponse -->
                <div class="target-container <?php echo $_SESSION['couleur-css']; ?>">
                
                    <form method="post" action="post/learning-post.php">                        
                        <input type="text" name="input-reply" class="in-reply" value="<?php echo htmlspecialchars($_SESSION['value']); ?>" autocomplete="off" autofocus />
                        <input type="submit" value="Envoyer" class="next-button <?php echo $_SESSION['nextButton-css']; ?>" />
                    </form>                  
                </div>

                <?php if($_SESSION['step'] === "checkAnswer" && $_SESSION['answerReply'] === "incorrect"){ ?>
                <div class="correction-container">
                        <?php echo $_SESSION["reponse"]; ?> 
                    </div>
                </div>
                <?php } ?>
        
        </div>    
    </body>
</html>
