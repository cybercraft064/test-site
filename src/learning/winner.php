<?php
session_start();

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
               <!-- <h1> winner </h1> -->
            </header>  

            <?php 
                   echo '<pre>';
                   print_r($_SESSION);
                   echo '</pre>';
            ?>       
            
            <footer>
                <div class="pseudo"><?php echo htmlspecialchars($_SESSION['pseudo-user']); ?></div>
            </footer>  

        </div>
    </body>    
</html>

