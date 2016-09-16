<?php
// Start the session
session_start();
include_once 'divisionFunctions.php';
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