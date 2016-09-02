function changeDivision(level, gender, age)
{
	$("#dropdown2").load("getDivision.php?level="+level+"&gender="+gender+"&age="+age);
}

function changeCompetitor(id)
{
	$("#competitorName").load("getName.php?id="+id);
}