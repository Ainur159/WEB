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
        
        <script type="text/javascript" src="js/timer.js"></script>
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
            <div id=raceText>
                <h1>Turbo Racing Cup</h1>
                <p>Turbo Racing Cup 2020 – представляет собой открытое для любого желающего автогоночное соревнование по дисциплине тайм-аттак, начального уровня. Уже не первый раз TRC подкупает участников своим демократичным и доступным каждому подходом к соревнованиям. В каждом новом году, к этим заездам примыкают десятки дебютантов, чем может похвастаться далеко не каждая автогоночная дисциплина России. Не в каждом соревновании гонщик-любитель получает возможность выступить на стоковом тазу…</p>
                <p>Не пропустите, только 5 июня 2020 на всеми любимой трассе <b>"Helios"</b></p>
            </div>
            
            <div id=raceWay> Трасса гонки <b>"Helios"</b><br> 
                <img src="images/way1"  width="900" height="600"
                    alt="Трасса гонки" align="center" 
                    vspace="20" hspace="0">
            </div>
            <div id="timer">
                <i>Оставшееся время регистрации:</i><br>
                <span id="days"></span>дней
                <span id="hours"></span>:
                <span id="minutes"></span>:
                <span id="seconds"></span>
            </div>
            
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