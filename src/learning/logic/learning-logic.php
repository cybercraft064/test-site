<?php

session_start();

$reponse = "";
$couleur = "";
$etat = "";

// boucle principal
if ($_SESSION['step'] === "checkAnswer") {

    $_SESSION['wordIndex']++;
}

// création d'une instance de PDO (gestion de la BD)
$db = new PDO('mysql:host=localhost;dbname=speekoo', 'root', '');

$req = $db->query('SELECT id, reponse, source FROM traduction');
$req->execute();
$result = $req->fetchAll();

// init des variables
$nextButton = "";

// Controle de la saisie
if (!empty($_POST["input-reply"]) && $_SESSION['step'] !== "checkAnswer") {

    $_SESSION['step'] = "checkAnswer";

    // variable de comparaison
    $reponse = htmlspecialchars($_POST["input-reply"]);

    if (strtolower($reponse) == strtolower($result[$_SESSION['wordIndex']]["reponse"])) {
        $couleur = "good-reply";
        $_SESSION['cptGoodReply']++;
        echo 'etat de la variable cptGoodReply: ' . $_SESSION['cptGoodReply'] . "<br />"; // debug

    } else {
        $couleur = "bad-reply";
        $etat = "bad-container";
        $nextButton = "nextButton";
        $_SESSION['cptBadReply']++;
        echo 'etat de la variable cptBaddReply: ' . $_SESSION['cptBadReply'] . "<br />"; // debug
    }

} else {

    $_SESSION['step'] = "userInput";

}
