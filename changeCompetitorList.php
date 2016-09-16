<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
$eventId = ($_GET['eventId']);
$level = ($_GET['level']);
$gender = ($_GET['gender']);
$age = ($_GET['age']);

$user = 'wushuclub';
$password = 'f4FreePhe';
$con = mysqli_connect('localhost',$user,$password) or die ("failed to connect to server !!");
mysqli_select_db($con,"wushuclub");

if (strcmp($age, "child") == 0)
{
	$sql="SELECT  id, firstName, lastName, gender, birthDate, level FROM `competitors` INNER JOIN `eventScoring` ON competitors.id = eventScoring.competitorId WHERE eventScoring.eventId = ".$eventId." AND level ='".$level."' AND gender ='".$gender."' AND birthDate > '2004-01-01'";
}
else if (strcmp($age, "teen") == 0)
{
	$sql="SELECT  id, firstName, lastName, gender, birthDate, level FROM `competitors` INNER JOIN `eventScoring` ON competitors.id = eventScoring.competitorId WHERE eventScoring.eventId = ".$eventId." AND level ='".$level."' AND gender ='".$gender."' AND birthDate BETWEEN '1999-01-01' AND '2004-01-01'";
}
else if (strcmp($age, "adult") == 0)
{
	$sql='SELECT id, firstName, lastName, gender, birthDate, level FROM competitors INNER JOIN eventScoring ON competitors.id = eventScoring.competitorId WHERE eventScoring.eventId = '.$eventId.' AND level ="'.$level.'" AND gender ="'.$gender.'" AND birthDate < "1999-01-01"';
}

$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
    	echo "<li><a onclick='changeCompetitor(".$row['id'].");refreshTable();refreshFinalScore();'>".$row['firstName']." ".$row['lastName']."</a></li>";
    }
}
else
{
    echo "<li><a>Empty</a></li>";
}
mysqli_close($con);
?>
</body>
</html>