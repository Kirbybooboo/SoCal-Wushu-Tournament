<!DOCTYPE html>
<html lang="en">

<?php
$link = mysqli_connect("localhost","wushuclub","f4FreePhe")  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");

$retrieveAll = "SELECT id, firstName, lastName, gender, birthDate, level from chen";
$resultAll = mysqli_query($link, $retrieveAll);

if(mysqli_num_rows($resultAll) > 0)
{
  $firstRow = mysqli_fetch_assoc($resultAll);
  $firstID = $firstRow['id'];
  $firstFirstName = $firstRow['firstName'];
  $firstLastName = $firstRow['lastName'];
}

if(isset($_REQUEST['submit'])) {
    $scores= array($_POST['score1'], $_POST['score2'], $_POST['score3'], $_POST['score4'], $_POST['score5']);
    $err = 0;
    if (!$_POST['score1'] || !$_POST['score2'] || !$_POST['score3'] || !$_POST['score4'] || !$_POST['score5']) {
        $errScore = "Please enter score";
        $err = 1;
    }
    if (!$err) {
        $scoreTotal = array_sum($scores)/count($scores);
        $insertScore="UPDATE chen SET score1=$scores[0], score2=$scores[1], score3=$scores[2], score4=$scores[3], score5=$scores[4], scoreTotal=$scoreTotal WHERE id=$firstID";
        mysqli_query($link,$insertScore) or die(mysqli_error($link));
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
        <a class="page-title" id="eventTitle">Chen Style</a>
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
          <li class="bold">
            <a class="collapsible-header waves-effect waves-pink">Contemporary</a>
            <div class="collapsible-body">
              <ul>
                <li>
                  <a href="longfist.php">Long Fist</a>
                </li>
                <li>
                  <a href="southernfist.php">Southern Fist</a>
                </li>
                <li>
                  <a href="broadsword.php">Broadsword</a>
                </li>
                <li>
                  <a href="straightsword.php">Straightsword</a>
                </li>
                <li>
                  <a href="southernbroadsword.php">Southern Broadsword</a>
                </li>
                <li>
                  <a href="staff.php">Staff</a>
                </li>
                <li>
                  <a href="spear.php">Spear</a>
                </li>
                <li>
                  <a href="southernstaff.php">Southern Staff</a>
                </li>
                <li>
                  <a href="otherbarehand.php">Other Barehand</a>
                </li>
                <li>
                  <a href="otherweapon.php">Other Weapon</a>
                </li>
              </ul>

            </div>
          </li>
          <li class="bold">
            <a class="collapsible-header waves-effect waves-pink">Traditional</a>
            <div class="collapsible-body">

              <ul>
                <li>
                  <a href="tnorthernfist.php">Northern Fist</a>
                </li>
                <li>
                  <a href="tsouthernfist.php">Southern Fist</a>
                </li>
                <li>
                  <a href="tshortweapon.php">Short Weapon</a>
                </li>
                <li>
                  <a href="tlongweapon.php">Long Weapon</a>
                </li>
                <li>
                  <a href="totherbarehand.php">Other Barehand</a>
                </li>
                <li>
                  <a href="totherweapon.php">Other Weapon</a>
                </li>
              </ul>

            </div>
          </li>
          <li class="bold active">
            <a class="collapsible-header active waves-effect waves-pink">Internal</a>
            <div class="collapsible-body">

              <ul>
                <li class="active">
                  <a href="chen.php">Chen Style</a>
                </li>
                <li>
                  <a href="yang.php">Yang Style</a>
                </li>
                <li>
                  <a href="taijiweapon.php">Taiji Weapon</a>
                </li>
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
      <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Level/Gender/Age</a>
      <ul id="dropdown1" class="dropdown-content">
        <li><a onclick="changeDivision('chen','advance','female','adult')">AFA</a></li>
        <li><a onclick="changeDivision('chen','advance','male','adult')">AMA</a></li>
        <li><a onclick="changeDivision('chen','advance','female','child')">AFC</a></li>
        <li><a onclick="changeDivision('chen','advance','male','child')">AMC</a></li>
        <li><a onclick="changeDivision('chen','advance','female','teen')">AFT</a></li>
        <li><a onclick="changeDivision('chen','advance','male','teen')">AMT</a></li>
        <li class="divider"></li>
        <li><a onclick="changeDivision('chen','beginner','female','adult')">BFA</a></li>
        <li><a onclick="changeDivision('chen','beginner','male','adult')">BMA</a></li>
        <li><a onclick="changeDivision('chen','beginner','female','child')">BFC</a></li>
        <li><a onclick="changeDivision('chen','beginner','male','child')">BMC</a></li>
        <li><a onclick="changeDivision('chen','beginner','female','teen')">BFT</a></li>
        <li><a onclick="changeDivision('chen','beginner','male','teen')">BMT</a></li>
        <li class="divider"></li>
        <li><a onclick="changeDivision('chen','intermediate','female','adult')">IFA</a></li>
        <li><a onclick="changeDivision('chen','intermediate','male','adult')">IMA</a></li>
        <li><a onclick="changeDivision('chen','intermediate','female','child')">IFC</a></li>
        <li><a onclick="changeDivision('chen','intermediate','male','child')">IFC</a></li>
        <li><a onclick="changeDivision('chen','intermediate','female','teen')">IFT</a></li>
        <li><a onclick="changeDivision('chen','intermediate','male','teen')">IMT</a></li>
      </ul>
      <a class='dropdown-button btn' href="#" data-activates='dropdown2'>Competitor</a>
      <ul id="dropdown2" class="dropdown-content">
<?php
  echo "<li><a onclick='changeCompetitor(\"chen\", ".$firstID.")'>".$firstFirstName." ".$firstLastName."</a></li>";
  if (mysqli_num_rows($resultAll) > 0) 
  {
      while($row = mysqli_fetch_assoc($resultAll)) 
      {
      echo "<li><a onclick='changeCompetitor(\"chen\", ".$row['id'].")'>".$row['firstName']." ".$row['lastName']."</a></li>";
      }
  }
      echo "</ul>";
      echo "<br>";

$retrieveFirst = "SELECT id, firstName, lastName, gender, birthDate, level FROM chen WHERE id=$firstID";
$resultFirst = mysqli_query($link, $retrieveFirst);
      $row = mysqli_fetch_assoc($resultFirst);
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
            <div class="input-field col s2">
              <input id="score5" name="score5" type="text">
              <label for="score5">Score 5</label>
            </div>
          </div>
<!--           <div class="row">
            <div class="input-field col s12">
              <textarea id="notes1" class="materialize-textarea"></textarea>
              <label for="notes1">Notes on competitor</label>
            </div>
          </div> -->
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