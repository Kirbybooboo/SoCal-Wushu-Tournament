<!DOCTYPE html>
<html lang="en">

<?php
$link = mysqli_connect("localhost","wushuclub","f4FreePhe")  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");

$sql = "SELECT id, firstName, lastName, gender, birthDate, level from cLongFist";
$result = mysqli_query($link, $sql);
if(isset($_REQUEST['submit'])) {
    $score1=$_POST['score1'];
    $err = 0;
    if (!$_POST['score1']) {
        $errScore1 = "Please enter your score";
        $err = 1;
    }
    if (!$err) {
        $insertScore1="UPDATE cLongFist SET score1=$score1 WHERE id=100";
        mysqli_query($link,$insertScore1) or die(mysqli_error($link));
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
    <nav class="indigo" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Long Fist</a>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
    <ul id="nav-mobile" class="side-nav fixed">
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
        <li><a href="#AFA">AFA</a></li>
        <li><a href="#AMA">AMA</a></li>
        <li><a href="#AFC">AFC</a></li>
        <li><a href="#AMC">AMC</a></li>
        <li><a href="#AFT">AFT</a></li>
        <li><a href="#AMT">AMT</a></li>
        <li class="divider"></li>
        <li><a href="#BFA">BFA</a></li>
        <li><a href="#BMA">BMA</a></li>
        <li><a href="#BFC">BFC</a></li>
        <li><a href="#BMC">BMC</a></li>
        <li><a href="#BFT">BFT</a></li>
        <li><a href="#BMT">BMT</a></li>
        <li class="divider"></li>
        <li><a href="#IFA">IFA</a></li>
        <li><a href="#IMA">IMA</a></li>
        <li><a href="#IFC">IFC</a></li>
        <li><a href="#IMC">IMC</a></li>
        <li><a href="#IFT">IFT</a></li>
        <li><a href="#IMT">IMT</a></li>
      </ul>
      <br>
      <h2 class="header">Ryan Jew</h2>
      <div class="row">
        <form class="col s12" action='' method="POST">
          <div class="row">
            <div class="input-field col s12">
              <input id="score1" name="score1" type="text">
              <label for="score1">Score</label>
            </div>
          </div>
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


<?php
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          echo "id: " . $row["id"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
      }
  } else {
      echo "0 results";
  }
?>
      
    </div>
  </main>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
