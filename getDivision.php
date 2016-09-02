<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
$level = ($_GET['level']);
$gender = ($_GET['gender']);
$age = ($_GET['age']);


$con = mysqli_connect('localhost','wushuclub','f4FreePhe') or die ("failed to connect to server !!");
mysqli_select_db($con,"wushuclub");


if (strcmp($age, "child") == 0)
{
	$sql="SELECT  id, firstName, lastName, gender, birthDate, level FROM cLongFist WHERE level ='".$level."' AND gender ='".$gender."' AND birthDate > '2004-01-01'";
}
else if (strcmp($age, "teen") == 0)
{
	$sql="SELECT  id, firstName, lastName, gender, birthDate, level FROM cLongFist WHERE level ='".$level."' AND gender ='".$gender."' AND birthDate between '1999-01-01' AND '2004-01-01'";
}
else if (strcmp($age, "adult") == 0)
{
	$sql="SELECT  id, firstName, lastName, gender, birthDate, level FROM cLongFist WHERE level ='".$level."' AND gender ='".$gender."' AND birthDate < '1999-01-01'";
}

$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
    	echo "<li><a onclick='changeCompetitor(".$row['id'].")'>".$row['firstName']." ".$row['lastName']."</a></li>";
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