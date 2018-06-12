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
        <div class="page-container" style="background-image: url('<?= $backgroundLevel.$levelCurrent.".jpg";?>')">
              
            <header> 
                </header>
                
                <?php // Utilisation de la logic Parent / enfant : $typeLesson prends la valeur de (revision) ou "" ?>
                <section class="<?= $typeLesson; ?>">  

                    <h1> winner </h1> 
                    <div class="pseudo"><?= htmlspecialchars($_SESSION['pseudo-user']); ?></div>

                    <div class="klm-winner">Tu viens de parcourrir 5 km de plus</div>
                    <div class="klm-revision">Tu viens de parcourir 2 km de plus</div>
                    

                    <span class="next-lesson">
                        <h2>tu passes à la leçon <span class="lesson"><?= $lesson_next;?></span></h2>
                    </span>

                    <span class="next-level">
                        <h2>tu passes au niveau  <span class="level"><?= $levelCurrent;?></span></h2>
                    </span>

                    
                    <span class="previous-lesson">
                        <h2>Bravo tu as bien révisé</h2>  

                    </span>

                    <div class="btn-center">
                    <a class="next-button" href="../dashboard/dashboard-lessons.php?level=<?= $levelCurrent;?>">Continuer</a>
                    <a href="../auth/logout.php" class="close-session">Se déconnecter</a>
                    </div>

                </section> 

                <footer>
            </footer>      

        </div>
    </body>    
</html>

