<?php
	require "include/db.php";
	$id = $_GET['email'];

	$data['email'] = $id;
	$name = R::findOne('trainers' , 'id_trainers = ?', array($data['email']) );
	$image = "images/".$name->name_trainer.".jpg";
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
						<li><a href="#">Расписание</a></li>
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
		<div id="team-section-tren" class="row container team-section-grid">
			<div class="col-md-4 col-sm-6">
				<div class="team-section-grid animate-box" style="background-image: url(<?=$image ?>);">
				</div>
			</div>
			<div class="col-md-8 col-sm-6">
				<div class="team-section-grid animate-box">
					<div class="desc">
						<h2><?php
							echo $name->surname_trainer." ".$name->name_trainer ?></h2>
						<span>Body Trainer</span>
					</div>
				</div>
			</div>
		</div>

<!-- 
		<div id="team-section" class="team-section-grid" style="background-image: url(<?=$image ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<img src="" alt="">
					</div>
					<div class="col-md-8">
						<div class="desc">
							<h2><?php
									echo $name->surname_trainer." ".$name->name_trainer ?></h2>
							<span>Body Trainer</span>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<div class="desc">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<table class="table table-dark">
							<tbody>
								<tr id="str">
								    <th scope="row">Образование</th>
								    <td>Программист</td>
								</tr>
								<tr id="str">
									<th scope="row">Часы работы</th>
									<td> ПН по ПТ: с 10:00 до 17:00</td>
								</tr>
								<tr id="str">
								    <th scope="row">Стоимость 1 занятия</th>
									<td><?php echo $name->salary_trainer ?></td>
								</tr>
							</tbody>
						</table>
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