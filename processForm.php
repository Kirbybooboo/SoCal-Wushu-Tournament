<?php
// Start the session
session_start();

include_once 'divisionFunctions.php';
include_once 'headJudgeFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php

CONST HEAD_JUDGE_ID=5;

function processForm($score, $judgeId)
{
    $user = 'wushuclub';
    $password = 'f4FreePhe';
    $link = mysqli_connect("localhost", $user, $password)  or die ("failed to connect to server from processForm!!");
    mysqli_select_db($link,"wushuclub");

    $scoreId = 'score'.strval($judgeId);

    $insertScore='UPDATE eventScoring SET '.$scoreId.' = '.$score.' 
                  WHERE competitorId ='.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
    mysqli_query($link,$insertScore) or die(mysqli_error($link));
    
}

function processHeadJudgeForm($deduction)
{
    $user = 'wushuclub';
    $password = 'f4FreePhe';
    $link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server from processHeadJudgeForm!!");
    mysqli_select_db($link,"wushuclub");
    $scoreTotal = evaluateFinalScore($deduction);
    $insertScoreTotal='UPDATE eventScoring SET scoreTotal= '.$scoreTotal.' WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
    mysqli_query($link,$insertScoreTotal);
}
?>