<?php
// Start the session
session_start();

include_once 'divisionFunctions.php';
include_once 'processForm.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
$user = 'wushuclub';
$password = 'f4FreePhe';
$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");
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
          <?php
            $styles=array(STYLE_CONTEMPORARY, STYLE_TRADITIONAL, STYLE_INTERNAL);
            foreach($styles as $style)
            {
              if (!$_SESSION['eventId']) {$_SESSION['eventId'] = 1;}
              echo '<li class="bold"><a class="collapsible-header waves-effect waves-pink">'.$style.'</a><div class="collapsible-body"><ul>';
              $sql = 'SELECT `id`,`eventName` FROM `eventDefinition` WHERE `style`="'.$style.'"';
              $result = mysqli_query($link, $sql);
              while ($row = mysqli_fetch_assoc($result))
              {
                echo '<li><a class="waves-effect" href="#" onclick="changeEventTitle('.$row['id'].');changeDivisionList()">'.$row['eventName'].'</a></li>';
              }
              echo '</ul></div></li>';
            }
          ?>
        </ul>
      </li>
    </ul>
  </header>

  <main>
    <div class="container">

      <br><br>
      <a class='dropdown-button btn' href='#' data-activates='dropdown1' id='divisionButton'>Level/Gender/Age</a>
      <ul id="dropdown1" class="dropdown-content">

<?php
      changeDivisionListEventId();
?>
      </ul>
      <a class='dropdown-button btn' href="#" data-activates='dropdown2'>Competitor</a>
      <ul id="dropdown2" class="dropdown-content">


<?php
      echo '<li><a>Empty</a></li>';
?>
      </ul>
      <br>
<?php
      $retrieveCompetitor = "SELECT firstName, lastName FROM competitors WHERE id=".$_SESSION['competitorId'];
      $result = mysqli_query($link, $retrieveCompetitor);
      $row = mysqli_fetch_assoc($result);
      echo "<div id='competitorName'><h1 class='header'>".$row['firstName']." ".$row['lastName']."</h1></div>";
      $retrieveScore = 'SELECT scoreTotal FROM eventScoring WHERE competitorId='.$_SESSION['competitorId'].' AND eventId='.$_SESSION['eventId'];
      $result = mysqli_query($link, $retrieveScore);
      $row=mysqli_fetch_assoc($result);
      echo '<h1 class="header">'.$row['scoreTotal'].'</h1>';
?>

    </div>
  </main>
  <!--  Scripts-->
  <script src="js/scripts.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
