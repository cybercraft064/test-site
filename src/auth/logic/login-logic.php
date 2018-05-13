<?php
session_start();

// avant tout traitement verification si la session et active
// et redirection vers sont dashboard si s'est le cas.
if (isset($_SESSION['mail'])) {

     header('Location: ../../dashboard/dashboard-lessons.php'); 

} else {
    echo " ----- je suis passé par (login-logic.php) et la session est nouvelle ------- ";
}








