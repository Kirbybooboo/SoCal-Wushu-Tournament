<?php
// Start the session
session_start();
include_once 'divisionFunctions.php';

setDivisionListButton($_GET['level'],$_GET['gender'],$_GET['age']);
?>
