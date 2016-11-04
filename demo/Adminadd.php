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
$sql = "INSERT INTO flight VALUES( '$flightno', '$airplaneid', '$departure', '$dtime', '$arrival', '$atime' )";
if(! mysqli_query($conn, $sql))
{
	
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
$sql = "INSERT INTO class VALUES( '$flightno', 'Economy', '$ec', '$ep')";
if(! mysqli_query($conn, $sql))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
$sql = "INSERT INTO class VALUES('$flightno', 'Business', '$bc', '$bp')";
if(! mysqli_query($conn, $sql))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
echo 0;

mysqli_close($conn);

?>