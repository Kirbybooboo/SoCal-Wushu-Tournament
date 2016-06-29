<!DOCTYPE html>
<html lang="en">


<?php
$link = mysqli_connect("localhost","wushuclub","f4FreePhe")  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");
if(isset($_REQUEST['submit']))
{
    $errorMessage = "";
    $email=$_POST['email'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $gender=$_POST['gender'];
    $birthDate=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
    $a=$_POST['6am-8am'];
    $b=$_POST['8am-9am'];
    $c=$_POST['9am-10am'];
    $d=$_POST['10am-11am'];
    $e=$_POST['11am-12pm'];
    $f=$_POST['12pm-1pm'];
    $g=$_POST['1pm-2pm'];
    $h=$_POST['2pm-3pm'];
    $i=$_POST['3pm-4pm'];
    $j=$_POST['4pm-5pm'];
    $k=$_POST['5pm-6pm'];
    $l=$_POST['6pm-7pm'];
    $m=$_POST['7pm-8pm'];
 
    // Validation will be added here
 
    $err = 0;

    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
        $err = 1;
    }

    if (!$_POST['firstName']) {
        $errFirstName = "Please enter your first name";
        $err = 1;
    }

    if (!$_POST['lastName']) {
        $errLastName = "Please enter your last name";
        $err = 1;
    }

    if (!$_POST['gender']) {
        $errGender = "Please select your gender";
        $err = 1;
    }

    if ($_POST['year'] == '0000' || $_POST['month'] == '00' || $_POST['day'] == '00') {
        $errDate = "Please select your birth date";
        $err = 1;   
    }
    if (!$err) {
    //Inserting record in table using INSERT query
    $insqDbtb="INSERT INTO `wushuclub`.`volunteers`
    (`firstName`, `lastName`, `gender`, `birthDate`, `email`,`6am-8am`,`8am-9am`,`9am-10am`, `10am-11am`, `11am-12pm`, `12pm-1pm`, `1pm-2pm`,`2pm-3pm`,`3pm-4pm`,`4pm-5pm`,`5pm-6pm`,`6pm-7pm`,`7pm-8pm`) VALUES ('$firstName', '$lastName', '$gender', '$birthDate', '$email', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m')";
    mysqli_query($link,$insqDbtb) or die(mysqli_error($link));
    }
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SoCal Wushu Tournament</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand topnav" href="#">Start Bootstrap</a> -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="index.html#news">News</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="home"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>SoCal Wushu Tournament</h1>
                        <h3>1st Annual Tournament - January 28, 2017</h3>
                        <!--
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                            </li>
                        </ul>
                        -->
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
    <a name="register"></a>
    <br>
    <div class="container">
        <form class="form-horizontal" action='' method="POST">
          <fieldset>
            <div id="lead">
              <legend class="">Volunteer Registration</legend>
            </div>

            <p>
            If you have never done Wushu, this will be a great chance to see what it is about. As a volunteer, you will help set up the competition rings, lead competitors to their rings, time competitors, managing the entrance, cleaning up, and other activities. But what's the best part about being a volunteer? Free admission, lunch, and shirt!
            </p>
         
            <div class="control-group">
              <!-- E-mail -->
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <?php echo "<p class='text-danger'>$errEmail</p>";?>
              </div>
            </div>

            <div class="control-group">
              <!-- First Name -->
              <label class="control-label" for="firstName">First Name</label>
              <div class="controls">
                <input type="text" id="firstName" name="firstName" placeholder="" class="input-xlarge">
                <?php echo "<p class='text-danger'>$errFirstName</p>";?>
              </div>
            </div>

            <div class="control-group">
              <!-- Last Name -->
              <label class="control-label" for="lastName">Last Name</label>
              <div class="controls">
                <input type="text" id="lastName" name="lastName" placeholder="" class="input-xlarge">
                <?php echo "<p class='text-danger'>$errLastName</p>";?>
              </div>
            </div>

            <div class="control-group">
              <!-- Gender -->
              <label class="control-label" for="gender">Gender</label>
              <div class="controls">
                <input type="radio" id="male" name="gender" value="male">
                Male
                <input type="radio" id="female" name="gender" value="female">
                Female
                <br>
                <?php echo "<p class='text-danger'>$errGender</p>";?>
              </div>
            </div>

            <div class="control-group">
              <!-- Birthdate -->
              <label class="control-label" for="birthDate">Birth Date</label>
              <div class="controls">
                <select name="month">
                    <option selected="selected" value="00">--</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="day">
                    <option selected="selected" value="00">--</option>
                    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option>
                    <option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option>
                    <option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                    <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
                    <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
                    <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
                    <option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
                    <option value="29">29</option><option value="30">30</option><option value="31">31</option>
                </select>
                <select name="year">
                    <option selected="selected" value="0000">----</option>
                    <option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option>
                    <option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option>
                    <option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option>
                    <option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option>
                    <option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option>
                    <option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option>
                    <option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option>
                    <option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option>
                    <option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option>
                    <option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option>
                    <option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option>
                    <option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option>
                    <option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option>
                    <option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option>
                    <option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option>
                    <option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option>
                    <option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option>
                    <option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option>
                    <option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option>
                    <option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option>
                    <option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option>
                    <option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option>
                    <option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option>
                    <option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option>
                    <option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option>
                    <option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option>
                    <option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option>
                    <option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option>
                    <option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option>
                    <option value="1901">1901</option><option value="1900">1900</option>
                </select>
                <?php echo "<p class='text-danger'>$errDate</p>";?>
              </div>
            </div>

            <div class="control-group">
              <!-- Times to Volunteer -->
              <label class="control-label" for="">Times Available</label>
              <div class="controls">
                <input type="checkbox" name="6am-8am" value="1">
                6:00am - 8:00am (Set Up)
                <br>
                <input type="checkbox" name="8am-9am" value="1">
                8:00am - 9:00am
                <br>
                <input type="checkbox" name="9am-10am" value="1">
                9:00am - 10:00am
                <br>
                <input type="checkbox" name="10am-11am" value="1">
                10:00am - 11:00am
                <br>
                <input type="checkbox" name="11am-12pm" value="1">
                11:00am - 12:00pm
                <br>
                <input type="checkbox" name="12pm-1pm" value="1">
                12:00pm - 1:00pm
                <br>
                <input type="checkbox" name="1pm-2pm" value="1">
                1:00pm - 2:00pm
                <br>
                <input type="checkbox" name="2pm-3pm" value="1">
                2:00pm - 3:00pm
                <br>
                <input type="checkbox" name="3pm-4pm" value="1">
                3:00pm - 4:00pm
                <br>
                <input type="checkbox" name="4pm-5pm" value="1">
                4:00pm - 5:00pm
                <br>
                <input type="checkbox" name="5pm-6pm" value="1">
                5:00pm - 6:00pm
                <br>
                <input type="checkbox" name="6pm-7pm" value="1">
                6:00pm - 7:00pm
                <br>
                <input type="checkbox" name="7pm-8pm" value="1">
                7:00pm - 8:00pm (Clean Up)
                <br>
              </div>
            </div>
            <br>
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
              <br>
            </div>

          </fieldset>
        </form>
    </div>

    <a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Contact Us:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/uciwushu" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="index.html#news">News</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Wushu Club at UCI 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
