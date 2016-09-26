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
	$user = 'wushuclub';
	$password = 'f4FreePhe';
	$_SESSION['eventId'] = $_GET['id'];
	$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
	mysqli_select_db($link,"wushuclub");
	$sql = 'SELECT eventName FROM eventDefinition WHERE id='.$_SESSION['eventId'];
	$result = mysqli_query($link, $sql);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo $row['eventName'];
	}

?>
</body>
</html>