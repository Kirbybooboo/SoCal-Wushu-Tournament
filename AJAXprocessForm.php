<?php
include_once 'processForm.php';
$user = 'wushuclub';
$password = 'f4FreePhe';
$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");
	
	$type = $_GET['type'];
	$err = 0;
	if ($_SESSION['judgeId'] == HEAD_JUDGE_ID && $type == 0)
	{
	  $deduction = $_POST['deduction'];
	  if (!$_POST['deduction'])
	  {
	    $deduction = 0;
	  }
	  processHeadJudgeForm($deduction);
	}
	else
	{
	  if (!$_POST['score'])
	  {
	      $errScore = "Please enter score";
	      $err = 1;
	  }
	  if($err == 0)
	  {
	      processForm($_POST['score'], $_SESSION['judgeId']);
	  }
	}
?>