<?php

$con=mysqli_connect('localhost','phpmyadmin','root','ecom');
session_start();
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
	 //echo "Connected successfully";
}






?>