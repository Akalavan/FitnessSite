<?php
	require "include/db.php";

	//$trainer['id'] = 1;
	if ( isset($_SESSION['logged_user']) ) {
		$login = $_SESSION['logged_user']->login;
	}
	$data['id'] = 4;
    $name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
	//echo $name->date_schedule;
	$d = $name->date_schedule;
	// echo $d;
	// 
	// echo "$user"
	echo $name->date_schedule."</br>";
	$user = explode(" ", $d);
	// Вывести элементы массива $tokenized
	$user1 = explode(":", $user[1]);
	foreach ($user1 as $key) {
		echo $key."</br>";
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
		<link href=" css/main.css" rel="stylesheet">

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
						<li class="active"><a href="#">Главная</a></li>
						<li><a href="schedule.php">Расписание</a></li>
						<li><a href="trainer.php">Тренера</a></li>
						<li><a href="#">О сайте</a></li>
						<li><a href="contact.php">Контакты</a></li>
						<?php if( isset($_SESSION['logged_user']) ) : ?>
						<li><a href="cabinet/logout.php">Выход</a></li>
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

	
		<div id="schedule">
			<div class="container">
				<div class="row centered">
					<div class="col-md-12 schedule-container">
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Пн</th>
						      <th scope="col">Вт</th>
						      <th scope="col">Ср</th>
						      <th scope="col">Чт</th>
						      <th scope="col">Пт</th>
						      <th scope="col">Сб</th>
						      <th scope="col">Вс</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">09:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("09", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
											//echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("09", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("09", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("09", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("09", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("09", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("09", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">10:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("10", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("10", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("10", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("10", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("10", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("10", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("10", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">11:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("11", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("11", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("11", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("11", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("11", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("11", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("11", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">12:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">13:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("13", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("12", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("13", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("13", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("13", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("13", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("13", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">14:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("14", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("14", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("14", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("14", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("14", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("14", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("14", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">15:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("15", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("15", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("15", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("15", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("15", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("15", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("15", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">16:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("16", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("16", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("16", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("16", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("16", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("16", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("16", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">17:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("17", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("17", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("17", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("17", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("17", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("17", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("17", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">18:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("18", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("18", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("18", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("18", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("18", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("18", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("18", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">19:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("19", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("19", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("19", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("19", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("19", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("19", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("19", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">20:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("20", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("20", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("20", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("20", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("20", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("20", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("20", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						    </tr>
						    <tr>
						    <th scope="row">21:00</th>
						      <td>
						      	<?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 1 && (strcmp("21", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?>
						      </td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 2 && (strcmp("21", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 3 && (strcmp("21", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 4 && (strcmp("21", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 5 && (strcmp("21", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 6 && (strcmp("21", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
						      <td><?php 
						      		$count = R::count('schedule_group');
								    for ($i=0; $i < $count; $i++) { 
								    	$data['id'] = 4 + $i;
								    	$name = R::findOne('schedule_group' , 'id_schedule  = ?', array($data['id']) );
								    		$d = $name->date_schedule;
										//	echo $name->date_schedule."</br>";
											$user = explode(" ", $d);
											$user1 = explode(":", $user[1]);
											//echo $name->date_schedule."</br>";
								    	if ( $name->day == 7 && (strcmp("21", $user1[0])) == 0) {
								    		$timeT= $user1[0] + 1;

								    		$dataG['id'] = $name->id_group;

								    		$name = R::findOne('group' , 'id_group = ?', array($dataG['id']) );

								    		$dataG['id'] = $name->id_trainer;
								    		$name = R::findOne('trainers' , 'id_trainers = ?', array($dataG['id']) );

								    		echo "
								    		<div class=cell>
								    			<div class=program-cell>
												<img src=images/fit-dumbell.svg alt=Cycling>
												<small>$user1[0]:00-$timeT:00</small>
												<h3>Бодибилдинг</h3>
												<span>";echo $name->surname_trainer." ".$name->name_trainer; echo "</span>
												</div>
											</div>";
										}
										else echo "";
								    }
						      	?></td>
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