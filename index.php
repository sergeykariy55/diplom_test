<?php
    session_start();
    include "admin/config.php";
    $id = $_GET['id'];
?>
<html>
<head>
<link href="style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
<ul class=menu_g>
	<li><span class=ad><a href=index.php class="c1">Главная</a></span></li>
	<li><a href=stat.php class=a_click>Статьи</a></li>
	<li><a href=users.php class=a_click>Пользователи</a></li>
    <li><a href=auth.php class=a_click>Войти</a></li>
</ul>
<div class="info">
	<p>LMS - система для удаленного обучения</p>
	<img src=/img/lms-header.png class="img_info">
</div>
	<div class="left_b">
	<h2>Последние занятия</h2>
	<ul class="rubi">
	<?php
		foreach($dbh->query('SELECT * FROM `events` ORDER BY `events`.`id` DESC LIMIT 5') as $row){
		?>
			<div class="message">
				<div class="index_user">
					<div class="img_user">
						<img src=/img/head_user.png class="img_user">
					</div>
					<div class="content_user">
						<div class="name_user"><p><?=$row['title'];?></p></div>
						<div class="data"><?=$row['content'];?></div>
					</div>
				</div>		
			</div>
		<?php
		}
	?>
	</ul>
	</div>

	<div class="right_b">
	<h2>Новые пользователи</h2>

	<?php
		foreach($dbh->query('SELECT * FROM `users` ORDER BY `users`.`id` DESC') as $row){
		?>
			<div class="message">
				<div class="img_user_lenta">
						<img src=/img/user.png class="img_user_lenta">
					</div>
				<div class="content_user_lenta">
					<div class="name_user"><p><?=$row['fio'];?></p></div>
					<div class="data"><?=$row['adout'];?></div>
				</div>		
			</div>
		<?php
		}
	?>

	</div>
</div>
</body>
</html>