<?php

const LEVEL_ADVANCE='advance';
const LEVEL_INTERMEDIATE='intermediate';
const LEVEL_BEGINNER='beginner';

const GENDER_FEMALE='female';
const GENDER_MALE='male';

const AGE_ADULT='adult';
const AGE_TEEN='teen';
const AGE_CHILD='child';
	
const STYLE_CONTEMPORARY='Contemporary';
const STYLE_TRADITIONAL='Traditional';
const STYLE_INTERNAL='Internal';

CONST HEAD_JUDGE_ID=5;

// Division Functions
function abbreviateDivision($level, $gender, $age)
{
	return strtoupper(substr($level,0,1)).strtoupper(substr($gender,0,1)).strtoupper(substr($age,0,1));
}

function setDivisionListButton($level, $gender, $age)
{
	$abbrev = abbreviateDivision($level, $gender, $age);
	echo $abbrev;
}

// Head Judge Functions
function makeTable()
{
	$user = 'wushuclub';
	$password = 'f4FreePhe';
	$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
	mysqli_select_db($link,"wushuclub");
	
    for ($judgeId = 1; $judgeId <= HEAD_JUDGE_ID; $judgeId++)
    {
        echo '<tr><td>Judge '.$judgeId.'</td><td>';
        $scoreId = 'score'.$judgeId;
        $sql = 'SELECT '.$scoreId.' FROM eventScoring WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId = '.$_SESSION['eventId'];
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        echo $row[$scoreId].'</td></tr>';
    }
}

function evaluateFinalScore($deduction)
{
    $user = 'wushuclub';
    $password = 'f4FreePhe';
    $link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server from processHeadJudgeForm!!");
    mysqli_select_db($link,"wushuclub");
    $retrieveAllScores = 'SELECT score1, score2, score3, score4, score5 FROM eventScoring WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId = '.$_SESSION['eventId'];
    $result = mysqli_query($link, $retrieveAllScores);
    $row = mysqli_fetch_assoc($result);
    $scores = array($row['score1'], $row['score2'], $row['score3'], $row['score4'], $row['score5']);
    sort($scores);
    array_pop($scores);
    array_shift($scores);
    $scoreTotal = (array_sum($scores)/count($scores)) - abs($deduction);
    return $scoreTotal;
}

//Process Form Functions
function processForm($score, $judgeId)
{
    $user = 'wushuclub';
    $password = 'f4FreePhe';
    $link = mysqli_connect("localhost", $user, $password)  or die ("failed to connect to server from processForm!!");
    mysqli_select_db($link,"wushuclub");

    $scoreId = 'score'.strval($judgeId);

    $insertScore='UPDATE eventScoring SET '.$scoreId.' = '.$score.' 
                  WHERE competitorId ='.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
    mysqli_query($link,$insertScore) or die(mysqli_error($link));
    
}

function processHeadJudgeForm($deduction)
{
    $user = 'wushuclub';
    $password = 'f4FreePhe';
    $link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server from processHeadJudgeForm!!");
    mysqli_select_db($link,"wushuclub");
    $scoreTotal = evaluateFinalScore($deduction);
    $insertScoreTotal='UPDATE eventScoring SET scoreTotal= '.$scoreTotal.' WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
    mysqli_query($link,$insertScoreTotal);
}

//Side nav functions
function getSideNavEvents()
{
	$user = 'wushuclub';
	$password = 'f4FreePhe';
	$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
	mysqli_select_db($link,"wushuclub");
    $styles=array(STYLE_CONTEMPORARY, STYLE_TRADITIONAL, STYLE_INTERNAL);
    foreach($styles as $style)
    {
		$sql ='SELECT style FROM `eventDefinition` WHERE id='.$_SESSION['eventId'];
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
		if (strcmp($row['style'], $style) == 0)
		{
			echo '<li class="bold active"><a class="collapsible-header active waves-effect waves-pink">'.$style.'</a><div class="collapsible-body"><ul>';
		}
		else
		{
			echo '<li class="bold"><a class="collapsible-header waves-effect waves-pink">'.$style.'</a><div class="collapsible-body"><ul>';
		}

		$sql = 'SELECT * FROM `eventDefinition` WHERE `style`="'.$style.'"';
		$result = mysqli_query($link, $sql);
		while ($row = mysqli_fetch_assoc($result))
		{
		echo '<li><a class="waves-effect button-collapse" href="#" data-activates="slide-out" onclick="setEventTitle('.$row['id'].');getSideNavDivisions();resetCompetitor();resetCompetitorList();">'.$row['eventName'].'</a></li>';
		}
		echo '</ul></div></li>';
    }
}

function getSideNavDivisions()
{
	$levels = array(LEVEL_BEGINNER, LEVEL_INTERMEDIATE, LEVEL_ADVANCE);
	$genders = array(GENDER_FEMALE, GENDER_MALE);
	$ages = array(AGE_CHILD, AGE_TEEN, AGE_ADULT);
	$user = 'wushuclub';
	$password = 'f4FreePhe';
	$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
	mysqli_select_db($link,"wushuclub");
	foreach($levels as $level)
	{
		echo '<li class="bold"><a class="collapsible-header waves-effect waves-pink">'.ucfirst($level).'</a><div class="collapsible-body"><ul>';
		$sql = 'SELECT * FROM `divisionDefinition` WHERE `level` = "'.$level.'"';
		$result = mysqli_query($link, $sql);
		while ($row = mysqli_fetch_assoc($result))
		{
			echo '<li><a class="waves-effect" href="#" onclick="setCompetitorList('.$_SESSION['eventId'].',\''.$row['level'].'\',\''.$row['gender'].'\',\''.$row['age'].'\')">'.ucfirst($row['gender']).' '.ucfirst($row['age']).'</a></li>';
		}
		echo '</ul></div></li>';
	}
}	
?>