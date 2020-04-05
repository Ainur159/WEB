<?php 
	require_once 'properties.php'; // подключаем скрипт
	 	 
	
	if(!isset($_POST['name']))
	{ 
		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_error) 
			die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		$results = $mysqli->query("SELECT fName,sName,tName,phone,mark,model,year from driver") or die($mysqli->error);
		echo "<span>Число участников" . $results->num_rows."</span>";
		print '<table border="1">
				<tr>
					<th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Телефон</th><th>Марка</th><th>Модель</th><th>Год</th>
				</tr>';
		while($row = $results->fetch_assoc()) 
		{
			print '<tr>';
			print '<td>'.$row["fName"].'</td>';
			print '<td>'.$row["sName"].'</td>';
			print '<td>'.$row["tName"].'</td>';
			print '<td>'.$row["phone"].'</td>';
			print '<td>'.$row["mark"].'</td>';
			print '<td>'.$row["model"].'</td>';
			print '<td>'.$row["year"].'</td>';
			print '</tr>';
		}
		print '</table>';
		$results->free();
		$mysqli->close();
	}
	else
	{
		$name = htmlentities($_POST['name']);
		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_error) 
			die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		$stmt = $mysqli->prepare("SELECT fName,sName,tName,phone,mark,model,year from driver where INSTR(CONCAT_WS(' ', fName, sName, tName),?) <> 0");
		$stmt->bind_param("s", $name);
		$stmt->execute();
		$stmt->store_result();
		
		if($stmt->num_rows == 0) 
			print('Haven\'t driver');
		else
		{
			echo "<span>Число участников" . $results->num_rows."</span>";
			print '<table border="1">
					<tr>
						<th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Телефон</th><th>Марка</th><th>Модель</th><th>Год</th>
					</tr>';
			
			$stmt->bind_result($fName, $sName, $tName, $phone, $mark, $model, $year);
			while($stmt->fetch()) 
			{
				print '<tr>';
				print '<td>'.$fName.'</td>';
				print '<td>'.$sName.'</td>';
				print '<td>'.$tName.'</td>';
				print '<td>'.$phone.'</td>';
				print '<td>'.$mark.'</td>';
				print '<td>'.$model.'</td>';
				print '<td>'.$year.'</td>';
				print '</tr>';
			}
			print '</table>';
			$stmt->close();
		}
		$mysqli->close();
	}
?>	