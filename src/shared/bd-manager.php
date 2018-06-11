<?php
    if (!isset($_SESSION)) { session_start(); }
    
    
    if (!isset($db))  {
        global $db;
        
        $db = new PDO('mysql:host=localhost;dbname=speekoo;charset=utf8', 'root', '');
        
    } //
    
    //fonction création d'un utilisateur (1)
    // appelé par:  signup-logic.php
    function createUser($mail, $password, $pseudo){  
        global $db;
        
        $sql = "INSERT INTO users (mail_user,password_user,pseudo_user,klm_user) VALUES (:mail,:pwd,:pseudo,0)";
        $req = $db->prepare($sql);        
        $req->bindValue(':mail', $mail ,PDO::PARAM_STR);
        $req->bindValue(':pwd', $password ,PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo ,PDO::PARAM_STR);
        $req->execute(); 
        $req->closeCursor();
        
        // recupération de l'ID 
        $id = $db->lastInsertId();
        $sql="";

        // création du lien avec la table --> users_languages (2)
        $sql = "INSERT INTO users_languages (user_idl)
                VALUES (:user_idl)";
                
        $seq = $db->prepare($sql);
        $seq->bindValue(":user_idl", $id, PDO::PARAM_INT);
        $seq->execute();
        $seq->closeCursor();
        $sql="";

        // chargement de ses variables de session (3)
        $sql = "SELECT *
        FROM users, users_languages
        WHERE users.id_user = users_languages.user_idl
        AND users.id_user =:id";  

        $req = $db->prepare($sql);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $user1 = $req->fetch();
        $req->closeCursor();
        return $user1;
    } //


// connexion utilisateur
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
            
        // Password ok transfert du tableau de données
        return $users;
        
        // vérif si l'erreur vient du mail   
    } else if ($users['mail_user'] == null) {
        return "badMail";
        
        // sinon se devrait être le password  
    } else { 
        return "badPassword";
    }
}//

// récupération des données de la Table-> users_languages (3)
function loadLineUserTbUsersLanguages($id){
    global $db;
    $sql ="SELECT * FROM users_languages
    WHERE user_idl = :id_user
    AND current_lang = 1";
    $rep = $db->prepare($sql);
    $rep->bindValue(":id_user", $id, PDO::PARAM_INT);
    $rep->execute();
    $line = $rep->fetch();
    $rep->closeCursor();
    return $line;
} //

// vérification si email non existant
// appelé par:  signup-logic.php
function chekMail($mail){
    global $db;   
    $sql = $db->prepare("SELECT COUNT(mail_user) FROM users WHERE mail_user = :mail");
    $sql->execute([':mail' => $mail]); // Remplace le bindValue. // pratique pour un seul lien.        
    return (bool) $sql->fetchColumn();// return False si aucune colonne n'est créé.
    
} //


// extraction des mots/phrases à traduir
// appelé par: learning-logic.php                     
function getTranslation($code_lang,$lesson_index){
    global $db;
    $sql = "SELECT * FROM traduction 
    WHERE code_lang = :code_lang 
    AND lesson_index = :lessonIndex";

    $req = $db->prepare($sql);
    $req->bindValue(":code_lang",$code_lang, PDO::PARAM_INT);
    $req->bindValue(":lessonIndex",$lesson_index, PDO::PARAM_INT);
    $req->execute();
    $trad = $req->fetchAll();
    $req->closeCursor();
    return $trad;
} // 


// mise à jour de la dernière lecon validée
// appelé par: learning-logic.php
function updateLessons($id_user,$lesson_user){
    global $db;
    $sql = "UPDATE users_languages SET lesson_user = :lesson_user WHERE user_idl = :id_user";
    $upd = $db->prepare($sql);
    $upd->bindValue(":id_user", $id_user, PDO::PARAM_INT);
    $upd->bindValue(":lesson_user", $lesson_user, PDO::PARAM_INT);
    $upd->execute();
    $upd->closeCursor();
} //

// mise à jour du niveau validée
// appelé par: learning-logic.php
function updateLevel($id_user,$level_user){
    global $db;
    $sql = "UPDATE users_languages SET level_user = :level_user WHERE user_idl = :id_user";
    $upd = $db->prepare($sql);
    $upd->bindValue(":id_user", $id_user, PDO::PARAM_INT);
    $upd->bindValue(":level_user", $level_user, PDO::PARAM_INT);
    $upd->execute();
    $upd->closeCursor();
} //

// mise à jour des kilomètres effectués
function updateKlm($id_user,$klm_user) {
    global $db;
    $sql = "UPDATE users SET klm_user = :klm_user WHERE id_user = :id_user";
    $upd = $db->prepare($sql);
    $upd->bindValue(":id_user", $id_user, PDO::PARAM_INT);
    $upd->bindValue(":klm_user", $klm_user, PDO::PARAM_INT);
    $upd->execute();
    $upd->closeCursor();
} //

// vérification si ce langage existe pour cette utilisateur
// appelé par: dashboard-levels-logic.php
function checkLang(int $id_user, int $cd_lang){
    global $db;   
    $sql = "SELECT COUNT(code_language) FROM users_languages WHERE user_idl = :id_user AND code_language = :cd_lang";
    $chk = $db->prepare($sql);
    $chk->bindValue(":id_user", $id_user, PDO::PARAM_INT);
    $chk->bindValue(":cd_lang", $cd_lang, PDO::PARAM_STR);
    $chk->execute();         
    return (bool) $chk->fetchColumn();// return False si aucune colonne n'est créé.
    
} //

// utilisé par home-logic.php
function updateLang($id_user, $cd_lang) {
    global $db;
    $sql = "UPDATE users_languages SET code_language = :cd_lang, current_lang = :cur_lang WHERE user_idl = :id_user";
    $upd = $db->prepare($sql);
    $upd->bindValue(":id_user", $id_user, PDO::PARAM_INT);
    $upd->bindValue(":cd_lang", $cd_lang, PDO::PARAM_STR);
    $upd->bindValue(":cur_lang", TRUE, PDO::PARAM_BOOL);
    $upd->execute();
    $upd->closeCursor(); 
} //


