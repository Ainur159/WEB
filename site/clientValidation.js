function formValidation()
{
	$fName = "";
	$tName = "";
	$dateOfBirthday = "";
	$tmp = "";
	$sex = "";
	$town = "";
	$phone = "";
	$mark = "";
	$model = "";
	$year = "";
	
	
	if(fName.value == "" || !fName.value.match(/^[A-zА-я]+$/))
	{
		alert("Введите фамилию");
		return false;
	}
	else if(sName.value == "" || !sName.value.match(/^[A-zА-я]+$/))
	{
		alert("Введите имя");
		return false;
		
	}
	else if(tName.value == "" || !tName.value.match(/^[A-zА-я]+$/))
	{
		alert("Введите отчество");
		return false;
	}
	else if(dateOfBirthday.value == "" || parseInt(tmp[0]) > (2020-18))
	{
		alert("Введите верное дату рождения, больше 18 лет");
		return false;
	}
 	else if(sex.value == "default") 
	{
		alert("Выберите пол");
		return false;
	}
	else if(town.value == "" || !town.value.match(/^[A-zА-я]+$/))
	{ 
		alert("Введите город");
		return false;
	}
	else if(phone.value == ""  || !phone.value.match(/^[0-9]+$/))
	{
		alert("Введите номер телефона");
		return false;
	}
	else if(mark.value == ""  || !mark.value.match(/^[A-z]+$/))
	{
		alert("Введите марку");
		return false;
	}
	else if(model.value == "" || !model.value.match(/^[A-z0-9]+$/))
	{
		alert("Введите модель");
		return false;
	}
	else if(year.value == "" || parseInt(year.value) > 2020 || parseInt(year.value) < 1990)
	{
		alert("Год машины не больше 2020 и не меньше 1990");
		return false;
	}
	return true;
}