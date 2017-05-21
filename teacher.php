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
	<li><a href=event.php class=a_click>Уведомления</a></li>
	<li><a href=stat.php class=a_click>Занятия</a></li>
	<li><a href=users.php class=a_click>Пользователи</a></li>
	<li><a href=student.php?id=<?= $_SESSION['id']; ?> class=a_click><?= $_SESSION['name'];?></a></li>
</ul>

<div class="form_user">
	<?php
	if($_SESSION['id'] == $id){
	?>
	<h3>Ваш профиль</h3>
	<?php
	}
		$res = $dbh->query("SELECT * FROM prepod where id=$id");
		$result = $res->fetch(PDO::FETCH_LAZY);
	?>
	<!--  //////////////////////////////////////////////-->

	<div class="profile">
		<div class="ava">
			<h3><?=$result['fio']?></h3>
		</div>
		<div class="text"><p><?=$result['text']?></p></div>
	</div>
  
  	<!--  //////////////////////////////////////////////-->
	<?php
		if($_SESSION['id'] == $id){
	?>
	<div class="new_create_message">
	<h3>Создать занятие</h3>
		<form method="POST" action=# class="form_teaher">
			<div class="form_teaher_title">
			Название<input type="text" name="name" class="msg_in">
			<br>
			<textarea rows="10" cols="50" name="data" placeholder="Описание"></textarea>
			</div>
			<br>
			<div class="form_teaher_title_user">
				<fieldset>
	   			<legend>Пользователи</legend>
					<?php
					foreach($dbh->query("SELECT * FROM users") as $row){
					?>
							 <input type="checkbox" name="users[]" value="<?=$row['id'];?>"><?=$row['fio'];?><Br> 

					
					<?php
					}
					?>
				</fieldset>
			</div>
			<br>
			<input type="submit" value="Создать занятие">
		</form>
	</div>

	<?php
    }
	if($_POST){
		//print_r($_POST['users']);
		$name = $_POST['name'];
		$content = $_POST['data'];
		$user_id = $_SESSION['id'];
		$p_name = $result['fio'];
		$q = "INSERT INTO `events`(`prepod_id`,`content`, `title`) VALUES ('$user_id','$content','$name')";
		if($dbh->query($q)){
			echo "<p class=war1>Ваша запись успешно добавлена</p>";
		}else{
			echo "Ошибка";
		}

		$users = $_POST['users'];
		foreach ($users as $key => $value) {
			$dbh->query("INSERT INTO `user_events`(`id_user`, `name_prepod`, `content`, `title_events`) VALUES ('$value','$p_name','$content','$name')");
		}


	}

	?>
	<!--  //////////////////////////////////////////////-->

	<div class=stena>
		<?php
	if($_SESSION['id'] == $id){
	?>
	<h3>Мои занятия</h3>
	<?php
	}

	foreach($dbh->query("SELECT * FROM events where prepod_id=$id ORDER BY id DESC") as $row){
	?>
		<div class="message">
			<div class="name_user"><p><?=$row['title'];?></div>
			<div class="data"><?=$row['content'];?></div>
			<a href=event.php?id_event=<?=$row['id']?>&id_teacher=<?=$row['prepod_id']?>>Перейти</a>
		</div>
	<?php
	}
	?>
	</div>

 	<!--  //////////////////////////////////////////////-->

</div>
</div>
</body>
</html>