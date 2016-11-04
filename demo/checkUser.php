<?php

include_once 'dbconnect.php';

$username = $_POST['username'];

$result=mysqli_query($conn,"SELECT username FROM passanger WHERE username = '$username'");

	 while($row = mysqli_fetch_array($result)) {
		if( $row['username']) {
			echo 1;
		}
		else {
			echo 0;
		}
	 }
mysqli_close($conn);
?>