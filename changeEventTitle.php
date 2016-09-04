<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
$eventName = ($_GET['eventName']);
echo str_replace("_", " ", $eventName);
?>
</body>
</html>