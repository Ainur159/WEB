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
            
			<?php 
				require "include/.properties";
				
	
				if(!$_SESSION['user'])
				{
					echo 'Авторизуйтесь перед поиском';
					exit;
				}
				
				$mysqli = new mysqli($host, $_SESSION['user'], $_SESSION['pass'], $db);
				
				if (!$mysqli) 
				{ 
				   header("HTTP/1.0 501 NotImplemented"); 
				   exit; 
				} 
				
				if(!isset($_POST['name']))
					$sql = "SELECT fName,sName,tName,phone,mark,model,year from driver";
				else 
				{
					$sql = "SELECT fName,sName,tName,phone,mark,model,year from driver where INSTR(CONCAT_WS(' ', fName, sName, tName),?) <> 0";
					$name = htmlentities($_POST['name']);
				}
				
				$stmt = $mysqli->prepare("SELECT fName,sName,tName,phone,mark,model,year from driver where INSTR(CONCAT_WS(' ', fName, sName, tName),?) <> 0");
				if(!$stmt)
				{
					header("HTTP/1.0 501 NotImplemented"); 
					exit;
				}
				$stmt->bind_param("s", $name);
				$stmt->execute();
				$stmt->store_result();
				
				if($stmt->num_rows == 0) 
					echo('Таковых нет!');
				else
				{
					echo "<span>Число участников: " . $stmt->num_rows . "</span>";
					echo '<table border="1">
							<tr>
								<th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Телефон</th><th>Марка</th><th>Модель</th><th>Год</th>
							</tr>';
					
					$stmt->bind_result($fName, $sName, $tName, $phone, $mark, $model, $year);
					while($stmt->fetch()) 
					{
						echo '<tr>';
						echo '<td>'.$fName.'</td>';
						echo '<td>'.$sName.'</td>';
						echo '<td>'.$tName.'</td>';
						echo '<td>'.$phone.'</td>';
						echo '<td>'.$mark.'</td>';
						echo '<td>'.$model.'</td>';
						echo '<td>'.$year.'</td>';
						echo '</tr>';
					}
					echo '</table>';
					$stmt->close();
				}
				$mysqli->close();
			?>
            
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