<?php

include "config.php";

$name = $_POST['name_preod'];
$pass = $_POST['pass'];
$fio = $_POST['fio'];
$text = $_POST['text'];

$q = "INSERT INTO `prepod`(`name`, `fio`, `text`, `pass`) VALUES ('$name', '$fio', '$text', '$pass')";
?>
<html>
<head>
<link href="../style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <?php
    if($dbh->query($q)){
        echo "<p class=war1>Пользователь $name успешно создан!</p>";
    }else{
        echo "<p class=war>Пожалуйста, заполните все поля!1</p>";
    }
    ?>
    <br>
    <a href="/" class=a_click>ОК</a>
</div>
</body>
</html>