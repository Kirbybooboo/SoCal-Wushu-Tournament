<?php
// Start the session
session_start();

include_once 'divisionFunctions.php';
include_once 'processForm.php';
include_once 'navListFunctions.php';
$_SESSION = array();
$user = 'wushuclub';
$password = 'f4FreePhe';
$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SoCal Wushu Tournament Scoring</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<!--   <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
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

    <!-- Side Navigation Bar -->
    <div class="sideNavBar">
      <ul id="nav-mobile" class="side-nav fixed">
        <li class="logo">
          <a id="logo-container" class="brand-logo" style="height: 144px">
              <img class="responsive-img" src="img/front-logo.png">
          </a>
        </li>
        <li class="no-padding">
          <ul id="navEvent" class="collapsible collapsible-accordian">
            <?php
              createSideNavElements();
            ?>
          </ul>
        </li>
      </ul>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <ul class="tabs z-depth-1">
          <?php 
            if (!$_SESSION['judgeId'])
            {
              $_SESSION['judgeId'] = 1;
            }
          ?>
            <li class="tab col s3"><a href="#" onclick="setJudge(1)">Judge 1</a></li>
            <li class="tab col s3"><a href="#" onclick="setJudge(2)">Judge 2</a></li>
            <li class="tab col s3"><a href="#" onclick="setJudge(3)">Judge 3</a></li>
            <li class="tab col s3"><a href="#" onclick="setJudge(4)">Judge 4</a></li>
            <li class="tab col s3"><a href="#" onclick="setHeadJudge()">Head Judge</a></li>
          </ul>
        </div>
      </div>
      <br>
      <br>
      <a class="dropdown-button btn tooltipped" data-position="top" data-delay="50" data-tooltip="Select Level/Gender/Age" data-beloworigin="true" href='#' data-activates='dropdown1' id='divisionButton'>Division</a>
      <ul id="dropdown1" class="dropdown-content">

<?php
      setDivisionListEventId();
?>
      </ul>
      <a class='dropdown-button btn' data-beloworigin="true" href="#" data-activates='dropdown2'>Competitor</a>
      <ul id="dropdown2" class="dropdown-content">

<?php
      echo '<li><a>Empty</a></li>';
?>
      </ul>
      <br>
<?php
      $retrieveCompetitor = "SELECT id, firstName, lastName, gender, birthDate, level FROM competitors WHERE id=".$_SESSION['competitorId'];
      $result = mysqli_query($link, $retrieveCompetitor);
      $row = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) > 0)
      {
        echo "<h1 class='header' id='competitorName'>".$row['firstName']." ".$row['lastName']."</h1>";
      }
      else
      {
        echo '<h1 class="header" id="competitorName">Competitor Name</h1>';
      }
?>

      <div class="row">
        <form class="col s12" action='' method="POST" id="scoreForm">
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
              <button class="btn waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Submit score to Head Judge" type="submit" name="submit" id="submit" onclick="submitScore()">Submit
              <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <div id="submitSuccess" class="modal">
        <div class="modal-content">
          <h4>Score Submitted</h4>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
      </div>      

    </div>
  </main>
  <!--  Scripts-->
  <script src="js/scripts.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>

  </body>
</html>
