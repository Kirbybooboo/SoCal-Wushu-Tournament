<!DOCTYPE html>
<html lang="en">

<?php
$link = mysqli_connect("localhost","wushuclub","f4FreePhe")  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");

if(isset($_REQUEST['submit'])) {
    $email=$_POST['email'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $gender=$_POST['gender'];
    $birthDate=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
    $level=$_POST['level'];
    $cLongFist=$_POST['cLongFist'];
    $cSouthernFist=$_POST['cSouthernFist'];
    $cBroadsword=$_POST['cBroadsword'];
    $cStraightsword=$_POST['cStraightsword'];
    $cSouthernBroadsword=$_POST['cSouthernBroadsword'];
    $cStaff=$_POST['cStaff'];
    $cSpear=$_POST['cSpear'];
    $cSouthernStaff=$_POST['cSouthernStaff'];
    $cOtherBarehand=$_POST['cOtherBarehand'];
    $cOtherWeapon=$_POST['cOtherWeapon'];
    $tNorthernFist=$_POST['tNorthernFist'];
    $tSouthernFist=$_POST['tSouthernFist'];
    $tShortWeapon=$_POST['tShortWeapon'];
    $tLongWeapon=$_POST['tLongWeapon'];
    $tOtherBarehand=$_POST['tOtherBarehand'];
    $tOtherWeapon=$_POST['tOtherWeapon'];
    $chen=$_POST['chen'];
    $yang=$_POST['yang'];
    $taijiWeapon=$_POST['taijiWeapon'];
     
    // Validation
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

    if (!$_POST['level']) {
        $errLevel = "Please select a level";
        $err = 1;
    }
    
    if (!$err) {
        //Inserting record in table using INSERT query
        $insqDbtb="INSERT INTO `wushuclub`.`competitors`
        (`firstName`, `lastName`, `gender`, `birthDate`, `email`, `level`,`cLongFist`, `cSouthernFist`, `cBroadsword`, `cStraightsword`, `cSouthernBroadsword`, `cStaff`, `cSpear`,`cSouthernStaff`,`cOtherBarehand`,`cOtherWeapon`,`tNorthernFist`,`tSouthernFist`,`tShortWeapon`,`tLongWeapon`,`tOtherBarehand`,`tOtherWeapon`, `chen`, `yang`, `taijiWeapon`) VALUES ('$firstName', '$lastName', '$gender', '$birthDate', '$email', '$level', '$cLongFist', '$cSouthernFist', '$cBroadsword', '$cStraightsword', '$cSouthernBroadsword', '$cStaff', '$cSpear', '$cSouthernStaff', '$cOtherBarehand', '$cOtherWeapon', '$tNorthernFist', '$tSouthernFist', '$tShortWeapon', '$tLongWeapon', '$tOtherBarehand', '$tOtherWeapon', '$chen','$yang', '$taijiWeapon')";
        mysqli_query($link,$insqDbtb) or die(mysqli_error($link));

        //Creating email
        $count = 0;
        $subject = 'SoCal Wushu Tournament Registration Confirmation';
        $msg = "Thank you for registering for the SoCal Wushu Tournament. Below you will find your registration information. If you have any concerns or changes you want to make, please contact wushuclubuci@gmail.com.\n\n".
        "Competitor's name: ".$firstName." ".$lastName."\n".
        "Competitor's Gender: ".ucfirst($gender)."\n".
        "Birth Date: ".$birthDate."\n".
        "Level: ".ucfirst($level)."\n".
        "Events:\n";
        if ($cLongFist=="1") {
            $msg.= "Contemporary Long Fist\n";
            $count += 1;
        }
        if ($cSouthernFist=="1") {
            $msg.= "Contemporary Southern Fist\n";
            $count += 1;
        }
        if ($cBroadsword=="1") {
            $msg.= "Contemporary Broadsword\n";
            $count += 1;
        }
        if ($cStraightsword=="1") {
            $msg.= "Contemporary Straightsword\n";
            $count += 1;
        }
        if ($cSouthernBroadsword=="1") {
            $msg.= "Contemporary Southern Broadsword\n";
            $count += 1;
        }
        if ($cStaff=="1") {
            $msg.= "Contemporary Staff\n";
            $count += 1;
        }
        if ($cSpear=="1") {
            $msg.= "Contemporary Spear\n";
            $count += 1;
        }
        if ($cSouthernStaff=="1") {
            $msg.= "Contemporary Southern Staff\n";
            $count += 1;
        }
        if ($cOtherBarehand=="1") {
            $msg.= "Contemporary Other Barehand\n";
            $count += 1;
        }
        if ($cOtherWeapon=="1") {
            $msg.= "Contemporary Other Weapon\n";
            $count += 1;
        }
        if ($tNorthernFist=="1") {
            $msg.= "Traditional Northern Fist\n";
            $count += 1;
        }
        if ($tSouthernFist=="1") {
            $msg.= "Traditional Southern Fist\n";
            $count += 1;
        }
        if ($tShortWeapon=="1") {
            $msg.= "Traditional Short Weapon\n";
            $count += 1;
        }
        if ($tLongWeapon=="1") {
            $msg.= "Traditional Long Weapon\n";
            $count += 1;
        }
        if ($tOtherBarehand=="1") {
            $msg.= "Traditional Other Barehand\n";
            $count += 1;
        }
        if ($tOtherWeapon=="1") {
            $msg.= "Traditional Other Weapon\n";
            $count += 1;
        }
        if ($chen=="1") {
            $msg.= "Chen Style\n";
            $count += 1;
        }
        if ($yang=="1") {
            $msg.= "Yang Style\n";
            $count += 1;
        }
        if ($taijiWeapon=="1") {
            $msg.= "Taiji Weapon\n";
            $count += 1;
        }
        $price = 50 + ($count-1)*10;
        $msg.= "\nPrice: $".$price."\n";
        $msg.= "Pay with check on the day of the competition. If not paid, your registration will be void.";

        $headers = 'From: wushuclubuci@gmail.com'."\r\n".
        'Reply-To: wushuclubuci@gmail.com'."\r\n".
        'X-Mailer: PHP/'.phpversion();

        //mail confirmation email to user
        mail($email, $subject, $msg, $headers);


        //go to redirect after successful registration
        header('Location: redirect.php');
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
                        <a href="about.php#about">About</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                    <li>
                        <a href="http://www.campusrec.uci.edu/club/">Campus Rec</a>
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
              <legend class="">Competitor registration opening soon</legend>
            </div>
         
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
              <!-- Experience Level -->
              <label class="control-label" for="">Experience Level</label>
              <div class="controls">
                <input type="radio" id="beginner" name="level" value="beginner">
                Beginner (0-2 years of practice)
                <br>
                <input type="radio" id="intemediate" name="level" value="intermediate">
                Intermediate (2-5 years of practice)
                <br>
                <input type="radio" id="advance" name="level" value="advance">
                Advance (5+ years of practice)
                <br>
                <?php echo "<p class='text-danger'>$errLevel</p>";?>
              </div>
            </div>
            <br>

            <h3>Events ($50 for 1st event,  $10 for each additional event)</h3>
            <br>
            <h4>Contemporary</h4>
            <div class="control-group">
            <!--Contemporary Events-->
                <div class="controls">
                    <input type="checkbox" name="cLongFist" value="1">
                    Long Fist
                    <br>
                    <input type="checkbox" name="cSouthernFist" value="1">
                    Southern Fist
                    <br>
                    <input type="checkbox" name="cBroadsword" value="1">
                    Broadsword
                    <br>
                    <input type="checkbox" name="cStraightsword" value="1">
                    Straightsword
                    <br>
                    <input type="checkbox" name="cSouthernBroadsword" value="1">
                    Southern Broadsword
                    <br>
                    <input type="checkbox" name="cStaff" value="1">
                    Staff
                    <br>
                    <input type="checkbox" name="cSpear" value="1">
                    Spear
                    <br>
                    <input type="checkbox" name="cSouthernStaff" value="1">
                    Southern Staff
                    <br>
                    <input type="checkbox" name="cOtherBarehand" value="1">
                    Other Barehand (drunken, Fan Zi, Cha Quan, Tong Bei, any animal form)
                    <br>
                    <input type="checkbox" name="cOtherWeapon" value="1">
                    Other Weapon (chainwhip, double broadsword, fan, hook swords, rope dart, nunchucks, etc.)
                    <br>
                </div>
            </div>
            <br>

            <h4>Traditional</h4>
            <div class="control-group">
            <!--Traditional Events-->
                <div class="controls">
                    <input type="checkbox" name="tNorthernFist" value="1">
                    Northern Fist
                    <br>
                    <input type="checkbox" name="tSouthernFist" value="1">
                    Southern Fist
                    <br>
                    <input type="checkbox" name="tShortWeapon" value="1">
                    Short Weapon
                    <br>
                    <input type="checkbox" name="tLongWeapon" value="1">
                    Long Weapon
                    <br>
                    <input type="checkbox" name="tOtherBarehand" value="1">
                    Other Barehand
                    <br>
                    <input type="checkbox" name="tOtherWeapon" value="1">
                    Other Weapon
                    <br>
                </div>
            </div>
            <br>

            <h4>Internal</h4>
            <div class="control-group">
            <!--Internal Events-->
                <div class="controls">
                    <input type="checkbox" name="chen" value="1">
                    Chen Style
                    <br>
                    <input type="checkbox" name="yang" value="1">
                    Yang Style
                    <br>
                    <input type="checkbox" name="taijiWeapon" value="1">
                    Taiji Weapon
                    <br>
                </div>
            </div>
           
            <br>
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Submit</button>
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
