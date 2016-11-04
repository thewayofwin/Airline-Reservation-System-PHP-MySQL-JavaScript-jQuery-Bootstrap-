<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	echo 0;
}
else
    echo $_SESSION['user'];
?>
