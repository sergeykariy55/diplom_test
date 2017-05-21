<?php

include "config.php";

$login = $_POST['login'];
$pass = $_POST['pass'];
$fio = $_POST['fio'];
$group = $_POST['group'];
$text = $_POST['text'];

$q = "INSERT INTO `users`(`login`, `pass`, `adout`, `group`, `fio`, `slug`) VALUES ('$login','$pass','$text','$grop','$fio','0')";
?>
<html>
<head>
<link href="../style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <?php
    if($dbh->query($q)){
        echo "<p class=war1>Пользователь $login успешно создан!</p>";
    }else{
        echo "<p class=war>Пожалуйста, заполните все поля!1</p>";
    }
    ?>
    <br>
    <a href="/" class=a_click>ОК</a>
</div>
</body>
</html>
