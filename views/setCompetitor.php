<?php
// Start the session
session_start();

$user = 'wushuclub';
$password = 'f4FreePhe';
$id = ($_GET['id']);
$con = mysqli_connect('localhost',$user,$password) or die ("failed to connect to server !!");
mysqli_select_db($con,"wushuclub");

$sql="SELECT  id, firstName, lastName, gender, birthDate, level FROM `competitors` WHERE id ='".$id."'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result)) {
    $_SESSION['competitorId'] = $row['id'];
    echo $row['firstName']." ".$row['lastName'];
    }
}
else
{
    echo "Error, Can't find ID";
}
mysqli_close($con);
?>