<?php

global $db;

// pour les tests [supprimer le controle try/Catch après]
try {
    $db = new PDO('mysql:host=localhost;dbname=speekoo;charset=utf8', 'root', '');
} catch (PDOException $e) {

}


// fonction de recherche utilisateur
// appelé par: login-post.php
function connexion($mail, $password) {
    global $db;

    //recherche si l'email existe (1)
    //je recupère la ligne complète
    $sql = "SELECT * FROM users WHERE mail_user = :mail";

    $resultats = $db->prepare($sql);
    $resultats->bindValue("mail", $mail, PDO::PARAM_STR);
    $resultats->execute();

    $user = $resultats->fetch();

    // mail ok 
    // contrôle si s'est le bon mot de passe (2)
    if ($user['password_user'] == $password) {
     
        // Password ok 
        // chargement des variables de session (3)
        $_SESSION['mail'] = $user['mail_user'];
        $_SESSION['id-user'] = $user['id_user'];
        $_SESSION['pseudo-user'] = $user['pseudo_user'];
        $_SESSION['level-user'] = $user['level_user'];
        $_SESSION['lesson-user'] = $user['lesson_user'];

        return "goodUser";
        
     // il y à une erreur quelconque
     // vérif si sa vient du mail   
    } else if ($user['mail_user'] == null) {
        return "badMail";

    // sinon se devrait être le password  
    } else 
        return "badPassword";
}//

// fonction verification si email non existant
// appelé par: signup-logic.php
function chekMail($mail){
    global $db;
    
    $sql = $db->prepare("SELECT COUNT(mail_user) FROM users WHERE mail_user = :mail");
    $sql->execute([':mail' => $mail]); // Remplace le bindValue. // pratique pour un seul lien.        
    return (bool) $sql->fetchColumn();// return False si aucune colonne n'est créé.

} //


//fonction de création d'utilisateur
function addUser($mail, $password, $pseudo){  
    global $db;
              
    $sql = "INSERT INTO users (mail_user,password_user,pseudo_user) VALUES (:mail,:pwd,:pseudo)";
    $req = $db->prepare($sql);        
    $req->bindValue('mail', $mail ,PDO::PARAM_STR);
    $req->bindValue('pwd', $password ,PDO::PARAM_STR);
    $req->bindValue('pseudo', $pseudo ,PDO::PARAM_STR);
    $req->execute();

    // recupération de l'ID 
   $_SESSION['id-user'] = $db->lastInsertId(); 

} //

