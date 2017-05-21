<?php
    session_start();
    include "admin/config.php";
?>
<html>
<head>
<link href="style.css"  rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container">
        <div class="contr_form">
            <h3 aligin="center">Авторизуйтесь для работы на сайте</h3>
            <form method="POST" action="#">
                <p>Логин <input type="text" name="login"></p>
                <br>
                <p>Пароль <input type="password" name="pass"></p>
                <br>
                <p>ВЫ:</p>
                 <p><input name="dzen" type="radio" value="prepod">Преподователь</p>
                 <p><input name="dzen" type="radio" value="student">Студент</p> 
                 <br>
                <input type="submit" value="Войти">
            </form>
        </div>
        <?php
          if($_POST){
              
              $slug = $_POST['dzen'];
              $login = $_POST['login'];
              $pass = $_POST['pass'];
              
              switch ($slug) {
                case "student":
                    foreach ($dbh->query("SELECT * FROM `users`") as $row){

                        if($login == $row['login']){
                            if($pass == $row['pass']){
                             ?>
                                <style>
                                    .contr_form{
                                        display: none;
                                    }
                                </style>
                                <?php
                                  $_SESSION['name'] = $row['fio'];
                                  $_SESSION['id'] = $row['id'];
                                ?>
                                <h3>Привет <?php echo $row['fio']; ?>, переходи на свою страницу</h3>
                                <a href=student.php?id=<?php echo $row['id']; ?>>Перейти</a>
                             <?php
                            }else{
                                echo "<p class=war>Такого студента у нас нет</p>";
                            }
                        }
                    }
                        
                      break;
                case "prepod":

                      foreach ($dbh->query("SELECT * FROM `prepod`") as $row){

                        if($login == $row['name']){
                            if($pass == $row['pass']){
                             ?>
                                <style>
                                    .contr_form{
                                        display: none;
                                    }
                                </style>
                                <?php
                                  $_SESSION['name'] = $row['fio'];
                                  $_SESSION['id'] = $row['id'];
                                ?>
                                <h3>Здраствуйте <?php echo $row['fio']; ?>, переходи на свою страницу</h3>
                                <a href=teacher.php?id=<?php echo $row['id']; ?>>Перейти</a>
                             <?php
                            }else{
                                echo "<p class=war>Такого преподователя у нас нет</p>";
                            }
                        }
                    }

                      break;
                  default:
                      break;
              }
          }else{
              
          }
          
        ?>
    </div>
</body>
</html>