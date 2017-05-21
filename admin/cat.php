<?php
	include "config.php";
?>
<html>
<head>
<link href="css/style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
<ul class=menu_g>
	<li><span class=ad><a href=index.php class="c1">Административная панель</a></span></li>
	<li><a href=cat.php class=a_click>Категории</a></li>
	<li><a href=stat.php class=a_click>Статьи</a></li>
	<li><a href=users.php class=a_click>Пользователи</a></li>
	<li><a href=author.php class=a_click>Авторы</a></li>
</ul>

<div class="form1">
<h2>Создание новой категории</h2>
	<form action=# method=POST>
		<p class="ggh">Название категории<input type="text" class="form_text" name="name_cat"><p>
		<p class="ggh">Префикс категории<input type="text" class="form_text" name="pref_cat"><p>
		<input type="submit" value="Создать">
	</form>
	<br>
	<?php
	if(isset($_POST['name_cat']) and isset($_POST['pref_cat'])){
		$name = $_POST['name_cat'];
		$cat = $_POST['pref_cat'];
	}
	
	if(empty($name) and empty($cat)){
		echo "<p class=war>Пожалуйста, заполните все поля!</p>";
	}else{
		if($dbh->query("insert into category(name_cat, pref_cat) values('$name', '$cat')")){
			echo "<p class=war1>Категория $name успешно создана!</p>";
		}else{
			echo "<p class=war>Пожалуйста, заполните все поля!</p>";
		}
	}
?>
<br>
<hr>
<br>
<h2>Список категорий</h2>
<table class="tabl" border=1px>
	<tr>
		<td>Номер</td>
		<td>Название</td>
		<td>Префикс</td>
		
	</tr>
<?php  
    foreach($dbh->query('SELECT * from category') as $row) {
	?>
	<tr>
        <td valign=top><?php echo $row["id"]; ?></td>
	    <td  valign=top><?php echo $row["name_cat"]; ?></td>
		<td  valign=top><?php echo $row["pref_cat"]; ?></td>
		<td class=del><a href=cat.php?id=<?php echo $row["id"]; ?>  valign=top class="a_click">Удалить</a></td>
	</tr>
	<?php
    }

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if($dbh->query("DELETE FROM category WHERE id=$id")){
			echo "<p class=war1>Категория удалена!</p>";
		}
	}	
?> 
</table>
</div>
</div>
</body>
</html>