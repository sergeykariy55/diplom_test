<?php
    session_start();
    include "config/config.php";
?>
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
        <li><a href=auth.php class=a_click>Войти</a></li>
</ul>

<div class="left_b">
<h2>Меню</h2>
<ul class="rubi">
<?php
	foreach($dbh->query('SELECT * FROM category') as $row){
	?>
	<li><a href=cat.php?id=<?php echo $row['id'] ?> class=fwf><?php echo $row['name_cat']; ?></a></li>
	<?php
	}
?>
</ul>
</div>

<div class="right_b">
<h2>Последние статьи</h2>

<?php
	foreach($dbh->query('SELECT * from items') as $row){
	?>
	<div class="fvd">
	<p><?php echo $row["content"]; ?></p>
	<br>
	<div class="ew3">
	<a href=reader.php?id=<?php echo $row['id'] ?> class=fwf>Читать</a>
	</div>
	</div>
	<?php
	}
?>

</div>
</div>
</body>
</html>