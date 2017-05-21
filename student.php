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
		$res = $dbh->query("SELECT * FROM users where id=$id");
		$result = $res->fetch(PDO::FETCH_LAZY);
	?>
	<!--  //////////////////////////////////////////////-->

	<div class="profile">
		<div class="ava">
			<h3><?=$result['fio']?></h3>
			<p>Группа <?=$result['group']?></p>

		</div>
		<div class="text"><p><?=$result['adout']?></p></div>
	</div>
  
  	<!--  //////////////////////////////////////////////-->
	<?php
		if($_SESSION['id'] == $id){
	?>
	<div class="new_create_message">
		<form method="POST" action=#>
			
			Заголовок<input type="text" name="name" class="msg_in">
			<br>
			<textarea rows="10" cols="45" name="data" placeholder="Что у вас нового?"></textarea>
			<br>
			<input type="submit" value="Отправить">
		</form>
	</div>

	<?php
    }
	if($_POST){

		$name = $_POST['name'];
		$content = $_POST['data'];
		$user_id = $_SESSION['id'];
		$today = date("m.d.y"); 

		$q = "INSERT INTO `user_blog`(`user_id`, `name`, `content`, `data`) VALUES ('$user_id','$name','$content','$today')";
		if($dbh->query($q)){
			echo "<p class=war1>Ваша запись успешно добавлена</p>";
		}else{
			echo "Ошибка";
		}
	}

	?>
	<!--  //////////////////////////////////////////////-->

	<div class=stena>
	<?php
	foreach($dbh->query("SELECT * FROM user_blog where user_id=$id ORDER BY id DESC") as $row){
	?>
		<div class="message">
			<div class="name_user"><p><?=$row['name'];?> / <?=$row['data'];?></p></div>
			<div class="data"><?=$row['content'];?></div>
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