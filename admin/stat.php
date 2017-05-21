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
<h2>Создание новой статьи</h2>
	<form action=# method=POST>
	<p>Категория<select size="1"  name="fld_city[]" required>
	<?php
		   foreach($dbh->query('SELECT * from category') as $row) {
			?>

		<option value=<?php echo $row["pref_cat"]; ?>><?php echo $row["name_cat"]; ?></option>
	
	<?php
    }
	?>
   </select>
   <br>
		<p class="ggh">Название статьи<input type="text" class="form_text" name="name_stat"><p>
		<p class="ggh">Автор<input type="text" class="form_text" name="author"><p>
		<p class="ggh">Содержание</p>
		<textarea class="we2" style="margin: 0px; height: 300px; width: 503px;" name="text2"></textarea>
		<input type="submit" value="Создать">
	</form>
	<br>
	<?php
	//print_r($_POST);
	
	if(isset($_POST['name_stat']) and isset($_POST['author'])){
		$name = $_POST['name_stat'];
		$cat = $_POST['fld_city'][0];
		$author = $_POST['author'];
		$content = $_POST['text2'];
	}
	
	if(empty($name) and empty($cat) and empty($content)){
		echo "<p class=war>Пожалуйста, заполните все поля!</p>";
	}else{
		if($dbh->query("insert into items(name_items, data_items, content, category) values('$name', '$author', '$content', '$cat')")){
			echo "<p class=war1>Статья $name успешно создана!</p>";
		}else{
			echo "<p class=war>Пожалуйста, заполните все поля!1</p>";
		}
	}
?>
<br>
<hr>
<br>
<h2>Список статей</h2>
<table class="tabl" border=1px>
	<tr>
		<td>Номер</td>
		<td>Название</td>
		<td>Автор</td>
		<td>Содержание</td>
		<td>Категория</td>
	</tr>
<?php  
    foreach($dbh->query('SELECT * from items') as $row) {
	?>
	<tr>
        <td><?php echo $row["id"]; ?></td>
	    <td valign=top><?php echo $row["name_items"]; ?></td>
		<td valign=top><?php echo $row["data_items"]; ?></td>
		<td valign=top><?php echo $row["content"]; ?></td>
		<td valign=top><?php echo $row["category"]; ?></td>
		<td class=del><a href=stat.php?id=<?php echo $row["id"]; ?> class="a_click" valign=top>Удалить</a></td>
		<td class=del><a href=stat.php?id=<?php echo $row["id"]; ?> class="a_click" valign=top>Редактировать</a></td>
	</tr>
	<?php
    }

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if($dbh->query("DELETE FROM items WHERE id=$id")){
			echo "<p class=war1>Категория удалена!</p>";
		}
	}	
?>
</table>
</div>
</div>
</body>
</html>