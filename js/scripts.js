function changeDivision(event, level, gender, age)
{
	$("#dropdown2").load("getDivision.php?event="+event+"&level="+level+"&gender="+gender+"&age="+age);
}

function changeCompetitor(id)
{
	$("#competitorName").load("getCompetitor.php?id="+id);
}

function changeEventTitle(eventName)
{
	$("#eventTitle").load("changeEventTitle.php?eventName="+eventName);
}

function changeDivisionList()
{
	$("#divisionList").load("changeDivisionList.php");
}

function changeActiveNavBar(eventName, style)
{
	$("#navEvent").load("changeNavBar.php?eventName="+eventName+"&style="+style);
}