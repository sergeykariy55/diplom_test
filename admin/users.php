<?php
 include "../config/config.php";
?>

<html>
<head>
    <link href="../style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container">
        
        <h3 aligin="center">Регистрация нового студента</h3>
        <form method="POST" action="user_add.php">
            <p>Логин <input type="text" name="login" required></p>
            <br>
            <p>Пароль<input type="password" name="pass" required></p>
            <br>
            <p>ФИО<input type="text" name="fio" required></p>
            <br>
            <p>Группа<input type="text" name="group" required></p>
            <br>
            <p>Личные данные<p><textarea rows="10" cols="45" name="text"></textarea>
            <br>
            <input type="submit" value="Войти">
        </form>
        <hr>
         <h3 aligin="center">Регистрация нового преподователя</h3>
        <form method="POST" action="pred_add.php">
            <p>Логин <input type="text" name="name_preod" required></p>
            <br>
            <p>Пароль<input type="password" name="pass" required></p>
            <br>
            <p>ФИО<input type="text" name="fio" required></p>
            <br>
            <p>Личные данные<p><textarea rows="10" cols="45" name="text"></textarea>
            <br>
            <input type="submit" value="Выполнить">
        </form>
    </div>
</body>
</html>
