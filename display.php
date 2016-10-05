<?php
// Start the session
session_start();

include_once 'divisionFunctions.php';
include_once 'processForm.php';
include_once 'navListFunctions.php';
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
</head>
<body>
  <header>
<!-- Top Navigation Bar -->
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
<!-- Competitor Dropdown -->
        <ul class="right hide-on-med-and-down">
          <ul id="competitorDropdown" class="dropdown-content">
            <li><a href="#!">Empty</a></li>
          </ul>
          <li><a class='dropdown-button' data-beloworigin="true" href="#" data-activates='competitorDropdown' style="font-size: 16px;margin-top: 24px;">Competitor<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
<!-- Events Side Nav-->
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
              getSideNavEvents();
            ?>
          </ul>
        </li>
      </ul>
    </div>
  </header>
  <main>
<!-- Division Side Nav -->
      <ul id="slide-out" class="side-nav">  
      <li class="logo">
        <a id="logo-container" class="brand-logo" style="height: 144px">
            <img class="responsive-img" src="img/front-logo.png">
        </a>
      </li>
      <li class="no-padding">
        <ul id="sideNavDivisions" class="collapsible collapsible-accordian">
          <?php
            getSideNavDivisions();
          ?>
        </ul>
      </li>
    </ul>
    <div class="container">
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

    </div>
  </main>
  <!--  Scripts-->
  <script src="js/scripts.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script>$(".button-collapse").sideNav({closeOnClick: true});</script>

  </body>
</html>
