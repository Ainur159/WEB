<?php 
	session_start();
?>	

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Автогонки</title>
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <link rel="stylesheet" type="text/css" href="styles/indexStyle.css"/>
        <link rel="icon" href="images/icon.png"/>
    
		<style>
			form, table, span 
			{
				margin-left: 5%;
			}
		</style>
	</head>
    <body>
        <header>
            <img id=logo src="images/logo.jpg" width="100" height="70" alt="Логотип">Организация автогонок
        </header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="register.php">Регистрация</a>
            <a href="racersFind.php">Список участников</a>
            <a href="#">Контакты</a>
			<?php
				if(!$_SESSION['user'])
					echo "<a href=\"signIn.php\">Вход</a>";
				else
					echo "<a href=\"signOut.php\">Выход</a>";
				
			?>
        </nav>
        <article>
            
			<form name="find" method="post" action="racers.php">
				<p>
					<label>Введите имя участника: </label><input type="text" name="name" />
					<input type="submit" value="поиск"/>
				</p>
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