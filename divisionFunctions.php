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

function abbreviateDivision($level, $gender, $age)
{
	return strtoupper(substr($level,0,1)).strtoupper(substr($gender,0,1)).strtoupper(substr($age,0,1));
}

function setDivisionListButton($level, $gender, $age)
{
	$abbrev = abbreviateDivision($level, $gender, $age);
	echo $abbrev;
}

?>