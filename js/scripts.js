function setEventTitle(id)
{
	$('#eventTitle').load('setEventTitle.php?id='+id);
}

function getSideNavDivisions()
{
	$('#sideNavDivisions').load('setDivisionList.php');
}

function setCompetitorList(eventId, level, gender, age)
{
	$('#competitorDropdown').load('setCompetitorList.php?eventId='+eventId+'&level='+level+'&gender='+gender+'&age='+age);
}

function resetCompetitorList()
{
	$('#competitorDropdown').load('resetCompetitorList.php');
}

function resetCompetitor()
{
	$('#competitorName').load('resetCompetitor.php');
}


function setCompetitor(id)
{
	$('#competitorName').load('setCompetitor.php?id='+id);
}

function submitScore(type)
{
	$('#scoreForm').submit(function(e)
	{
    $.ajax({
           type: 'POST',
           url: 'AJAXprocessForm.php?type='+type,
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
	$('#scoreForm').load('setJudge.php?judgeId='+judge);
	Materialize.toast('Now Judge '+judge, 4000);
}

function setJudgeDropdownTitle(judge)
{
	$('#judgeDropdownTitle').load('setJudgeDropDownTitle.php?judge='+judge);
}

function setHeadJudge()
{
	$('#scoreForm').load('setHeadJudge.php');
	Materialize.toast('Now Head Judge', 4000)
}

function refreshTable()
{
	$('#tableBody').load('refreshTable.php');
}

function refreshFinalScore()
{
	$('#totalScore').load('refreshFinalScore.php');
}