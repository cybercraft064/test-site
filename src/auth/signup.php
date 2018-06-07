<?php 
    include('logic/signup-logic.php');
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
	<title>Signup</title>  
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
	<link href="../shared/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="./css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="page-container"> 
		<div class=login-filter>

            <div class="header">
				<a href="login.php"><img src="../../assets/img/logo-white.png" class="logo"></a>
       		</div>

		
            <div class="centered-container">

                <div class="title-container">
                    <div class="title-dash"></div>
                    <h2 class="title">Inscription</h2>
                    <div class="title-dash"></div>
                </div>  
                        
                <form action="signup.php" method="post">

                    <div class="input-wrapper <?= $bad_mail; ?>">
                        <div class="input-icon-box">
                            <i class="icon-mail"></i>
                        </div>
                        <input type="email" placeholder="<?= $NewMail; ?>" class="<?= $field_input_mail; ?>" name="newUserEmail" autocomplete="off" required />
                    </div>

                    <div class="input-wrapper">
                        <div class="input-icon-box">
                            <i class="icon-lock"></i>
                        </div>
                        <input type="text" placeholder="Pseudo" class="field-input" name="newUserPseudo" autocomplete="off" required />
                    </div>                     
                    
                    <div class="input-wrapper">
                        <div class="input-icon-box">
                            <i class="icon-lock"></i>
                        </div>
                        <input type="password" placeholder="Mot de passe" class="field-input" name="newUserPassword" autocomplete="off" required />
                    </div>  

                    <input type="submit" class="connect-button" value="Validation" />
                </form>					
                
            </div>

		</div>
    </div>
</body>
</html>