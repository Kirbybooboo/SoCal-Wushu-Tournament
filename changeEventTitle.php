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
$eventName = $_GET['eventName'];
$_SESSION['event'] = $eventName;
$eventName = str_replace("Fist", " Fist", $eventName);
$eventName = str_replace("Weapon", " Weapon", $eventName);
$eventName = str_replace("Barehand", " Barehand", $eventName);
$eventName = str_replace("SouthernStaff", "Southern Staff", $eventName);
$eventName = str_replace("SouthernBroadsword", "Southern Broadsword", $eventName);
$eventName = substr($eventName, 1);
$eventName = str_replace("hen", "Chen Style", $eventName);
$eventName = str_replace("ang", "Yang Style", $eventName);
$eventName = str_replace("aiji Weapon", "Taiji Weapon", $eventName);
echo $eventName;
?>
</body>
</html>