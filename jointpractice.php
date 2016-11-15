<!DOCTYPE html>
<html lang="en">

<?php
$user = 'wushuclub';
$password = 'f4FreePhe';
$link = mysqli_connect("localhost",$user,$password)  or die ("failed to connect to server !!");
mysqli_select_db($link,"wushuclub");

if(isset($_REQUEST['submit'])) {
    $email=trim($_POST['email']);
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $gender=$_POST['gender'];
    $birthDate=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
    $level=$_POST['level'];
    $eventList=array();
    $sql = 'SELECT `id`, `eventName` FROM `eventDefinition`';
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) 
        {
            if ($_POST[$row['id']] == $row['id'])
            {
                array_push($eventList,$row['id']);
            }
        }
    }
     
    // Validation
    $err = 0;

    if (!$_POST['email'] || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
        $sql="INSERT INTO `competitors`
        (`firstName`, `lastName`, `gender`, `birthDate`, `email`, `level`) VALUES ('$firstName', '$lastName', '$gender', '$birthDate', '$email', '$level')";
        mysqli_query($link,$sql) or die(mysqli_error($link));


        foreach ($eventList as $event)
        {
            $sql='INSERT INTO `eventScoring`
            (`competitorId`,`eventId`) VALUES ((SELECT `id` FROM `competitors` WHERE `firstName`="'.$firstName.'" AND `lastName`="'.$lastName.'" AND `email`="'.$email.'"), '.$event.')';
            mysqli_query($link, $sql); 
        }
        unset($event);
        


        //Creating email and insert into individual event tables
        $count = 0;
        $subject = 'SoCal Wushu Tournament Registration Confirmation';
        $msg = "Thank you for registering for the SoCal Wushu Tournament. Below you will find your registration information. If you have any concerns or changes you want to make, please contact wushuclubuci@gmail.com.\n\n".
        "Competitor's name: ".$firstName." ".$lastName."\n".
        "Competitor's Gender: ".ucfirst($gender)."\n".
        "Birth Date: ".$birthDate."\n".
        "Level: ".ucfirst($level)."\n".
        "Events:\n";
        $sql = 'SELECT * FROM `eventDefinition`';
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                if ($_POST[$row['id']] == $row['id'])
                {
                    $msg.= $row['style']." ".$row['eventName']."\n";
                    $count += 1;
                }
            }
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
                        <h3>1st Annual Tournament - February 4, 2017</h3>
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
              <legend class="">Competitor registration coming soon!</legend>
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
              <label class="control-label" for="birthDate">Birth Date (As of January 1, 2017: Child - 12 and under, Teen - 13-17, Adult - 18+)</label>
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
                    <?php
                        foreach(range(1,31) as $x)
                        {
                            echo '<option value="'.$x.'"'.'>'.$x.'</option>';
                        }
                    ?>
                </select>
                <select name="year">
                    <option selected="selected" value="0000">----</option>
                    <?php
                        $oldestYear = 1900;
                        foreach(range(date('Y'),$oldestYear) as $x)
                        {
                            echo '<option value="'.$x.'"'.'>'.$x.'</option>';
                        }
                    ?>
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
                    <?php
                        $sql = 'SELECT `id`, `eventName` FROM `eventDefinition` WHERE `style` = "Contemporary"';
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<input type="checkbox" name="'.$row['id'].'" value="'.$row['id'].'"></input>';
                                echo ' '.$row['eventName'];
                                echo '<br>';
                            }
                        }
                    ?>
                </div>
            </div>
            <br>

            <h4>Traditional</h4>
            <div class="control-group">
            <!--Traditional Events-->
                <div class="controls">
                    <?php
                        $sql = 'SELECT `id`, `eventName` FROM `eventDefinition` WHERE `style` = "Traditional"';
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<input type="checkbox" name="'.$row['id'].'" value="'.$row['id'].'"></input>';
                                echo ' '.$row['eventName'];
                                echo '<br>';
                            }
                        }
                    ?>
                </div>
            </div>
            <br>

            <h4>Internal</h4>
            <div class="control-group">
            <!--Internal Events-->
                <div class="controls">
                    <?php
                        $sql = 'SELECT `id`, `eventName` FROM `eventDefinition` WHERE `style` = "Internal"';
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<input type="checkbox" name="'.$row['id'].'" value="'.$row['id'].'"></input>';
                                echo ' '.$row['eventName'];
                                echo '<br>';
                            }
                        }
                    ?>
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
