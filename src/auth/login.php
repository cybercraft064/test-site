<?php
include('logic/login-logic.php');

// appelé par index.php
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
	<title>Login</title>  
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
	<link href="../shared/css/reset.css" rel="stylesheet" type="text/css"/>
	<link href="./css/login.css" rel="stylesheet" type="text/css"/>

</head>
<body>
    <div class="page-container"> 
		<div class="page-filter">

			<div class="header">		
			<a href=""><img src="../../assets/img/logo-white.png" class="logo"></a>

				<div class="header-right">
					<ul>
						<a href="signup.php"><li> S'inscrire </li></a>
					</ul>
				</div>
       		</div>
		
			<div class="centered-container">

				<div class="title-container">
					<div class="title-dash"></div>
					<h2 class="title">Se Connecter</h2>
					<div class="title-dash"></div>
				</div>

				<a href="https://www.facebook.com/v2.8/dialog/oauth?client_id=1040235056098807&amp;state=3061a00f07e92eff2587492ada0d8353&amp;response_type=code&amp;sdk=php-sdk-5.6.1&amp;redirect_uri=https%3A%2F%2Fspeekoo.com%2Ffb-callback&amp;scope=email">
                <div class="fb-button">
                    <div class="icons"><i class="icon-facebook"></i></div>
                    <div class="button-separator"></div>
                    <div class="fb-button-text">Connecte-toi avec Facebook</div>
                </div>
				</a>
				
				<div class="choice-separator-container">
               		<div class="separator"></div>
                	<div class="choice-text">OU</div>
               		<div class="separator"></div>
				</div>
				
					<form action="./post/login-post.php" method="post">

						<div class="input-wrapper <?= $bad_mail; ?>">
							<div class="icons input-icon-box">
								<i class="icon-mail"></i>
							</div>
							<input type="email" placeholder="<?= $userMail; ?>" class="<?= $field_input_mail; ?>" name="mail" autocomplete="on" required />
						</div>
					
						<div class="input-wrapper <?= $bad_pwd; ?>">
							<div class="icons input-icon-box">
								<i class="icon-lock"></i>
							</div>
							<input type="password" placeholder="<?= $userPassword; ?>" class="<?= $field_input_pwd; ?>" name="password" autocomplete="off" required />
						</div>
						
						<input type="submit" class="connect-button" value="Connecte-toi !">
					</form>										

			</div>

		</div>
    </div>
</body>
</html>