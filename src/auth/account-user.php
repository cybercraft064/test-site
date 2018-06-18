<?php

include('./admin/account-user-admin.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
    <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
    <link href="./css/account.css" rel="stylesheet" type="text/css">
    <title>Speekoo-Home</title>
</head> 
<body>
    <div class="page-container">

        <header>
            <img class="logo" src="../../assets/img/logo-white.png" />
            <div class="link-burger" id="link-burger">
                <div class="burger">
                    <div class="barre"></div>
                    <div class="barre"></div>
                    <div class="barre"></div>
                </div>
                <ul class="burger-menu">
                    <li><a href="login.php">Connexion</a></li>
                    <li><a href="logout.php">Sortie de speekoo</a></li>
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

                <form class="form-left" action="#" method="post">
                    <p><label class="label-form">E-mail</label></p>
                    <div class="input-wrappers-left">
                    <i class="icon-mail input-icon"></i>
                        <input type="email" class="field-input" name="email" placeholder=<?= $email_user; ?> disabled="TRUE" autocomplete="off" />
                    </div>

                    <p><label class="label-form">Code Parrainage</label></p>
                    <div class="input-wrappers-left-bottom">
                       <input type="text" class="field-input" name="parrains" placeholder=<?= $parrain_user; ?> />
                    </div>
                </form>

                <div class="block-bottom-left">
                    <span class="nb-parrains Fjalla fat-400"><?= $nb_parrain; ?></span>
                    <span class="logo-parrains"><img class="pic-parrains" src="../../assets/img/icons/parrains.png" /></span>           
                </div>
            </div>

            <div class="right-block">
                <form class="form-right" action"#" method="post">
                    <p><label class="label-form ">Pseudo (Classement)</label></p>
                    <div class="input-wrappers-right">
                    <!-- <i class="icon-mail input-icon"></i> -->
                        <input type="text" class="field-input" name="pseudo" placeholder="<?= $pseudo_user; ?>" autocomplete="off" />
                    </div>
                        <input type="submit" class="button-submit Fraleway fat-700" name="pseudo" value="modifier mon pseudo" />
                </form>   

                <form class="form-right-bottom" action"#" method="post">
                    <p><label class="label-form ">Mot de passe</label></p>
                    <div class="input-wrappers-right-bottom">
                    <!-- <i class="icon-mail input-icon"></i> -->
                        <input type="password" class="field-input-pwd" name="pwd" placeholder="<?= $password_user; ?>" autocomplete="off" />
                    </div>
                        <input type="submit" class="button-submit Fraleway fat-700" name="pwd" value="changer mon mot de passe" />
                </form> 

            </div>

        </section>

        <footer>
        </footer>

    </div> <!-- Fin Page container -->
    <script src="../shared/js/burger.js"> </script>
</body>