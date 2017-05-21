<?php
	include "config.php";
	
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
</ul>

<div class="form1">
<?php
	
	$id = $_GET['id'];
	$res = $dbh->query("SELECT * FROM category where id=$id");
	$result = $res->fetch(PDO::FETCH_LAZY);
	
	$cat = $result['pref_cat'];
	
	echo  "<h2>".$result['name_cat']."</h2>";

   foreach($dbh->query("SELECT * from items where category='$cat'") as $row) {
	?>
		<div class="form2">
	
        <h2>Номер статьи: <?php echo $row["id"]; ?><h2>
		<hr>
		<p>Название: <?php echo $row["name_items"]; ?></p>
		<p>Автор: <?php echo $row["data_items"]; ?></p>
		<p class=ref>Краткое содержание<hr><?php echo $row["content"]; ?></p>
	
		<br>
		
		<a href=reader.php?id=<?php echo $row["id"]; ?> class="a_click" >Читать</a>
		</div>
	
	<?php
    }
	?>
</div>
</div>
</body>
</html>