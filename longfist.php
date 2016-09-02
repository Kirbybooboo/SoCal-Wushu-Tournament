<!DOCTYPE html>
<html lang="en">

<?php
$link = mysqli_connect("localhost","wushuclub","f4FreePhe")  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");

$retrieveAll = "SELECT id, firstName, lastName, gender, birthDate, level from cLongFist";
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
        $insertScore="UPDATE cLongFist SET score1=$scores[0], score2=$scores[1], score3=$scores[2], score4=$scores[3], score5=$scores[4], scoreTotal=$scoreTotal WHERE id=$firstID";
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
        <a class="page-title">Long Fist</a>
      </div>
    </nav>
    <ul id="nav-mobile" class="side-nav fixed">
      <li class="logo">
        <a id="logo-container" class="brand-logo" style="height: 144px">
            <img class="responsive-img" src="img/front-logo.png">
        </a>
      </li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordian">
          <li class="bold active">
            <a class="collapsible-header active waves-effect waves-pink">Contemporary</a>
            <div class="collapsible-body">
              <ul>
                <li class="active">
                  <a href="longfist.php">Long Fist</a>
                </li>
                <li>
                  <a href="longfist.html">Southern Fist</a>
                </li>
                <li>
                  <a href="longfist.html">Broadsword</a>
                </li>
                <li>
                  <a href="longfist.html">Straightsword</a>
                </li>
                <li>
                  <a href="longfist.html">Southern Broadsword</a>
                </li>
                <li>
                  <a href="longfist.html">Staff</a>
                </li>
                <li>
                  <a href="longfist.html">Spear</a>
                </li>
                <li>
                  <a href="longfist.html">Southern Staff</a>
                </li>
                <li>
                  <a href="longfist.html">Other Barehand</a>
                </li>
                <li>
                  <a href="longfist.html">Other Weapon</a>
                </li>
              </ul>

            </div>
          </li>
          <li class="bold">
            <a class="collapsible-header waves-effect waves-pink">Traditional</a>
            <div class="collapsible-body">

              <ul>
                <li>
                  <a href="longfist.html">Northern Fist</a>
                </li>
                <li>
                  <a href="longfist.html">Southern Fist</a>
                </li>
                <li>
                  <a href="longfist.html">Short Weapon</a>
                </li>
                <li>
                  <a href="longfist.html">Long Weapon</a>
                </li>
                <li>
                  <a href="longfist.html">Other Barehand</a>
                </li>
                <li>
                  <a href="longfist.html">Other Weapon</a>
                </li>
              </ul>

            </div>
          </li>
          <li class="bold">
            <a class="collapsible-header waves-effect waves-pink">Internal</a>
            <div class="collapsible-body">

              <ul>
                <li>
                  <a href="longfist.html">Chen Style</a>
                </li>
                <li>
                  <a href="longfist.html">Yang Style</a>
                </li>
                <li>
                  <a href="longfist.html">Taiji Weapon</a>
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
        <li><a href="#AFA" onclick="changeDivision('advance','female','adult')">AFA</a></li>
        <li><a href="#AMA" onclick="changeDivision('advance','male','adult')">AMA</a></li>
        <li><a href="#AFC" onclick="changeDivision('advance','female','child')">AFC</a></li>
        <li><a href="#AMC" onclick="changeDivision('advance','male','child')">AMC</a></li>
        <li><a href="#AFT" onclick="changeDivision('advance','female','teen')">AFT</a></li>
        <li><a href="#AMT" onclick="changeDivision('advance','male','teen')">AMT</a></li>
        <li class="divider"></li>
        <li><a href="#BFA" onclick="changeDivision('beginner','female','adult')">BFA</a></li>
        <li><a href="#BMA" onclick="changeDivision('beginner','male','adult')">BMA</a></li>
        <li><a href="#BFC" onclick="changeDivision('beginner','female','child')">BFC</a></li>
        <li><a href="#BMC" onclick="changeDivision('beginner','male','child')">BMC</a></li>
        <li><a href="#BFT" onclick="changeDivision('beginner','female','teen')">BFT</a></li>
        <li><a href="#BMT" onclick="changeDivision('beginner','male','teen')">BMT</a></li>
        <li class="divider"></li>
        <li><a href="#IFA" onclick="changeDivision('intermediate','female','adult')">IFA</a></li>
        <li><a href="#IMA" onclick="changeDivision('intermediate','male','adult')">IMA</a></li>
        <li><a href="#IFC" onclick="changeDivision('intermediate','female','child')">IFC</a></li>
        <li><a href="#IMC" onclick="changeDivision('intermediate','male','child')">IFC</a></li>
        <li><a href="#IFT" onclick="changeDivision('intermediate','female','teen')">IFT</a></li>
        <li><a href="#IMT" onclick="changeDivision('intermediate','male','teen')">IMT</a></li>
      </ul>
      <a class='dropdown-button btn' href="#" data-activates='dropdown2'>Competitor</a>
      <ul id="dropdown2" class="dropdown-content">
<?php
  echo "<li><a onclick='changeCompetitor(".$firstID.")'>".$firstFirstName." ".$firstLastName."</a></li>";
  if (mysqli_num_rows($resultAll) > 0) 
  {
      while($row = mysqli_fetch_assoc($resultAll)) 
      {
      echo "<li><a onclick='changeCompetitor(".$row['id'].")'>".$row['firstName']." ".$row['lastName']."</a></li>";
      }
  }
      echo "</ul>";
      echo "<br>";

$retrieveFirst = "SELECT id, firstName, lastName, gender, birthDate, level FROM cLongFist WHERE id=$firstID";
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
