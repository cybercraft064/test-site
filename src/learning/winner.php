<?php
include('logic/winner-logic.php');
?>
<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
        <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/winner.css" rel="stylesheet" type="text/css">
        <title>Winner</title>
    </head> 
    <body>
        <div class="page-container">
              
            <header> 
                </header>
                
                <?php // Utilisation de la logic Parent / enfant : $typeLesson prends la valeur de (revision) ?>
                <section class="<?php echo $typeLesson; ?> ">  

                    <h1> winner </h1> 
                    <div class="pseudo"><?php echo htmlspecialchars($_SESSION['pseudo-user']); ?></div>
                    
                    <span class="next-lesson">
                        <h2>tu passes à la leçon <span class="lesson"><?php echo $lesson_next;?></span></h2>
                    </span>
                    
                    <span class="previous-lesson">
                        <h2>Bravo tu as bien révisé</h2>  
                    </span>

                    <div class="btn-center">
                    <a href="../dashboard/dashboard-lessons.php" class="next-button">Continuer !</a>
                    <a href="../auth/logout.php" class="close-session">Se déconnecter</a>
                    </div>

                </section> 

                <footer>
            </footer>      

        </div>
    </body>    
</html>

