<?php
$con=mysqli_connect('localhost','phpmyadmin','root','ecom');
session_start();

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
	 // echo "Connected successfully";
}
// $cookie_name = "guest";
// $cookie_value="Guest";
// setcookie($cookie_name, $cookie_value, time() + (86400 * 365	), "/");


//  $_COOKIE['value']=$_COOKIE[$cookie_name];

$cookie_name = "user_id";
$cookie_value = time().rand(5000,15000);


if(!empty($_COOKIE[$cookie_name]))
{
	// echo $_COOKIE[$cookie_name];
}
else
{
	setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); // 86400 = 1 day
}


   

//       ob_start();

// $random =(rand()%($value+1));

// if(!isset($_COOKIE['TestCookie'])){
//     setcookie('TestCookie', $random);
//     }
//     else{
//         $lastRandom= $_COOKIE['TestCookie']; 
//         if($lastRandom == $random){
//          if($random < $value){
//             $random++;
          
//         }
//     }
// }
?>