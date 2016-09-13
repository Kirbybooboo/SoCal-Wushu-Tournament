function changeDivision(eventId, level, gender, age)
{
	$("#dropdown2").load("getDivision.php?eventId="+eventId+"&level="+level+"&gender="+gender+"&age="+age);
}

function changeCompetitor(id)
{
	$("#competitorName").load("getCompetitor.php?id="+id);
}

function changeEventTitle(id)
{
	$("#eventTitle").load("changeEventTitle.php?id="+id);
}

function changeDivisionList()
{
	$("#dropdown1").load("changeDivisionList.php");
}

function changeActiveNavBar(eventName, style)
{
	$("#navEvent").load("changeNavBar.php?eventName="+eventName+"&style="+style);
}

function abbreviateDivision(level, gender, age)
{
	$("#divisionButton").load("changeDivisionButton.php?level="+level+"&gender="+gender+"&age="+age);
}