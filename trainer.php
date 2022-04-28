<?php
	require "include/db.php";

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
		<link href="css/main.css" rel="stylesheet">

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
					<a id="logo" href="index.php" class="navbar-brand">Fit<span>ness</span></a>
				</div>
				<!-- /.navbar-header -->
				<div class="navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Главная</a></li>
						<li><a href="schedule.php?name=*">Расписание</a></li>
						<li class="active"><a href="#">Тренера</a></li>
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
						<a href="aboutTrainer.php?email=6">
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
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="aboutTrainer.php?email=1">
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
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="aboutTrainer.php?email=2">
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
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="aboutTrainer.php?email=3">
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
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="aboutTrainer.php?email=4">
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
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="aboutTrainer.php?email=5">
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
						</a>
					</div>	
				</div>
			</div>
		</div>

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
				</div>
			</div>
		</footer>
		<!-- /.lightgray-section -->
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