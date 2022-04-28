<?php
	require "/../include/db.php";

	$data = $_POST;
	//РЕГИСТРАЦИЯ
	if ( isset($data['do_signup']) ) {

		$errors = array();
		// if ( trim($data['login']) == '' ){
		// 	$errors[] = 'Введите логин';
		// }
		if ( trim($data['name']) == '' ){
			$errors[] = 'Введите Имя';
		}

		if ( trim($data['sur']) == '' ){
			$errors[] = 'Введите Фамилию';
		}

		if ( trim($data['pat']) == '' ){
			$errors[] = 'Введите Отчество';
		}

		if ( trim($data['number']) == '' ){
			$errors[] = 'Введите Телефон';
		}

		if ( trim($data['email']) == '' ){
			$errors[] = 'Введите Email';
		}

		if ( $data['password'] == '' ){
			$errors[] = 'Введите пароль!';
		}

		if ( $data['password_2'] != $data['password'] ){
			$errors[] = 'Повторный пароль введён не верно!';
		}
		// if ( R::count('users', "login = ?", array($data['login'])) > 0) {
		// 	$errors[] = 'ТАОКЙ ЛОГИН УЖЕ ЕСТЬ!';
		// }
		if ( R::count('sport', "email = ?", array($data['email'])) > 0) {
			$errors[] = 'ЕМАИЛ ТАКОЙ ЕСТЬ!';
		}
	//ЕСЛИ НЕТ ОШИБОК, РЕГАЕМ
	if ( empty($errors) ) {
		 $user = R::dispense('sport');
		$user->name = $data['name'];
		$user->surname = $data['sur'];
		$user->patronymic = $data['pat'];

				$user->email = $data['email'];
		$user->number = $data['number'];
		//$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		mysql_connect("127.0.0.1", "root", "") or die("Could not connect: " . mysql_error());
		mysql_select_db('testdb');
		$query = mysql_query("INSERT INTO `sport` (`tik_id`, `tik_type`, `name`, `surname`, `patronymic`, `email`, `number`, `password`) VALUES (NULL, NULL, '$user->name', '$user->surname', '$user->patronymic', '$user->email', '$user->number', '$user->password'); ") or die(mysql_error());
		echo $query;
		
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

		<div class="container" id="form">
			<div class="col-md-offset-2">
			<form action="signup.php" class="signup-form" method="POST">
			<div class="form-group row" >
			    <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
			    <div class="col-sm-6">
			      <input name="name" type="name" class="form-control" id="inputName" placeholder="Имя" value="<?php echo @$data['email']; ?>">
			    </div>
			  </div>
			<div class="form-group row" >
			    <label for="inputSur" class="col-sm-2 col-form-label">Фамилия</label>
			    <div class="col-sm-6">
			      <input name="sur" type="sur" class="form-control" id="inputSur" placeholder="Фамилия" value="<?php echo @$data['email']; ?>">
			    </div>
			  </div>
			  <div class="form-group row" >
			    <label for="inputPat" class="col-sm-2 col-form-label">Отчество</label>
			    <div class="col-sm-6">
			      <input name="pat" type="pat" class="form-control" id="inputPat" placeholder="Отчество" value="<?php echo @$data['email']; ?>">
			    </div>
			  </div>
			  <div class="form-group row" >
			    <label for="inputNumber" class="col-sm-2 col-form-label">Ваш номер телефона</label>
			    <div class="col-sm-6">
			      <input name="number" type="number" class="form-control" id="inputNumber" placeholder="+7(000)000-00-00" value="<?php echo @$data['email']; ?>">
			    </div>
			  </div>
			  <div class="form-group row" >
			    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-6">
			      <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo @$data['email']; ?>">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
			    <div class="col-sm-6">
			    	<input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo @$data['password']; ?>">
			    </div>
			  </div>
			  <div class="form-group row">
			  	<label for="inputPassword2" class="col-sm-2 col-form-label">Confirm Password</label>
			  	<div class="col-sm-6">
			  		<input name="password_2" type="password" class="form-control" id="inputPassword2" placeholder="Password" value="<?php echo @$data['password_2']; ?>">
			  	</div>
			  </div>
			  <div class="form-group row">
			    <div class="col-sm-6">
			      <button name="do_signup" type="submit" class="btn btn-primary">Sign in</button>
			    </div>
			  </div>
			</form>
			</div>
		</div>
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