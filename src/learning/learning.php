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
        <div class="page-container">
            <a href="../dashboard/dashboard-lessons.php"><div class="close">x</div></a>
            <div class="centered-container">

                <div class="directive-container">                    
                    Traduis l'expression
                </div>

                <div class="source-container">
                    <?php echo $result[$_SESSION['wordIndex']]["source"]; ?>
                </div>  
            
                <!-- $couleur change suivant la réponse -->
                <div class="target-container <?php echo $couleur; ?>">
                    <form method="post" action="learning.php">
                        
                        <input type="text" name="input-reply" class="in-reply" value="<?php echo $reponse; ?>" autocomplete="off" autofocus />
                        <input type="submit" value="Envoyer" class="next-button <?php echo $nextButton; ?>" />
                    </form>                  
                </div>

                <div class="correction-container <?php echo $etat; ?>">
                        <?php echo $result[$_SESSION['wordIndex']]["reponse"]; ?> 
                    </div>
                </div>
        
            <div class="destroy-session">
                               
                <a href="close-session.php"><input type="submit" value="closeSession" /></a>
                
            </div>
        </div>    
    </body>
</html>
