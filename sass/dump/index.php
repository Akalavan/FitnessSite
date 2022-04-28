<?php
	require "include/db.php";

	//$trainer['id'] = 1;
	if ( isset($_SESSION['logged_user']) ) {
		$login = $_SESSION['logged_user']->login;
	}
 //    $name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
	// echo $name->name_trainer;
	// echo "$user"
	// $data = $_GET['name'];
	// $plan = $POST['select_plan'];
	// if ( isset($data) ) {
	// 	if( isset($_SESSION['logged_user']) ) {
	// 		echo "Покупка";
	// 	} else {
	// 		echo 
	// 		"";
	// 	}
	// }
	function dump($what){
		echo "<pre>"; print_r($what);echo "</pre>";
	}
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
	if ( isset($data['buy']) ) {
		echo $data['buy'];
		$value = $data['buy'];
		$person = $_SESSION['logged_user']->tik_id;
		echo $person;
		dump($_SESSION);
		R::exec( 'UPDATE `sport` SET `tik_type` = ? WHERE `tik_id` = ?' , [$value, $person]);
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

		<link rel="shortcut icon" href="favicon.ico">
		<!-- Custom styles for this template -->
		<link href="css/main.css" rel="stylesheet">

		<link rel="stylesheet" href="css/icomoon.css">

		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
		
		<link href="/css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
		 <script src="/js/jquery-1.8.3.js" type="text/javascript"></script>
		 <script src="/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>

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
					<a id="logo" href="index.php" class="navbar-brand">Fit<span>ness</span></a>
				</div>
				<!-- /.navbar-header -->
				<div class="navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#">Главная</a></li>
						<li><a href="schedule.php?name=*">Расписание</a></li>
						<li><a href="trainer.php">Тренера</a></li>
						<li><a href="#">О сайте</a></li>
						<li><a href="contact.php">Контакты</a></li>
						<?php if( isset($_SESSION['logged_user']) ) : ?>
						<li><a href="cabinet/personalCabinet.php">Личный кабинет</a></li>
						<?php else : ?>
						<li><a href="cabinet/login.php">Авторизоваться</a></li>
						<?php endif; ?>
					</ul>
					<!-- /.nav -->
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.navbar -->
		<div id="headerwrap">
			<div class="container">
				<div class="row centered">
					<div  class="col-lg-8 col-lg-offset-2">
						<div class="heading-section">
							<h2>Расписание занятий</h2>
						</div>
					</div>
					<!-- /.col-lg-8 col-lg-ofsset-2 -->
				</div>
				<!-- /.row centered -->
				<div class="row animate-box centered">
					<div class="col-lg-11 col-sm-6 col-lg-offset-1">
						<ul class="schedule">
							<li><a href="#" class="active" data-sched="sunday">Воскресенье</a></li>
							<li><a href="#" data-sched="monday">Понедельник</a></li>
							<li><a href="#" data-sched="tuesday">Вторник</a></li>
							<li><a href="#" data-sched="wednesday">Среда</a></li>
							<li><a href="#" data-sched="thursday">Четверг</a></li>
							<li><a href="#" data-sched="friday">Пятница</a></li>
							<li><a href="#" data-sched="saturday">Суббота</a></li>
						</ul>
						<!-- /.schedule -->
					</div>
					<!-- /.col-lg-10 col-lg-offset-1 -->
					<div class="row centered">
						<div class="col-md-12 schedule-container">
							<div class="schedule-content active" data-day="sunday">
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-dumbell.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бодибилдинг</h3>
										<span>Джефф Кавальер</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-yoga.svg" alt="Cycling">
										<small>07:00-08:00</small>
										<h3>Йога</h3>
										<span>Плехов Павел</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-cycling.svg" alt="Cycling">
										<small>08:00-09:00</small>
										<h3>Велоспорт</h3>
										<span>Целищева Юлия</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-boxing.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бокс</h3>
										<span>Вагин Михаил</span>
									</div>
								</div>
							</div>
							<!-- /.schedule-content active -->
							<div class="schedule-content" data-day="monday">
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-boxing.svg" alt="">
										<small>06:00-07:00</small>
										<h3>Бокс</h3>
										<span>Вагин Михаил</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-dumbell.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бодибилдинг</h3>
										<span>Джефф Кавальер</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-cycling.svg" alt="Cycling">
										<small>08:00-09:00</small>
										<h3>Велоспорт</h3>
										<span>Целищева Юлия</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-yoga.svg" alt="">
										<small>07:00-08:00</small>
										<h3>Йога</h3>
										<span>Плехов Павел</span>
									</div>
								</div>
							</div>
							<!-- END sched-content -->
							<div class="schedule-content" data-day="tuesday">
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-cycling.svg" alt="Cycling">
										<small>08:00-09:00</small>
										<h3>Велоспорт</h3>
										<span>Целищева Юлия</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-yoga.svg" alt="">
										<small>07:00-08:00</small>
										<h3>Йога</h3>
										<span>Плехов Павел</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-dumbell.svg" alt="">
										<small>06:00-07:00</small>
										<h3>Бодибилдинг</h3>
										<span>Джефф Кавальер</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-boxing.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бокс</h3>
										<span>Вагин Михаил</span>
									</div>
								</div>
							</div>
							<!-- END sched-content -->

							<div class="schedule-content" data-day="wednesday">
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-yoga.svg" alt="">
										<small>07:00-08:00</small>
										<h3>Йога</h3>
										<span>Плехов Павел</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-boxing.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бокс</h3>
										<span>Вагин Михаил</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-cycling.svg" alt="Cycling">
										<small>08:00-09:00</small>
										<h3>Велоспорт</h3>
										<span>Целищева Юлия</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-dumbell.svg" alt="">
										<small>06:00-07:00</small>
										<h3>Бодибилдинг</h3>
										<span>Джефф Кавальер</span>
									</div>
								</div>
							</div>
							<!-- END sched-content -->

							<div class="schedule-content" data-day="thursday">
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-boxing.svg" alt="">
										<small>06:00-07:00</small>
										<h3>Бокс</h3>
										<span>Вагин Михаил</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-dumbell.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бодибилдинг</h3>
										<span>Джефф Кавальер</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-cycling.svg" alt="Cycling">
										<small>08:00-09:00</small>
										<h3>Велоспорт</h3>
										<span>Целищева Юлия</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-yoga.svg" alt="">
										<small>07:00-08:00</small>
										<h3>Йога</h3>
										<span>Плехов Павел</span>
									</div>
								</div>
							</div>
							<!-- END sched-content -->

							<div class="schedule-content" data-day="friday">
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-dumbell.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бодибилдинг</h3>
										<span>Джефф Кавальер</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-yoga.svg" alt="Cycling">
										<small>07:00-08:00</small>
										<h3>Йога</h3>
										<span>Плехов Павел</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-cycling.svg" alt="Cycling">
										<small>08:00-09:00</small>
										<h3>Велоспорт</h3>
										<span>Целищева Юлия</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-boxing.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бокс</h3>
										<span>Вагин Михаил</span>
									</div>
								</div>
							</div>
							<!-- END sched-content -->

							<div class="schedule-content" data-day="saturday">
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-yoga.svg" alt="">
										<small>07:00-08:00</small>
										<h3>Йога</h3>
										<span>Плехов Павел</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-boxing.svg" alt="Cycling">
										<small>06:00-07:00</small>
										<h3>Бокс</h3>
										<span>Вагин Михаил</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-cycling.svg" alt="Cycling">
										<small>08:00-09:00</small>
										<h3>Велоспорт</h3>
										<span>Целищева Юлия</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="program program-schedule">
										<img src="images/fit-dumbell.svg" alt="">
										<small>06:00-07:00</small>
										<h3>Бодибилдинг</h3>
										<span>Джефф Кавальер</span>
									</div>
								</div>
							</div>
							<!-- END sched-content -->
						</div>
						<!-- /.col-md-12 schedule-container -->
					</div>
					<!-- /.row centered -->
				</div>
				<!-- /.row animate-box -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.headewrap -->

		<div id="programs-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="heading-section centered animate-box">
							<h2>Программы</h2>
						</div>
					</div>
					<!-- /.col-md-8 col-md-offset-2 -->
				</div>
				<div class="row centered">
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="images/fit-dumbell.svg" alt="Cycling">
							<h3>Body Combat</h3>
							<p id="overlay-section">Часовая аэробная тренировка, которая приведет ваше тело в форму в рекордно короткие сроки.</p>
							<!-- <span><a href="#" class="btn btn-default">Join Now</a></span> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="images/fit-yoga.svg" alt="">
							<h3 >Yoga Programs</h3>
							<p id="overlay-section">Помедитируй.</p>
							<!-- <span><a href="#" class="btn btn-default">Join Now</a></span> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="images/fit-cycling.svg" alt="">
							<h3>Cycling Program</h3>
							<p id="overlay-section">Перемещение с использованием велосипедов, движимому мускульной силой человека.</p>
							<!-- <span><a href="#" class="btn btn-default">Join Now</a></span> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="images/fit-boxing.svg" alt="Cycling">
							<h3>Boxing Fitness</h3>
							<p id="overlay-section">Контактный вид спорта, единоборство, в котором спортсмены наносят друг другу удары кулаками в специальных перчатках.</p>
							<!-- <span><a href="#" class="btn btn-default">Join Now</a></span> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="images/fit-swimming.svg" alt="">
							<h3>Swimming Program</h3>
							<p id="overlay-section">Вид спорта или спортивная дисциплина, заключающаяся в преодолении вплавь за наименьшее время различных дистанций.</p>
							<!-- <span><a href="#" class="btn btn-default">Join Now</a></span> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="images/fit-massage.svg" alt="">
							<h3>Massage</h3>
							<p id="overlay-section">Совокупность приёмов механического и рефлекторного воздействия на ткани туловища.</p>
							<!-- <span><a href="#" class="btn btn-default">Join Now</a></span> -->
						</div>
					</div>
				</div>
				<!-- /.row centered -->
			</div>
		</div>
		<!-- /.programs-section -->
		<div id="team-section" class="lightgray-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="heading-section centered animate-box">
							<h2>Познакомьтесь С Нашими Тренерами</h2>
							<p>У нас только лучшие тренера.</p>
						</div>
					</div>
				</div>
				<div class="row centered">
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/Джефф.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3><?php
										$data['email'] = 6;
										$name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
										echo $name->name_trainer." ".$name->surname_trainer ?></h3>
									<span>Body Trainer</span>
									<p>Научит всему.</p>
									<p class="fh5co-social-icons">
										<a href="#"><i class="icon-twitter-with-circle"></i></a>
										<a href="#"><i class="icon-facebook-with-circle"></i></a>
										<a href="#"><i class="icon-instagram-with-circle"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/Арсений.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3><?php
										$data['email'] = 1;
										$name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
										echo $name->surname_trainer." ".$name->name_trainer ?></h3>
									<span>Swimming Trainer</span>
									<p>Самый чёткий тренер</p>
									<p class="fh5co-social-icons">
										<a href="#"><i class="icon-twitter-with-circle"></i></a>
										<a href="#"><i class="icon-facebook-with-circle"></i></a>
										<a href="#"><i class="icon-instagram-with-circle"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/Михаил.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3><?php
										$data['email'] = 2;
										$name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
										echo $name->surname_trainer." ".$name->name_trainer ?></h3>
									<span>Boxing Fitness</span>
									<p>Тренер по боксу.</p>
									<p class="fh5co-social-icons">
										<a href="#"><i class="icon-twitter-with-circle"></i></a>
										<a href="#"><i class="icon-facebook-with-circle"></i></a>
										<a href="#"><i class="icon-instagram-with-circle"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/София.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3><?php
										$data['email'] = 3;
										$name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
										echo $name->surname_trainer." ".$name->name_trainer ?></h3>
									<span>Body Trainer</span>
									<p>Накачает.</p>
									<p class="fh5co-social-icons">
										<a href="#"><i class="icon-twitter-with-circle"></i></a>
										<a href="#"><i class="icon-facebook-with-circle"></i></a>
										<a href="#"><i class="icon-instagram-with-circle"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/Юлия.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3><?php
										$data['email'] = 4;
										$name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
										echo $name->surname_trainer." ".$name->name_trainer ?></h3>
									<span>Cycling coach</span>
									<p>Лучший ездок.</p>
									<p class="fh5co-social-icons">
										<a href="#"><i class="icon-twitter-with-circle"></i></a>
										<a href="#"><i class="icon-facebook-with-circle"></i></a>
										<a href="#"><i class="icon-instagram-with-circle"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/Павел.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3><?php
										$data['email'] = 5;
										$name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
										echo $name->surname_trainer." ".$name->name_trainer ?></h3>
									<span>Yoga Programs</span>
									<p>Научит правильно медитировать</p>
									<p class="fh5co-social-icons">
										<a href="#"><i class="icon-twitter-with-circle"></i></a>
										<a href="#"><i class="icon-facebook-with-circle"></i></a>
										<a href="#"><i class="icon-instagram-with-circle"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<!-- /.lightgray-section -->
		<div id="pricing-section" class="pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="heading-section centered animate-box">
							<h2>Стоимость абонементов</h2>
							<p>Абонементы по лучшим ценам.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="pricing centered">
						<div class="col-md-3 animate-box" >
							<div class="price-box animate-box">
								<h2 class="pricing-plan">Начальный</h2>
								<div class="price"><sup class="currency">₽</sup>555<small>/месяц</small></div>
								<p class="description">Для начинающего</p>
								<ul class="classes">
									<li>15 Кардио-Классы</li>
									<li class="color">10 Урок Плавания</li>
									<li>10 Занятия Йогой</li>
									<li class="color">20 Аэробика</li>
									<li>10 Классы Zumba </li>
									<li class="color">5 Массаж</li>
									<li>10 бодибилдинг</li>
								</ul>
								<?php if( !isset($_SESSION['logged_user']) ) : ?>
								<button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#firstModal">Select Plan</button>
							    <?php else : ?>
							    <button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#secondModal">Select Plan</button>
							    <?php endif; ?>
							</div>
						</div>
						<div class="col-md-3 animate-box">
							<div class="price-box animate-box">
								<h2 class="pricing-plan">Основной</h2>
								<div class="price"><sup class="currency">₽</sup>1666<small>/месяц</small></div>
								<p align="center" class="description">Хороший набор</p>
								<ul class="classes">
									<li>15 Кардио-Классы</li>
									<li class="color">10 Урок Плавания</li>
									<li>10 Занятия Йогой</li>
									<li class="color">20 Аэробика</li>
									<li>10 Классы Zumba </li>
									<li class="color">5 Массаж</li>
									<li>10 бодибилдинг</li>
								</ul>
								<?php if( !isset($_SESSION['logged_user']) ) : ?>
								<button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#firstModal">Select Plan</button>
							    <?php else : ?>
							    <button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#secondModal">Select Plan</button>
							    <?php endif; ?>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="price-box animate-box popular">
								<h2 class="pricing-plan pricing-plan-offer">Pro <span>Наилучшее</span></h2>
								<div class="price"><sup class="currency">₽</sup>4555<small>/месяц</small></div>
								<p class="description">Лучще не найдёте</p>
								<ul class="classes">
									<li>15 Кардио-Классы</li>
									<li class="color">10 Урок Плавания</li>
									<li>10 Занятия Йогой</li>
									<li class="color">20 Аэробика</li>
									<li>10 Классы Zumba </li>
									<li class="color">5 Массаж</li>
									<li>10 бодибилдинг</li>
								</ul>
								<?php if( !isset($_SESSION['logged_user']) ) : ?>
								<button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#firstModal">Select Plan</button>
							    <?php else : ?>
							    <button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#secondModal">Select Plan<?php $price = 4555 ?></button>
							    <?php endif; ?>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="price-box animate-box">
								<h2 class="pricing-plan">Неограниченный</h2>
								<div class="price"><sup class="currency">₽</sup>8666<small>/месяц</small></div>
								<p class="description">Для мажоров</p>
								<ul class="classes">
									<li>∞ Кардио-Классы</li>
									<li class="color">∞ Урок Плавания</li>
									<li>∞ Занятия Йогой</li>
									<li class="color">∞ Аэробика</li>
									<li>∞ Классы Zumba </li>
									<li class="color">∞ Массаж</li>
									<li>∞ бодибилдинг</li>
								</ul>
								<?php if( !isset($_SESSION['logged_user']) ) : ?>
								<button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#firstModal">Select Plan</button>
							    <?php else : ?>
							    <button id="openD" class="btn btn-default podval" data-toggle="modal" data-target="#secondModal">Select Plan </button>
							    <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="firstModal">
	    	<div class="modal-dialog">
	     		<div class="modal-content">
	     			<div class="modal-header">
	     				<h5 class="modal-title">Название модального окна</h5>
	     				<button class="close" data-dismiss="modal">×</button>
	     			</div>
	     			<div class="modal-body">
						<form method="POST" class="form-horizontal">
							<span class="heading">АВТОРИЗАЦИЯ</span>
							<div class="form-group">
								<input name="email" type="email" class="form-control" id="inputEmail3" placeholder="E-mail">
								<i class="fa fa-user"></i>
							</div>
							<div class="form-group help">
								<input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
								<i class="fa fa-lock"></i>
								<a href=# class="fa fa-question-circle"></a>
							</div>
							<div class="form-group">
								<button name="do_login" type="submit" class="btn btn-default">ВХОД</button>
							</div>
						</form>
	     			</div>
	    			<div class="modal-footer">
	     				<button class="btn btn-primary" data-dismiss="modal">Закрыть</button>
	     			</div>
	     		</div>
	    	</div>
	    </div>
	    
		<div class="pricing centered">
	    <div class="modal fade" id="secondModal">
		<div class="modal-dialog">
	 		<div class="modal-content">
	 			<div class="modal-header">
	 				<h5 class="modal-title">Название модального окна</h5>
	 				<button class="close" data-dismiss="modal">×</button>
	 			</div>
	 			<div class="modal-body">
					<form method="POST" class="form-horizontal">
						<span class="heading">Покупка "Начальный" абонемент</span>
						<div class="form-group">
							<h3>Стоимость<div class="price"><sup class="currency">₽</sup><?php echo $price; ?><small>/месяц</small></div></h3>
							<span>Целищева Юлия</span>
						</div>
						<div class="form-group">
							<button name="buy" type="submit" class="btn btn-default" value="Месяц">Купить</button>
						</div>
					</form>
	 			</div>
				<div class="modal-footer">
	 				<button class="btn btn-primary" data-dismiss="modal">Закрыть</button>
	 			</div>
	 		</div>
		</div>
	</div>
	</div>

		<!-- /.pricing -->
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 animate-box">
							<h3 class="section-title">О Нас</h3>
							<p ></p>
						</div>

						<div class="col-md-4 animate-box">
							<h3 class="section-title">Наш Адрес</h3>
							<ul class="contact-info">
								<li><i class="icon-map-marker"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
								<li><i class="icon-phone"></i>+ 1235 2355 98</li>
								<li><i class="icon-envelope"></i><a href="#">info@yoursite.com</a></li>
								<li><i class="icon-globe2"></i><a href="#">www.yoursite.com</a></li>
							</ul>
						</div>
					
						<div class="col-md-4 animate-box">
							<h3 class="section-title">Напишите нам</h3>
							<form class="contact-form">
								<div class="form-group">
									<label for="name" class="sr-only">Name</label>
									<input type="name" class="form-control" id="name" placeholder="Name">
								</div>
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="message" class="sr-only">Message</label>
									<textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Отправить">
								</div>
							</form>
						</div>
					</div>
					<!-- <div class="row copy-right">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2016 Free Html5 <a href="#">Fitness</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
						</div>
					</div> -->
				</div>
			</div>
		</footer>
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