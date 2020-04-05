<?php
	require_once 'properties.php'; // подключаем скрипт
	 	 
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
	
	$mysqli = new mysqli($host, $user, $pass, $db);
	if ($mysqli->connect_error) 
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	$query = "insert into driver (fName, sName, tName, dateOfBirthday, sex, town, phone, mark, model, year) values (?,?,?,?,?,?,?,?,?,?)";
	$statement = $mysqli->prepare($query);
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('ssssissssi', $fName, $sName,$tName, $dateOfBirthday, $sex, $town, $phone, $mark, $model, $year);
	//execute query
	if($statement->execute()){
		header('Location: /index.html');
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
	$mysqli->close();
?>