<?php
include'db.php';

$userid=$_POST['orderid'];
if (empty($_SESSION['mail'])){
    $id=$_COOKIE[$cookie_name];
}
else{
$id = $_SESSION['id'];
}
// echo $id;
$query="DELETE  FROM productcart where userid='$id'";
// echo $query;
 $result=mysqli_query($con,$query);
 print_r($result);
 /*   if($result)
    {
       // echo 'deleted succesfully';
        header('location:usercart.php');
    }

*/
// }






                 
?>
