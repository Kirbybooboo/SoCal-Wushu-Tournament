<?php

include_once 'divisionList.php';


function createSideNavElements($link)
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
		echo '<li><a class="waves-effect" href="#" onclick="changeEventTitle('.$row['id'].');changeDivisionList();resetCompetitor();resetDivisionButton();resetCompetitorList();">'.$row['eventName'].'</a></li>';
		}
		echo '</ul></div></li>';
    }
}
?>