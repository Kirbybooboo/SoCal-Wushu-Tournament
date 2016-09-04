function changeDivision(event, level, gender, age)
{
	$("#dropdown2").load("getDivision.php?event="+event+"&level="+level+"&gender="+gender+"&age="+age);
}

function changeCompetitor(event, id)
{
	$("#competitorName").load("getName.php?event="+event+"&id="+id);
}

function changeEventTitle(eventName)
{
	$("#eventTitle").load("changeEventTitle.php?eventName="+eventName);
}