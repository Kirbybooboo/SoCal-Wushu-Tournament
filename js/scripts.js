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

function abbreviateDivision(level, gender, age)
{
	$("#divisionButton").load("changeDivisionButton.php?level="+level+"&gender="+gender+"&age="+age);
	Materialize.toast(level+"/"+gender+"/"+age, 4000);
}

function changeJudge(judge)
{
	$("#scoreForm").load("changeJudge.php?judgeId="+judge);
	Materialize.toast('Now Judge '+judge, 4000);
}

function changeHeadJudge()
{
	$("#scoreForm").load("changeHeadJudge.php");
	Materialize.toast('Now Head Judge', 4000)
}