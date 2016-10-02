<?php
// Start the session
session_start();

include_once 'headJudgeFunctions.php';

?>

<!DOCTYPE html>
<html lang="en">

<div class="row">
<div class="input-field col s8">
  <a class="waves-effect waves-light btn" onclick="refreshTable();refreshFinalScore();">Refresh</a>
</div>
</div>

<table class="striped">
<thead>
  <tr>
      <th data-field="judgeId">Judge</th>
      <th data-field="score">Score</th>
  </tr>
</thead>

<tbody id="tableBody">

<?php 
  $_SESSION['judgeId'] = HEAD_JUDGE_ID;
  makeTable();
  $totalScore = evaluateFinalScore();
?>
</tbody>
</table>
<br>
<div class="chips chips-placeholder"></div>
<div class="row">
  <div class="input-field col s3">
    <input id="deduction" name="deduction" type="text">
    <label for="deduction">Deduction (Use Decimal)</label>
  </div>
  <div class="col s7 offset-s1">
  <?php 
    echo '<h2 id="totalScore">Final Score: '.$totalScore.'</h2>';
   ?>  
  </div>
</div>

<div class="row">
<div class="input-field col s8">
  <button class="btn waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Submit Final Score" type="submit" name="submit" id="submit" onclick="submitScore(0)">Submit
  <i class="material-icons right">send</i>
  </button>
</div>
</div>

<script>
$(document).ready(function()
{
  $('.tooltipped').tooltip({delay: 50});
  $('.chips-placeholder').material_chip({
    placeholder: 'Enter deduction code',
    secondaryPlaceholder: '+Deduction Code',
  });
});

</script>