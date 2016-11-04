<?php
// Start the session
session_start();


?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Shopping cart</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="forcompany.css">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="AdminSignin.css">
    <script src="login.js"> </script>
    <script src="jump.js"> </script>
</head>
<body>
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


<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Shopping cart</h1>





<?php

include_once 'dbconnect2.php';


if(!isset($_SESSION['user'])){
    header("Location: customersignin.html");
}else{
    $user = $_SESSION['user'];	


$sql = "SELECT FL.number AS FLnumber, company, type, B.ID AS bookid, time, B.date,  departure, d_time, arrival, a_time, C.name AS classname, capacity, price
            FROM flight FL,  class C, airplane AP , book B
            WHERE (FL.number = C.number) AND (B.flightno = c.number) AND (classtype = C.name) AND (FL.airplane_id = AP.ID) 
            AND  B.username = '$user' AND paid = '0'
            ORDER BY time";


$result = mysqli_query($con,$sql);
$rowcount = mysqli_num_rows($result);

    if($rowcount == 0){
        echo "<div class='alert alert-info'><strong>Nothing in the shopping cart.</strong></div>";
    }
    else{
    echo "<div class='alert alert-info'>In the shopping cart:</div>";



    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Time</th>
            <th>Flight</th>
            <th>Aircraft</th>
            <th>Date</th>
            <th>Departure</th>
            <th>Departure Time</th>
            <th>Arrival</th>
            <th>Arrival Time</th>
            <th>Class</th>

            <th>Price</th>

            <th>Pay</th>
          </tr>
          </thead>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tbody><tr>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['FLnumber'] . "</td>";
        echo "<td>" . $row['company']." ".$row['type']. "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['departure'] . "</td>";
        echo "<td>" . $row['d_time'] . "</td>";
        echo "<td>" . $row['arrival'] . "</td>";
        echo "<td>" . $row['a_time'] . "</td>";
        echo "<td>" . $row['classname'] . "</td>";

        echo "<td>" . $row['price'] . "</td>";
        
       
            //calculate number of remain seats
            $seatreserved = "SELECT flightno, classtype, COUNT(*)
                        FROM book B
                        WHERE B.date = '".$row['date']."' AND B.flightno = '".$row['FLnumber']."'AND B.classtype ='".$row['classname']."' AND paid=1
                        GROUP BY flightno, classtype";
            $reserved = mysqli_query($con, $seatreserved);   
            $reservedNumber = mysqli_fetch_array($reserved);
            
            $capacity = mysqli_query($con, "SELECT capacity FROM class C WHERE C.number='".$row['FLnumber']."' AND C.name= '".$row['classname']."'");
            $capacityNumber = mysqli_fetch_array($capacity);


            if(mysqli_num_rows($reserved)>0){            
                $availableNumber = $capacityNumber['capacity'] - $reservedNumber['COUNT(*)'];
            }else{
                $availableNumber = $capacityNumber['capacity'];
            }
        
     
        
        if($availableNumber>0){
        echo '<td>
            <form action="cartdelete.php" method="post">
            <input type="hidden" name="bookid" value="'.$row['bookid'].'" >
            <button type="submit" class="btn btn-danger">Delete</button></div>
            </form>        
            </td>';
        }else{
            echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>No seat Available now</button></td>";
        }
        
		$sum = mysqli_query($con,"SELECT SUM(price)
							            FROM book B, class C
							            WHERE B.username = '$user' AND paid = '0'
							            AND classtype=C.name AND flightno = C.number");

		$t = mysqli_fetch_array($sum);
		$total = $t['SUM(price)'];



        echo "</tr>";
    }
    echo " </tbody></table>";
    echo " <form action='pay.php' method='post'>";
    echo "<div class='row'>
			  <div class='col-sm-4'></div>
			  <div class='col-sm-4'><p class='lead'>Total: <span id='total'>$".$total."</span></p></div>
			  <div class='col-sm-4'><button type='submit' class='btn btn-primary'>Pay</button></div>
			</div>";
    
    echo "</form>";
    echo "<br>";

    }











}

mysqli_close($con);


?>




    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
        <a href="#signUpPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Airprice.com</p>     
</footer>


</body>
</html>