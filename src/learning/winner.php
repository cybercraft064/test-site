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

            <section>    
                <h1> winner </h1> 
                <div class="pseudo"><?php echo htmlspecialchars($_SESSION['pseudo-user']); ?></div>
                <h2>tu passes au niveau  <span class="lesson"><?php echo $lesson_next;?></span></h2>
            </section>      

        </div>
    </body>    
</html>

