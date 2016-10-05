<?php

include_once 'divisionFunctions.php';


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