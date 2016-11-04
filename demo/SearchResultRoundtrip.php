<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Search Flights</title>
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
  <link rel="stylesheet" type="text/css" href="Search.css">
  <script src="notavailable.js"></script>
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
      <h1>Search Results</h1>


<?php

include_once 'dbconnect2.php';

// Check connection
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} 


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


$from = test_input($_POST["from"]);
$to = test_input($_POST["to"]);
$depart = $_POST["depart"];
$return = $_POST["return"];
$class = $_POST["class"];


global $sql,$sql2, $availableNumber;

    //search by code only, non-stop
    $sql = "SELECT FL.number AS FLnumber, company, type, departure, d_time, arrival, a_time, C.name AS classname, capacity, price
            FROM flight FL,  class C, airplane AP , airport A
            WHERE (FL.number = C.number) AND (FL.airplane_id = AP.ID) AND C.name = '$class' AND
            ((departure = '$from') AND (arrival = '$to'))
            GROUP BY FL.number            
            ORDER BY FL.number";
    $result = mysqli_query($con,$sql);

    
    $rowcount = mysqli_num_rows($result);


    //search return flight

    $sql2 = "SELECT FL.number AS FLnumber, company, type, departure, d_time, arrival, a_time, C.name AS classname, capacity, price
            FROM flight FL,  class C, airplane AP , airport A
            WHERE (FL.number = C.number) AND (FL.airplane_id = AP.ID) AND C.name = '$class' AND
            ((departure = '$to') AND (arrival = '$from'))
            GROUP BY FL.number            
            ORDER BY FL.number";
    $result2 = mysqli_query($con,$sql2);

     $rowcount2 = mysqli_num_rows($result2);

    $rowtotal = $rowcount*$rowcount2;

    if($rowtotal == 0){
        echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowtotal." result</div>";
    }
    else{
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowtotal." result(s)</div>";

    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Flight</th>
            <th>Aircraft</th>
            <th>Date</th>
            <th>Departure</th>
            <th>Departure Time</th>
            <th>Arrival</th>
            <th>Arrival Time</th>
            <th>Class</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Remain Seats</th>
            <th>Reserve</th>
          </tr>
          </thead>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tbody>";
       
        // echo "<tr>";
        // echo "<td>" . $row['FLnumber'] . "</td>";
        // echo "<td>" . $row['company']." ".$row['type']. "</td>";
        // echo "<td>" . $depart . "</td>";
        // echo "<td>" . $row['departure'] . "</td>";
        // echo "<td>" . $row['d_time'] . "</td>";
        // echo "<td>" . $row['arrival'] . "</td>";
        // echo "<td>" . $row['a_time'] . "</td>";
        // echo "<td>" . $row['classname'] . "</td>";
        // echo "<td>" . $row['capacity'] . "</td>";
        // echo "<td>" . $row['price'] . "</td>";
        
       
            //calculate number of remain seats
            $seatreserved = "SELECT flightno, classtype, COUNT(*)
                        FROM book B
                        WHERE B.date = '".$depart."' AND B.flightno = '".$row['FLnumber']."'AND B.classtype ='".$row['classname']."' AND paid=1
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
        
            // echo "<td>".$availableNumber."</td>";
            // echo "<td></td>";
            // echo "</tr>";

    $result2 = mysqli_query($con,$sql2);
    $rowcount2 = mysqli_num_rows($result2);
    
    if($rowcount2>0){
        while($row2 = mysqli_fetch_array($result2)){

        echo "<tr>";
        echo "<td>" . $row['FLnumber'] . "</td>";
        echo "<td>" . $row['company']." ".$row['type']. "</td>";
        echo "<td>" . $depart . "</td>";
        echo "<td>" . $row['departure'] . "</td>";
        echo "<td>" . $row['d_time'] . "</td>";
        echo "<td>" . $row['arrival'] . "</td>";
        echo "<td>" . $row['a_time'] . "</td>";
        echo "<td>" . $row['classname'] . "</td>";
        echo "<td>" . $row['capacity'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>".$availableNumber."</td>";
        echo "<td></td>";
        echo "</tr>";














        echo "<tr>";
        echo "<td>" . $row2['FLnumber'] . "</td>";
        echo "<td>" . $row2['company']." ".$row2['type']. "</td>";
        echo "<td>" . $return . "</td>";
        echo "<td>" . $row2['departure'] . "</td>";
        echo "<td>" . $row2['d_time'] . "</td>";
        echo "<td>" . $row2['arrival'] . "</td>";
        echo "<td>" . $row2['a_time'] . "</td>";
        echo "<td>" . $row2['classname'] . "</td>";
        echo "<td>" . $row2['capacity'] . "</td>";
        echo "<td>" . $row2['price'] . "</td>";


         //calculate number of remain seats
            $seatreserved4 = "SELECT flightno, classtype, COUNT(*)
                        FROM book B
                        WHERE B.date = '".$return."' AND B.flightno = '".$row2['FLnumber']."'AND B.classtype ='".$row2['classname']."' AND paid=1
                        GROUP BY flightno, classtype";
            $reserved4 = mysqli_query($con, $seatreserved4);   
            $reservedNumber4 = mysqli_fetch_array($reserved4);
            
            $capacity4 = mysqli_query($con, "SELECT capacity FROM class C WHERE C.number='".$row2['FLnumber']."' AND C.name= '".$row2['classname']."'");
            $capacityNumber4 = mysqli_fetch_array($capacity4);


            if(mysqli_num_rows($reserved4)>0){            
                $availableNumber4 = $capacityNumber4['capacity'] - $reservedNumber4['COUNT(*)'];
            }else{
                $availableNumber4 = $capacityNumber4['capacity'];
            }
        
            echo "<td>".$availableNumber4."</td>";


        if($availableNumber>0 && $availableNumber4>0){
        echo '<td>
            <form action="shoppingcart.php" method="post">
            <input type="hidden" name="flightno" value="'.$row['FLnumber'].'">
            <input type="hidden" name="classtype" value="'.$row['classname'].'">
            <input type="hidden" name="price" value="'.$row['price'].'">
            <input type="hidden" name="date" value="'.$depart.'">
            <input type="hidden" name="flightno2" value="'.$row2['FLnumber'].'">
            <input type="hidden" name="classtype2" value="'.$row2['classname'].'">
            <input type="hidden" name="price2" value="'.$row2['price'].'">
            <input type="hidden" name="date2" value="'.$return.'">
            <input type="hidden" name="type" value="roundtrip">
            <button type="submit" class="btn btn-primary">Add to Chart</button>
            </form>
            </td>';
        }else{
            echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
        }

           
        
        echo "</tr>";

    } 



    }

    
    

    }
    echo " </tbody></table>";
  }












//mysqli_free_result($result);

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