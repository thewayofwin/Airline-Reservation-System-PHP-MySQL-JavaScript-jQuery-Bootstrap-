<?php
$flightno = $_GET['flightno'];
$airplaneid = $_GET['airplaneid'];
$departure = $_GET['departure'];
$dtime = $_GET['dtime'];
$arrival = $_GET['arrival'];
$atime = $_GET['atime'];
$ec = $_GET['ec'];
$ep = $_GET['ep'];
$bc = $_GET['bc'];
$bp = $_GET['bp'];

include_once 'dbconnect.php';

$sql = "UPDATE flight SET  airplane_id = '$airplaneid', departure = '$departure', d_time = '$dtime', arrival = '$arrival', a_time = '$atime' WHERE number = '$flightno'";
if(! mysqli_query($conn, $sql))
{
	echo "\nErrormessage: ".mysqli_error($conn)."\n";
}
$sql = "UPDATE class SET capacity = '$ec', price = '$ep' WHERE number = '$flightno' AND name = 'Economy'";
if(! mysqli_query($conn, $sql))
{
	echo "\nErrormessage: ".mysqli_error($conn)."\n";
}
$sql = "UPDATE class SET capacity = '$bc', price = '$bp' WHERE number = '$flightno' AND name = 'Business'";
if(! mysqli_query($conn, $sql))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
echo 0;

mysqli_close($conn);

?>