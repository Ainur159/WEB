<?php
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);

	require "include/.properties";
	
	if($_POST['submit'])
	{
		if($_POST['user'] AND $_POST['pass']) 
		{
			$mysqli = new mysqli($host, $_POST['user'], $_POST['pass'], $db);
			if ($mysqli->connect_error) 
			{
				echo "<script>alert(\"Не верный логин и пароль!\");</script>";
			}
			else
			{
				session_start();
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['pass'] = $_POST['pass'];
				header("Location: http://second/index.php", false, 301);
				$mysqli->close();
				exit();
			}
		}
		else
		{
			echo "<script>alert(\"Введите логин и пароль!\");</script>";
		}
	}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Автогонки</title>
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <link rel="stylesheet" type="text/css" href="styles/registerStyle.css"/>
        <link rel="icon" href="images/icon.png"/>
        
        <script src="js/clientValidation.js"></script>
        
    </head>
    <body>
        <header>
            <img id=logo src="images/logo.jpg" width="100" height="70" alt="Логотип">Организация автогонок
        </header>
        <nav>
            <a href="index.html">Главная</a>
            <a href="register.html">Регистрация</a>
            <a href="racers.html">Список участников</a>
            <a href="contacts.html">Контакты</a>
        </nav>
        <article>
		
            <form method="post">
				<p> <pre>Логин:     <input type="text" name="user" /> </pre> </p>
				<p> <pre>Пароль:    <input type="password" name="pass" /> </pre> </p>
				<p> <input type="submit" name="submit" value="Войти" /> </p>
			</form>
			
        </article>
        <footer>
            <blockquote>
                <p>Адреналин несовместим с гонками. Если адреналиновый удар случится у тебя в тот момент, когда ты заходишь на очередной круг, это почти наверняка кончится плохо. Шансы есть только у тех, кто холоден и спокоен.</p>
                <cite>Михаэль Шумахер</cite>
            </blockquote>
            <div id=sponsors>
                Наши спонсоры
                <img src="images/hondaLogo.jpg" "hondaLogo" width="100" height="70 "/>
                <img src="images/redBullLogo.png" "redBullLogo" width="100" height="70"/>
                <img src="images/pumaLogo.jpg" "PumsLogo" width="100" height="70"/>
            </div>
        </footer>
    </body>  
</html>