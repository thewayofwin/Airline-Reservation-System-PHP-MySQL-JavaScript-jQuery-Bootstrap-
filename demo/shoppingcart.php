<?php
// Start the session
session_start();

include_once 'dbconnect2.php';

$type = $_POST["type"];
date_default_timezone_set("America/Chicago");
$t=time();
$time = date("Y-m-d h:i:s");


if(!isset($_SESSION['user'])){
    header("Location: customersignin.html");
}else{
    $user = $_SESSION['user'];


	if($type =="all" || $type =="onewaynonstop" ){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	$date = $_POST["date"];

	$sql = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno', '$user', '$class', '0')";;


	$result = mysqli_query($con,$sql);
    header("Location: cartshow.php");
	}

	if($type =="oneway1stop"){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	$date = $_POST["date"];


	$flightno2 = $_POST["flightno2"];
	$class2 = $_POST["classtype2"];
	$price2 = $_POST["price2"];


	$sql = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno', '$user', '$class', '0')";;

	$result = mysqli_query($con,$sql);

	$sql2 = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno2', '$user', '$class2', '0')";;

	$result2 = mysqli_query($con,$sql2);
    header("Location: cartshow.php");

	}

	
	if($type =="roundtrip"){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	$date = $_POST["date"];


	$flightno2 = $_POST["flightno2"];
	$class2 = $_POST["classtype2"];
	$price2 = $_POST["price2"];

	$returndate = $_POST["date2"];

	$sql = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno', '$user', '$class', '0')";;

	$result = mysqli_query($con,$sql);

	$sql2 = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$returndate', '$flightno2', '$user', '$class2', '0')";;

	$result2 = mysqli_query($con,$sql2);

    header("Location: cartshow.php");
	}


    echo "Error adding to cart..";










}

mysqli_close($con);


?>



