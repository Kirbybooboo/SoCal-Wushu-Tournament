<?php
// Start the session
session_start();

include_once 'divisionList.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
$link = mysqli_connect("localhost","wushuclub","f4FreePhe")  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");

if(isset($_REQUEST['submit'])) {
    $scores = array($_POST['score1'], $_POST['score2'], $_POST['score3'], $_POST['score4']);
    $deductions = $_POST['deductions'];
    $err = 0;
    if (!$_POST['score1'] || !$_POST['score2'] || !$_POST['score3'] || !$_POST['score4']) 
    {
        $errScore = "Please enter score";
        $err = 1;
    }
    if (!$_POST['deductions'])
    {
        $deductions = 0;
    }
    if (!$err) {
        $insertScore='UPDATE eventScoring SET score1='.$scores[0].', score2='.$scores[1].', score3='.$scores[2].', score4='.$scores[3].' 
                      WHERE competitorId ='.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
        mysqli_query($link,$insertScore) or die(mysqli_error($link));
        sort($scores);
        array_pop($scores);
        array_shift($scores);
        $scoreTotal = (array_sum($scores)/count($scores)) - abs($deductions);
        $insertScoreTotal='UPDATE eventScoring SET scoreTotal='.$scoreTotal.' WHERE competitorId ='.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
        mysqli_query($link,$insertScoreTotal) or die(mysql_error($link));
    }
}
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SoCal Wushu Tournament Scoring</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <header>
    <nav class="indigo" role="navigation" style="height: 144px">
      <div class="nav-wrapper container">
      <?php
        if (!$_SESSION['eventId'])
        {
          echo '<a class="page-title" id="eventTitle">No Event Selected</a>';
        }
        else
        {
          $sql = 'SELECT eventName FROM eventDefinition WHERE id = '.$_SESSION['eventId'];
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result))
          {
            echo '<a class="page-title" id="eventTitle">'.$row['eventName'].'</a>';
          }
        }
      ?>
      </div>
    </nav>
    <ul id="nav-mobile" class="side-nav fixed">
      <li class="logo">
        <a id="logo-container" class="brand-logo" style="height: 144px">
            <img class="responsive-img" src="img/front-logo.png">
        </a>
      </li>
      <li class="no-padding">
        <ul id="navEvent" class="collapsible collapsible-accordian">
          <li class="bold active">
            <a class="collapsible-header active waves-effect waves-pink">Contemporary</a>
            <div class="collapsible-body">
              <ul>
                <?php
                  $sql = 'SELECT `id`,`eventName` FROM `eventDefinition` WHERE `style`="Contemporary"';
                  $result = mysqli_query($link, $sql);
                  while ($row = mysqli_fetch_assoc($result))
                  {
                    echo '<li><a class="waves-effect" href="#" onclick="changeEventTitle('.$row['id'].');changeDivisionList()">'.$row['eventName'].'</a></li>';
                  }
                ?>
              </ul>

            </div>
          </li>
          <li class="bold">
            <a class="collapsible-header waves-effect waves-pink">Traditional</a>
            <div class="collapsible-body">
              <ul>
                <?php
                    $sql = 'SELECT `id`,`eventName` FROM `eventDefinition` WHERE `style`="Traditional"';
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                      echo '<li><a class="waves-effect" href="#" onclick="changeEventTitle('.$row['id'].');changeDivisionList()">'.$row['eventName'].'</a></li>';
                    }
                ?>
              </ul>
            </div>
          </li>
          <li class="bold">
            <a class="collapsible-header waves-effect waves-pink">Internal</a>
            <div class="collapsible-body">
              <ul>
                <?php
                    $sql = 'SELECT `id`,`eventName` FROM `eventDefinition` WHERE `style`="Internal"';
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                      echo '<li><a class="waves-effect" href="#" onclick="changeEventTitle('.$row['id'].');changeDivisionList()">'.$row['eventName'].'</a></li>';
                    }
                ?>
              </ul>
            </div>
          </li>
        </ul>

      </li>
    </ul>
  </header>

  <main>
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a href="#judge1">Judge 1</a></li>
          <li class="tab col s3"><a href="#judge2">Judge 2</a></li>
          <li class="tab col s3"><a href="#judge3">Judge 3</a></li>
          <li class="tab col s3"><a href="#judge4">Judge 4</a></li>
          <li class="tab col s3"><a href="#headjudge">Head Judge</a></li>
        </ul>
      </div>
    </div>
    <div class="container">
      <a class='dropdown-button btn' href='#' data-activates='dropdown1' id='divisionButton'>Level/Gender/Age</a>
      <ul id="dropdown1" class="dropdown-content">

<?php
      changeDivisionListEventId();
?>
      </ul>
      <a class='dropdown-button btn' href="#" data-activates='dropdown2'>Competitor</a>
      <ul id="dropdown2" class="dropdown-content">

<?php
      if(!$_SESSION['eventId'])
      {
        echo '<li><a>Empty</a></li>';
      }
      else
      {
        $sql = 'SELECT * FROM eventScoring RIGHT JOIN competitors ON eventScoring.competitorId = competitors.id WHERE eventId='.$_SESSION['eventId'];
        $result = mysqli_query($link,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
          echo '<li><a>'.$row['firstName'].' '.$row['lastName'].'</a></li>';
        }
      }
?>
      </ul>
      <br>
<?php
      $retrieveCompetitor = "SELECT id, firstName, lastName, gender, birthDate, level FROM competitors WHERE id=".$_SESSION['id'];
      $result = mysqli_query($link, $retrieveCompetitor);
      $row = mysqli_fetch_assoc($result);
      echo "<div id='competitorName'>";
      echo "<h2 class='header'>".$row['firstName']." ".$row['lastName']."</h2>";
      echo "</div>";
?>

      <div class="row">
        <form class="col s12" action='' method="POST">
          <div class="row">
            <div class="input-field col s2">
              <input id="score1" name="score1" type="text">
              <label for="score1">Score 1</label>
            </div>
            <div class="input-field col s2">
              <input id="score2" name="score2" type="text">
              <label for="score2">Score 2</label>
            </div>
            <div class="input-field col s2">
              <input id="score3" name="score3" type="text">
              <label for="score3">Score 3</label>
            </div>
            <div class="input-field col s2">
              <input id="score4" name="score4" type="text">
              <label for="score4">Score 4</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s2">
              <input id="deductions" name="deductions" type="text">
              <label for="deductions">Deductions</label>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="notes1" class="materialize-textarea"></textarea>
              <label for="notes1">Notes on competitor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>      
    </div>
  </main>
  <!--  Scripts-->
  <script src="js/scripts.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
