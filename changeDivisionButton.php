<?php
// Start the session
session_start();
include_once 'divisionList.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
changeDivisionListButton($_GET['level'],$_GET['gender'],$_GET['age']);
?>
</body>
</html>