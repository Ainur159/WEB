<?php 
	require_once 'include/.properties'; // подключаем скрипт
	
	session_start();
	
	if($_POST['submit'])
	{
		if(!isset($_POST['fName']))
			die('Error, don\'t write fName');
		else if(!isset($_POST['sName']))
			die('Error, don\'t write sName');
		else if(!isset($_POST['tName']))
			die('Error, don\'t write tName');
		else if(!isset($_POST['dateOfBirthday']))
			die('Error, don\'t write dateOfBirthday');
		else if(!isset($_POST['sex']))
			die('Error, don\'t write sex');
		else if(!isset($_POST['town']))
			die('Error, don\'t write town');
		else if(!isset($_POST['phone']))
			die('Error, don\'t write phone');
		else if(!isset($_POST['mark']))
			die('Error, don\'t write mark');
		else if(!isset($_POST['model']))
			die('Error, don\'t write model');
		else if(!isset($_POST['year']))
			die('Error, don\'t write year');
		
		$fName = htmlentities($_POST['fName']);
		$sName = htmlentities($_POST['sName']);
		$tName = htmlentities($_POST['tName']);
		$dateOfBirthday = htmlentities($_POST['dateOfBirthday']);  //$date = strtotime($sqldate);
		$sex = (int)htmlentities($_POST['sex']);
		$town = htmlentities($_POST['town']);
		$phone = htmlentities($_POST['phone']);
		$mark = htmlentities($_POST['mark']);
		$model = htmlentities($_POST['model']);
		$year = htmlentities($_POST['year']);
		
		if(!$_SESSION['user'])
		{ 
		   header("HTTP/1.0 501 NotImplemented"); 
		   exit; 
		} 
		
		$mysqli = new mysqli($host, $_SESSION['user'], $_SESSION['pass'], $db);
					
		if (!$mysqli) 
		{ 
		   header("HTTP/1.0 501 NotImplemented"); 
		   exit; 
		} 
		
		$query = "insert into driver (fName, sName, tName, dateOfBirthday, sex, town, phone, mark, model, year) values (?,?,?,?,?,?,?,?,?,?)";
		$statement = $mysqli->prepare($query);
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('ssssissssi', $fName, $sName,$tName, $dateOfBirthday, $sex, $town, $phone, $mark, $model, $year);
		
		if($statement->execute())
			header("Location: http://second/index.php", false, 301);
		else
			header("HTTP/1.0 501 NotImplemented");
		$mysqli->close();	
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
            <form name="registration" action="" method="post">
                <fieldset>
                    <legend>Данные о водителе</legend>
                    <div class=field><label>Фамилия</label><input type="text" name="fName"></div>
                    <div class=field><label>Имя</label><input type="text" name="sName"></div>
                    <div class=field><label>Отчество</label><input type="text" name="tName"></div>
                    <div class=field><label>Дата рождения</label><input type="date" name="dateOfBirthday"></div>
                    
                    <select name="sex">
                        <option selected="" value="default">Выберите пол</option>
                        <option value="male">М</option>
                        <option value="female">Ж</option>
                    </select>
                    
                    <div class=field><label>Город проживания</label><input type="text" name="town"></div>
                    <div class=field><label>Номер телефона</label><input type="text" name="phone"></div>
                </fieldset>
                <fieldset>
                    <legend>Описание автомобиля</legend>
                    <div class=field><label>Марка</label><input type="text" name="mark"></div>
                    <div class=field><label>Модель</label><input type="text" name="model"></div>
                    <div class=field><label>Год</label><input type="text" name="year"></div>
                </fieldset>
                <input id=okButton type="submit" name="submit" value="Отправить заявку">
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