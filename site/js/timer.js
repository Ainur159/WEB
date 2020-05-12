function initializeTimer(endDate) { 
	var currentDate = new Date(); 
	var seconds = (endDate-currentDate) / 1000;  // разность в милисеккундах
	if (seconds > 0) 
	{
		var minutes = seconds/60; 
		var hours = minutes/60;
		var days = hours/24;
		
		minutes = (hours - Math.floor(hours)) * 60; 
		days = Math.floor(days);
		hours =  Math.floor(hours) - days * 24; 
 
		seconds = Math.floor((minutes - Math.floor(minutes)) * 60); 
		minutes = Math.floor(minutes); 
 
		setTimePage(days, hours,minutes,seconds);
	}
	else 
	{
		setTimePage(0,0,0,0);
	}
}

window.onload = function()		// Единожно выводить при загрузке страницы
{
     initializeTimer(new Date(2020, 05, 28));
}

function setTimePage(d,h,m,s) { 
	var days = document.getElementById("days");
	var hours = document.getElementById("hours"); 
	var minutes = document.getElementById("minutes"); 
	var seconds = document.getElementById("seconds"); 
 
	days.innerHTML = d;
	hours.innerHTML = h;
	minutes.innerHTML = m;
	seconds.innerHTML = s;
 
}
