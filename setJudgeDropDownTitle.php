<?php
session_start();
$judge = $_GET['judge'];
	if ($judge != 6)
	{
		echo 'Judge '.$judge.'<i class="material-icons right">arrow_drop_down</i>';
	}
	else
	{
		echo 'Head Judge<i class="material-icons right">arrow_drop_down</i>';
	}
?>