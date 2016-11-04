<?php

session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: homepage.html");
}
include_once 'dbconnect.php';

// if(isset($_POST['btn-signup']))
// {
 $username = $_POST['username'];
 $firstname =$_POST['firstname'];
  $lastname =$_POST['lastname'];
   $tel =$_POST['tel'];
 $email = $_POST['email'];
 $pwd1 = $_POST['pwd1'];

 if(isset($_POST['middlename'])){
 	$middlename = $_POST['middlename'];
 }else{
 	$middlename = "";
 }

  if(isset($_POST['gender'])){
 	$gender = $_POST['gender'];
 }else{
 	$gender = "";
 }

  if(isset($_POST['birthday'])){
 	$birthday = $_POST['birthday'];
 }else{
 	$birthday = "";
 }

 
 if(mysqli_query($conn,"INSERT INTO passanger(username,email,password,firstname,lastname,cellphone,middlename,gender,birthday) VALUES('$username','$email','$pwd1','$firstname','$lastname','$tel','$middlename','$gender','$birthday')"))
 {
  $_SESSION['user']=$username;
        header("Location: homepage.html");
         }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
// }
mysqli_close($conn);
?>