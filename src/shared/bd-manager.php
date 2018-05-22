<?php
    if (!isset($_SESSION)) { session_start(); }


if (!isset($db))  {
global $db;

    $db = new PDO('mysql:host=localhost;dbname=speekoo;charset=utf8', 'root', '');

} //

// fonction de recherche utilisateur
// appelé par:  login-post.php
function checkUserConnexion($mail, $password) {
    global $db;

    //recherche si l'email existe (1)
    //je recupère la ligne complète
    $sql = "SELECT * FROM users WHERE mail_user = :mail";

    $req = $db->prepare($sql);
    $req->bindValue("mail", $mail, PDO::PARAM_STR);
    $req->execute();
    $users = $req->fetch();

    $req->closeCursor();
    // mail ok 
    // contrôle si s'est le bon mot de passe (2)
    if ($users['password_user'] == $password) {
     
        // Password ok 
        return $users;
    
     // vérif si l'erreur vient du mail   
    } else if ($users['mail_user'] == null) {
        return "badMail";

    // sinon se devrait être le password  
    } else { 
        return "badPassword";
    }
  }//


// fonction verification si email non existant
// appelé par:  signup-logic.php
    function chekMail($mail){
    global $db;
    
    $sql = $db->prepare("SELECT COUNT(mail_user) FROM users WHERE mail_user = :mail");
    $sql->execute([':mail' => $mail]); // Remplace le bindValue. // pratique pour un seul lien.        
    return (bool) $sql->fetchColumn();// return False si aucune colonne n'est créé.

} //


//fonction d'ajout d'un utilisateur
// appelé par:  signup-logic.php
function addUser($mail, $password, $pseudo){  
    global $db;
              
    $sql = "INSERT INTO users (mail_user,password_user,pseudo_user,level_user,lesson_user) VALUES (:mail,:pwd,:pseudo,1,0)";
    $req = $db->prepare($sql);        
    $req->bindValue('mail', $mail ,PDO::PARAM_STR);
    $req->bindValue('pwd', $password ,PDO::PARAM_STR);
    $req->bindValue('pseudo', $pseudo ,PDO::PARAM_STR);
    $req->execute(); 
    
    // recupération de l'ID 
    $id = $db->lastInsertId();
    
    // chargement de ses variables de session
    $sql = "SELECT * FROM users WHERE id_user = :id";
    
    $resultats = $db->prepare($sql);
    $resultats->bindValue("id", $id, PDO::PARAM_INT);
    $resultats->execute();
    $user1 = $resultats->fetch();
    $resultats->closeCursor();
    return $user1;
} //


//extraction des mots/phrases à traduir
// appelé par: learning-logic.php
function getTranslation($lesson_index){
    global $db;

    $sql = "SELECT * FROM traduction WHERE lesson_index = :lessonIndex" ;
    $req = $db->prepare($sql);
    $req->bindValue("lessonIndex",$lesson_index, PDO::PARAM_INT);
    $req->execute();
    $trad = $req->fetchAll();
    $req->closeCursor();
    return $trad;
} // 


// mise à jour de la dernière lecon validée
// appelé par: learning-logic.php
function updateLessons($id_user,$lesson_user){
    global $db;
    $sql = "UPDATE users SET lesson_user = :lesson_user WHERE id_user = :id_user";
    $upd = $db->prepare($sql);
    $upd->bindValue("id_user", $id_user, PDO::PARAM_INT);
    $upd->bindValue("lesson_user", $lesson_user, PDO::PARAM_INT);
    $upd->execute();
    $upd->closeCursor();
} //


// mise à jour du niveau validée
// appelé par: learning-logic.php
function updateLevel($id_user,$level_user){
    global $db;
    $sql = "UPDATE users SET level_user = :level_user WHERE id_user = :id_user";
    $upd = $db->prepare($sql);
    $upd->bindValue("id_user", $id_user, PDO::PARAM_INT);
    $upd->bindValue("level_user", $level_user, PDO::PARAM_INT);
    $upd->execute();
    $upd->closeCursor();
} //




