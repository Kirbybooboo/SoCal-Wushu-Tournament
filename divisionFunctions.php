<?php

const LEVEL_ADVANCE='advance';
const LEVEL_INTERMEDIATE='intermediate';
const LEVEL_BEGINNER='beginner';

const GENDER_FEMALE='female';
const GENDER_MALE='male';

const AGE_ADULT='adult';
const AGE_TEEN='teen';
const AGE_CHILD='child';
	
const STYLE_CONTEMPORARY='Contemporary';
const STYLE_TRADITIONAL='Traditional';
const STYLE_INTERNAL='Internal';



function changeDivisionListEventId()
{
	if ($_SESSION['eventId'])
	{
		$levelList = array(LEVEL_ADVANCE, LEVEL_INTERMEDIATE, LEVEL_BEGINNER);
		$genderList = array(GENDER_FEMALE, GENDER_MALE);
		$ageList = array(AGE_ADULT, AGE_TEEN, AGE_CHILD);
		foreach($levelList as $level)
		{
		  foreach($genderList as $gender)
		  {
		    foreach($ageList as $age)
		    {
		      $abbrev = abbreviateDivision($level,$gender,$age);
		      echo '<li><a onclick="abbreviateDivision(\''.$level.'\',\''.$gender.'\',\''.$age.'\'); changeDivision('.$_SESSION['eventId'].',\''.$level.'\',\''.$gender.'\',\''.$age.'\')">'.$abbrev.'</a></li>';
		    }
		  }
		  echo '<li class=\'divider\'></li>';
		}
	}
	else
	{
		echo '<li><a>Select Event First</a></li>';
	}
}

function abbreviateDivision($level, $gender, $age)
{
	return strtoupper(substr($level,0,1)).strtoupper(substr($gender,0,1)).strtoupper(substr($age,0,1));
}

function changeDivisionListButton($level, $gender, $age)
{
	$abbrev = abbreviateDivision($level, $gender, $age);
	echo $abbrev;
}

?>