<?php 

include_once 'processForm.php';

function makeTable()
{
	$user = 'wushuclub';
	$password = 'f4FreePhe';
	$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
	mysqli_select_db($link,"wushuclub");
	    for ($judgeId = 1; $judgeId < HEAD_JUDGE_ID; $judgeId++)
	    {
	        echo '<tr><td>Judge '.$judgeId.'</td><td>';
	        $scoreId = 'score'.$judgeId;
	        $sql = 'SELECT '.$scoreId.' FROM eventScoring WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId = '.$_SESSION['eventId'];
	        $result = mysqli_query($link, $sql);
	        $row = mysqli_fetch_assoc($result);
	        echo $row[$scoreId].'</td></tr>';
	    }
}
 ?>