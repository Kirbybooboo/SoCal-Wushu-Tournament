<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
$event = ($_GET['event']);
$id = htmlspecialchars($_GET['id']);
$con = mysqli_connect('localhost','wushuclub','f4FreePhe') or die ("failed to connect to server !!");
mysqli_select_db($con,"wushuclub");

$sql="SELECT  id, firstName, lastName, gender, birthDate, level FROM `".$event."` WHERE id ='".$id."'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result)) {
    echo "<h2 id='competitorName' class='header'>".$row['firstName']." ".$row['lastName']."</h2>";
    }
}
else
{
    echo "<h2 id='competitorName' class='header'>Error, Can't find ID</h2>";
}
mysqli_close($con);
?>
</body>
</html>