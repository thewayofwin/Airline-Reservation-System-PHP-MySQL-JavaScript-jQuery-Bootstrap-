<?php
$flightno = $_GET['flightno'];
include_once 'dbconnect.php';

$var = array();
$sql = "SELECT * FROM flight WHERE flight.number = '$flightno'";
if(! ($result = mysqli_query($conn, $sql)))
{
	
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
else
{
	while($row = mysqli_fetch_object($result))
	{
		$var[] = $row;	
	}
	echo '{"flights":'.json_encode($var).' , ';
}

$var2 = array();
$sql = "SELECT * FROM class WHERE number = '$flightno'";
if(! ($result = mysqli_query($conn, $sql)))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
else
{
	while($row = mysqli_fetch_object($result))
	{
		$var2[] = $row;	
	}
	echo '"classes":'.json_encode($var2).'}';
}

mysqli_close($conn);


?>