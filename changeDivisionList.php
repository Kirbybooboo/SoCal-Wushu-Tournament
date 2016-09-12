<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
$eventName = $_GET['eventName'];
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'advance','female','adult')\">AFA</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'advance','male','adult')\">AMA</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'advance','female','teen')\">AFT</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'advance','male','teen')\">AMT</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'advance','female','child')\">AFC</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'advance','male','child')\">AMC</a></li>";
echo "<li class=\"divider\"></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'intermediate','female','adult')\">IFA</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'intermediate','male','adult')\">IMA</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'intermediate','female','teen')\">IFT</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'intermediate','male','teen')\">IMT</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'intermediate','female','child')\">IFC</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'intermediate','male','child')\">IMC</a></li>";
echo "<li class=\"divider\"></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'beginner','female','adult')\">BFA</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'beginner','male','adult')\">BMA</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'beginner','female','teen')\">BFT</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'beginner','male','teen')\">BMT</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'beginner','female','child')\">BFC</a></li>";
echo "<li><a onclick=\"changeDivision(".$_SESSION['event'].",'beginner','male','child')\">BMC</a></li>";
?>
</body>
</html>