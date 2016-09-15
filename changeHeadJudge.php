<?php
// Start the session
session_start();

include_once 'processForm.php'
?>

<!DOCTYPE html>
<html lang="en">

<table class="striped">
<thead>
  <tr>
      <th data-field="judgeId">Judge</th>
      <th data-field="score">Score</th>
  </tr>
</thead>

<tbody>

<?php 
$_SESSION['judgeId'] = HEAD_JUDGE;
$link = mysqli_connect("localhost","wushuclub","f4FreePhe")  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");
    for ($judgeId = 1; $judgeId < HEAD_JUDGE; $judgeId++)
    {
        echo '<tr><td>Judge '.$judgeId.'</td><td>';
        $scoreId = 'score'.$judgeId;
        $sql = 'SELECT '.$scoreId.' FROM eventScoring WHERE competitorId = '.$_SESSION['competitorId'].' AND eventId = '.$_SESSION['eventId'];
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        echo $row[$scoreId].'</td></tr>';
    }
?>
</tbody>
</table>

<div class="row">
<div class="input-field col s2">
  <input id="deduction" name="deduction" type="text">
  <label for="deduction">Deduction</label>
</div>
</div>

<div class="row">
<div class="input-field col s8">
  <button class="btn waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Submit Final Score" type="submit" name="submit" id="submit">Submit
  <i class="material-icons right">send</i>
  </button>
</div>
</div>

<script>
$(document).ready(function(){
$('.tooltipped').tooltip({delay: 50});
}); 
</script>