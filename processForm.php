<?php
// Start the session
session_start();

include_once 'divisionFunctions.php';
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
    $retrieveAllScores = 'SELECT score1, score2, score3, score4 FROM eventScoring WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId = '.$_SESSION['eventId'];
    $result = mysqli_query($link, $retrieveAllScores);
    $row = mysqli_fetch_assoc($result);
    $scores = array($row['score1'], $row['score2'], $row['score3'], $row['score4']);
    sort($scores);
    array_pop($scores);
    array_shift($scores);
    $scoreTotal = (array_sum($scores)/count($scores)) - abs($deduction);
    $insertScoreTotal='UPDATE eventScoring SET scoreTotal= '.$scoreTotal.' WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
    mysqli_query($link,$insertScoreTotal);

}
?>