<?php
    session_start();
    include "admin/config.php";
    $id = $_GET['id'];
?>﻿
<html>
<head>
<link href="style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<ul class=menu_g>
			<li><span class=ad><a href=index.php class="c1">Главная</a></span></li>
			<li><a href=user_events.php?id=<?= $_SESSION['id']; ?> class=a_click>Уведомления</a></li>
			<li><a href=stat.php class=a_click>Занятия</a></li>
			<li><a href=users.php class=a_click>Пользователи</a></li>
			<li><a href=student.php?id=<?= $_SESSION['id']; ?> class=a_click><?= $_SESSION['name'];?></a></li>
		</ul>

		<br>
		<div class="wrapper">
		<h3>Уведомления</h3>
			<?php
				foreach($dbh->query("SELECT * FROM `user_events` WHERE `id_user` = $id") as $val){
				?>
					<div class="message">
						<div class="name_user"><p>Создатель занятия: <?=$val['name_prepod'];?></p></div>
						<div class="name_user"><p>Название: <?=$val['title_events'];?></p></div>
						<div class="data"><?=$val['content'];?></div>
						<a href=event.php?id_event=<?=$val['id_event'];?>>Перейти</a>
					</div>
				<?php
				}
			?> 
		</div>
	</div>
</body>
</html>