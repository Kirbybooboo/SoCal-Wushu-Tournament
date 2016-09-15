<?php
// Start the session
session_start();
$_SESSION['judgeId'] = $_GET['judgeId'];
?>

  <div class="row">
    <div class="input-field col s2">
      <input id="score" name="score" type="text">
      <label for="score">Score</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s8">
      <textarea id="notes1" class="materialize-textarea"></textarea>
      <label for="notes1">Notes on competitor</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s8">
      <button class="btn waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Submit score to Head Judge" type="submit" name="submit" id="submit">Submit
      <i class="material-icons right">send</i>
      </button>
    </div>
  </div>

<script>
$(document).ready(function(){
$('.tooltipped').tooltip({delay: 50});
}); 
</script>