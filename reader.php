<html>
<head>
<link href="style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
<ul class=menu_g>
	<li><span class=ad><a href=index.php class="c1">Главная</a></span></li>
	<li><a href=cat.php class=a_click>Категории</a></li>
	<li><a href=stat.php class=a_click>Статьи</a></li>
	<li><a href=users.php class=a_click>Пользователи</a></li>
	<li><a href=author.php class=a_click>Авторы</a></li>
</ul>

<div class="form1">
<?php
	include "config.php";
	
	$id = $_GET['id'];
	$res = $dbh->query("SELECT * FROM items where id=$id");
	$result = $res->fetch(PDO::FETCH_LAZY);
?>
<div class=con>
<a href=<?php echo $_SERVER['HTTP_REFERER']; ?> class=a_click1>Назад</a>

<hr>
<h2 align=center><?php echo $result['name_items']; ?></h2>
<h3>Автор: <?php echo $result['data_items']; ?></h3>
<p><?php echo $result['content']; ?></p>
</div>
</div>
</div>
</body>
</html>