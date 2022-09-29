<?php
include 'db.php';

$pid = $_POST['pid'];
$qty = $_POST['qty'];
if($qty<=0)
{
	$sql = "DELETE FROM productcart WHERE id ='$pid'";
	
}
else
{
	$sql = "UPDATE productcart SET quantity='$qty' WHERE id ='$pid'";
	
}
$result = mysqli_query($con,$sql);


?>
