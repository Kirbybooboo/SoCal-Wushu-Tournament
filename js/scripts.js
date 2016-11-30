function setEventTitle(id)
{
	$('#eventTitle').load('views/setEventTitle.php?id='+id);
}

function getSideNavDivisions()
{
	$('#sideNavDivisions').load('views/setDivisionList.php');
}

function setCompetitorList(eventId, level, gender, age)
{
	$('#competitorDropdown').load('views/setCompetitorList.php?eventId='+eventId+'&level='+level+'&gender='+gender+'&age='+age);
}

function resetCompetitorList()
{
	$('#competitorDropdown').load('views/resetCompetitorList.php');
}

function resetCompetitor()
{
	$('#competitorName').load('views/resetCompetitor.php');
}


function setCompetitor(id)
{
	$('#competitorName').load('views/setCompetitor.php?id='+id);
}

function submitScore(type)
{
	$('#scoreForm').submit(function(e)
	{
    $.ajax({
           type: 'POST',
           url: 'controllers/AJAXprocessForm.php?type='+type,
           data: $('#scoreForm').serialize(),
           success: function(data)
           {
               $('#submitSuccess').openModal();
           }
         });
    e.preventDefault();
	});
}

function setJudge(judge)
{
	$('#scoreForm').load('views/setJudge.php?judgeId='+judge);
	Materialize.toast('Now Judge '+judge, 4000);
}

function setJudgeDropdownTitle(judge)
{
	$('#judgeDropdownTitle').load('views/setJudgeDropDownTitle.php?judge='+judge);
}

function setHeadJudge()
{
	$('#scoreForm').load('views/setHeadJudge.php');
	Materialize.toast('Now Head Judge', 4000)
}

function refreshTable()
{
	$('#tableBody').load('views/refreshTable.php');
}

function refreshFinalScore()
{
	$('#totalScore').load('views/refreshFinalScore.php');
}