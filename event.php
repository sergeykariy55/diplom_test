<?php
    session_start();
    include "admin/config.php";
    $id_event = $_GET['id_event'];

    $id_teacher = $_GET['id_teacher'];

    if($id_teacher){

    	$res = $dbh->query("SELECT * FROM `prepod` WHERE `id` = $id_teacher");
		$result_teacher = $res->fetch(PDO::FETCH_LAZY);

		$res = $dbh->query("SELECT * FROM `events` WHERE `id` = $id_event and `prepod_id`= $id_teacher");
		$result = $res->fetch(PDO::FETCH_LAZY);

    }else{
    	$res = $dbh->query("SELECT * FROM `events` WHERE `id` = $id_event");
		$result = $res->fetch(PDO::FETCH_LAZY);
    }
 

	/*$res = $dbh->query("SELECT * FROM `prepod` WHERE `id` = $id_teacher");
	$result_teacher = $res->fetch(PDO::FETCH_LAZY);*/
?>﻿
<html>
<head>
<link href="style.css"  rel='stylesheet' type='text/css'>
</head>
	<body>
		<div class="container">
			<ul class=menu_g>
				<li><span class=ad><a href=index.php class="c1">Главная</a></span></li>
				<li><a href=event.php class=a_click>Уведомления</a></li>
				<li><a href=users.php class=a_click>Пользователи</a></li>
				<li><a href=student.php?id=<?= $_SESSION['id']; ?> class=a_click><?= $_SESSION['name'];?></a></li>
			</ul>
			<br>
			<div class="wrapper">
				<h4>Создатель занятия: <a href=teacher.php?id=<?=$id_teacher;?>><?=$result_teacher['fio'];?></a></h4>
				<h4>Тема: <?=$result['title'];?></h4>
				<p><?=$result['content'];?></p>
			</div>
		</div>
	</body>
</html>