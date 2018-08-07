<?php

include('logic/account-logic.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
    <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
    <link href="./css/account.css" rel="stylesheet" type="text/css">
</head> 
<body>
    <div class="page-container">
        <div class="page-filter">

        <header>
            <img class="logo" src="../../assets/img/logo-white.png" />
            <img src="../../assets/img/pays/<?= strtoupper($currentCodeLang); ?>.png" class="logo-language" />
            <div class="link-burger" id="link-burger">
                <div class="burger">
                    <div class="barre"></div>
                    <div class="barre"></div>
                    <div class="barre"></div>
                </div>
                <ul class="burger-menu">
                    <i class="burger-icon-level icon-level"></i>
                    <li><a href="../dashboard/dashboard-levels.php?level=<?= $_SESSION['validated-level-bd']; ?>">Niveaux</a></li>
                    <i class="burger-icon-badge icon-badge"></i>
                    <li><a href="../badge/badges.php">Tes Badges</a></li>
                    <i class="burger-icon-langue icon-langue"></i>
                    <li><a href="../language/choose-langues.php">Choix des Langues</a></li>
                    <div class="borderLine"></div>
                    <i class="burger-icon-exit icon-exit"></i>
                    <li><a href="logout.php">Déconnexion</a></li>
                </ul> 
            </div>       
        </header>

            <section class="txt-center-top Foswald ">
                <span class="line-txt"></span>
                <span class="fat-300"> Tes <span class="fat-400">Paramètres</span>
                <span class="line-txt"></span>
            </section>


        <section class="middle">

            <div class="left-block">
                <p class="titleLeft Foswald fat-300">INFOS <span class="fat-400">PERSO'</span></p>

                <form class="form-left" action="#" method="#">
                    <p><label class="label-form">E-mail</label></p>
                    <div class="input-wrappers-left">
                    <i class="input-icon-mail icon-mail"></i>
                        <input type="email" class="field-input" name="email" placeholder="<?= $email_user; ?>" disabled="TRUE" autocomplete="off" />
                    </div>

                    <p><label class="label-form">Code Parrainage</label></p>
                    <div class="input-wrappers-left-bottom">
                    <i class="input-icon-parrain icon-parrain"></i>
                       <input type="text" class="field-input" name="parrains" placeholder="<?= $code_parrain; ?>" />
                    </div>
                </form>

                <div class="block-bottom-left">
                    <span class="nb-parrains Fjalla fat-400"><?= $nb_parrains; ?></span>
                    <span class="logo-parrains"><img class="pic-parrains" src="../../assets/img/icons/parrains.png" /></span>
                    <span class="text-parrains Fraleway fat-400">Amis déja</br><span class="fat-700">parrainés</span></span>           
                </div>
            </div>



            <div class="right-block">

            <?php if (isset($_GET['checkPseudo']) && $_GET['checkPseudo'] == 1 ) {$check1 = "-good";} ?>

            <span>
                <form method="post" action="./post/account-post.php" class="form-right-pseudo" >

                    <p><label class="label-form ">Pseudo (Classement)</label></p>
                    <div class="input-wrappers-right">
                    <i class="input-icon-pseudo icon-pseudo"></i>
                        <input type="text" class="field-input<?= $check1; ?>" name="pseudo" placeholder="<?= $_SESSION['txt-pseudo']; ?>" autocomplete="off" />
                    </div>
                        <input type="submit" class="button-submit Fraleway fat-700" name="valPseudo" value="<?= $_SESSION['txt-button-pseudo']; ?>" />
                </form> 
            </span>

                <?php if (isset($_GET['checkPwd']) && !empty($_GET['checkPwd'])) {

                    switch ((int) $_GET['checkPwd']){
                        case 1:
                        $check2 = "new-check-pwd";
                        break;
                        case 2:
                        $check2 = "good-check-pwd";
                        break;
                        case 3:
                        $check2 = "bad-Check-pwd";
                        break;
                    }
                } ?>

            <span>
                <form  method="post" action="./post/account-post.php" class="form-right-pwd">

                    <p><label class="label-form ">Mot de passe</label></p>
                    <div class="input-wrappers-right-bottom">
                    <i class="input-icon-pwd icon-pwd "></i>
                        <input type="password" class="field-input-pwd <?= $check2; ?>" name="pwd" placeholder="<?= $_SESSION['txt-password']; ?>" autocomplete="off" />
                    </div>
                        <input type="submit" class="button-submit Fraleway fat-700" name="valPwd" value="<?= $_SESSION['txt-button-pwd']; ?>" />
                </form> 
            </span>    
            </div>

        </section>

        <footer>
        </footer>
     </div>           
    </div> 
    <script src="../shared/js/burger.js"> </script>
</body>