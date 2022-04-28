<?php
	require "/../include/db.php";

	$data = $_POST;
	//ВХОД
	if ( isset($data['do_login']) ) {

		$errors = array();
		$user = R::findOne('sport' , 'email = ?', array($data['email']));
		//ПРОВЕРКА
		if ( $user ){
			if ( password_verify($data['password'], $user->password)){
				//ЛОГИНИМ
				$_SESSION['logged_user'] = $user;
				header('Location: /fitness/index.php');
			} else {
				$errors[] = 'Пароль неверный';
			}
		} else {
			$errors[] = 'Пользователь не найден';
		}
		// if ( trim($data['login']) == '' ){
		// 	$errors[] = 'Введите логин';
		// }

		// if ( trim($data['email']) == '' ){
		// 	$errors[] = 'Введите Email';
		// }

		// if ( $data['password'] == '' ){
		// 	$errors[] = 'Введите пароль!';
		// }

		// if ( $data['password_2'] != $data['password'] ){
		// 	$errors[] = 'Повторный пароль введён не верно!';
		// }
		// if ( R::count('sport', "login = ?", array($data['login'])) > 0) {
		// 	$errors[] = 'ТАОКЙ ЛОГИН УЖЕ ЕСТЬ!';
		// }
		if ( R::count('sport', "email = ?", array($data['email'])) > 0) {
			$errors[] = 'ЕМАИЛ ТАКОЙ ЕСТЬ!';
		}
	//ЕСЛИ НЕТ ОШИБОК, РЕГАЕМ
	if ( empty($errors) ) {
		// $user = R::dispense('users');
		// $user->login = $data['login'];
		// //$user->email = $data['email'];
		// $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		// R::store($user);
		echo "успешно";

	} else {
		echo '<div styles="color: red;">'.array_shift($errors).'</div><hr>';
	}

	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">

		<title>FITNESS</title>

		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />

		<!-- Bootstrap grid CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Custom styles for this template -->
		<link href="../css/cabinet.css" rel="stylesheet">

		<link rel="stylesheet" href="css/icomoon.css">

		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	</head>

	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a id="logo" href="../index.php" class="navbar-brand">Fit<span>ness</span></a>
				</div>
				<div class="navbar-collapse">
					<ui class="nav navbar-nav navbar-right">
						<li><a href="../index.php">Главная</a></li>
						<li><a href="../trainer.php">Тренера</a></li>
						<li><a href="../contact.php">Контакты</a></li>
					</ui>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</div>
		<!-- <div id="form">
			<div class="container">
				<div class="row centered">
					<div class="col-md-8 col-md-offset-2">

						<form action="login.php" class="signup-form" method="POST">
						
						<div class="form-group">
							<label>Логин:</label>
							<input type="text" name="login" value="<?php echo @$data['login']; ?>"> 
						</div>

						<div class="form-group">
							<label>Email:</label>
							<input type="email" name="email" value="<?php echo @$data['email']; ?>"> 
						</div>

						<div class="form-group">
							<label>Пароль:</label>
							<input type="password" name="password" value="<?php echo @$data['password']; ?>"> 
						</div>

						<div class="form-group">
							<label>Логин:</label>
							<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"> 
						</div>

						<div class="form-group">
							<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Register" name="do_signup">
						</div>
					
						</form>

					</div>
				</div>
			</div>
		</div> -->
	<div class="container" id="form">
		<form action="login.php" class="signup-form" method="POST">
		  <div class="form-group row" >
		    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo @$data['email']; ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
		    <div class="col-sm-10">
		      <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo @$data['password']; ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button name="do_login" type="submit" class="btn btn-primary">Login</button>
		    </div>
		    <div class="col-sm-2">
		      <button type="submit" id="regist" class="btn btn-primary"><a href="signup.php">Register</a></button>
		    </div>
		  </div>
		</form>
	</div>
		
		<!-- /.signup-form -->
		<!-- /.navbar navavbar-inverse navbar-fixed-top -->
		<!-- Bootstrap core JavaScript ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-3.2.1.slim.min.js"><\/script>')</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>	