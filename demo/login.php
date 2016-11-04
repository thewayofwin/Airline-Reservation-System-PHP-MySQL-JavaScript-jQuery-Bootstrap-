<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: homepage.html");
}

// if(isset($_POST['btn-login']))
// {
	
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$res=mysqli_query($conn,"SELECT * FROM passanger WHERE username='$username'");
	$row=mysqli_fetch_array($res);
	if($row['password']==$pwd)
	{
		$_SESSION['user']=$row['username'];
		header("Location: homepage.html");
	}
	else
	{
	
	//echo "<script>alert('wrong username or wrong password ');</script>";

	echo '
			<head>
			<title>User login</title>
			<meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		    <link rel="stylesheet" href="homepage.css">
		    <link rel="stylesheet" href="forcompany.css">
		    <link rel="stylesheet" href="AdminSignin.css">
		    <script src="login.js"> </script>
			<script src="jump.js"> </script>


			<meta http-equiv="refresh" content="3;url=customersignin.html">
			</head>
			<body >
			<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="homepage.html"><span class="glyphicon glyphicon-home"></span> Home</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
                    <li id = "cart">
                        <a class="navbar-brand" href="cartshow.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
                    </li> 					
					<li class="dropdown" id = "new">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> Sign in&nbsp;</span><span class="caret"></span>
						</a>
						<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
						  <li><a href="signup.html">Register</a></li>
						  
						  <li class="dropdown-submenu">
							<a tabindex="-1" href="#">Sign in</a>
							<ul class="dropdown-menu">
							  <li><a tabindex="-1" href="Adminpage.html">Manager Sign in</a></li>
							  <li><a href="customersignin.html">Customer Sign in</a></li>
							  
						
					</li>
							</ul>
						  </li>
						
						</ul>
					</li>
					  <li class="dropdown" id = "old">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><span class="glyphicon glyphicon-user" id="wuser">Welcom!</span>
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
							<li><a href="showhistory.php">History</a></li>
							<li><a href="#" id="logout">Sign out</a></li>
						</ul>
						</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="jumbotron text-center">
		<h1>Airprice.com</h1> 
		<p>We specialize in your air plan!</p> 
	</div>
	<div class="container" id="homepage">
		<h1>Opps</h1>
		<p>Wrong username or wrong password, wait 3s or <a href="customersignin.html">click me back!</a></p>
	</div>
	<footer class="container-fluid text-center">
		<a href="#signUpPage" title="To Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a>
		<p>Airprice.com</p>		
	</footer>	
		</body>';
			
		
	}
//}


mysqli_close($conn);
?>