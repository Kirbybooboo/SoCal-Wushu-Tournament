function changeEventTitle(id)
{
	$("#eventTitle").load("changeEventTitle.php?id="+id);
}

function changeDivisionList()
{
	$("#dropdown1").load("changeDivisionList.php");
}

function changeDivision(eventId, level, gender, age)
{
	$("#dropdown2").load("changeCompetitorList.php?eventId="+eventId+"&level="+level+"&gender="+gender+"&age="+age);
}

function resetDivisionButton()
{
	$("#divisionButton").load("resetDivisionButton.php");
}

function abbreviateDivision(level, gender, age)
{
	$("#divisionButton").load("changeDivisionButton.php?level="+level+"&gender="+gender+"&age="+age);
	Materialize.toast(level+"/"+gender+"/"+age, 4000);
}

function resetCompetitorList()
{
	$("#dropdown2").load("resetCompetitorList.php");
}

function resetCompetitor()
{
	$("#competitorName").load("resetCompetitor.php");
	Materialize.toast("Filters Cleared", 4000);
}


function changeCompetitor(id)
{
	$("#competitorName").load("changeCompetitor.php?id="+id);
}

function submitScore()
{
	$("#scoreForm").submit(function(e)
	{
    $.ajax({
           type: "POST",
           url: "AJAXprocessForm.php",
           data: $("#scoreForm").serialize(),
           success: function(data)
           {
               $('#submitSuccess').openModal();
           }
         });
    e.preventDefault();
	});
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

function refreshTable()
{
	$("#tableBody").load("refreshTable.php");
}

function refreshFinalScore()
{
	$("#totalScore").load("refreshFinalScore.php");
}