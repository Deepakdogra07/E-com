<?php
include 'db.php';
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$mail=$_SESSION['mail'];
 echo $id;
$shipping=$_POST['orderid'];
echo $shipping;
$query1="SELECT products.productname, 
        products.price, 
        productcart.quantity,
        products.discount
        FROM productcart 
        JOIN products ON productcart.productid = products.id
         WHERE userid = '$id'";
         $result1 = mysqli_query($con, $query1);
    print_r($result1);
    while ($row1 = mysqli_fetch_assoc($result1)){

        $productname = $row1['productname'];
        $price = $row1['price'];
        $quantity = $row1['quantity'];
        $discount=$row1['discount'];
        $price= $price*$quantity;
        $newprice=$price*((100-$discount)/100);
    }

$query="SELECT address.*, 
                countries.name as country_name, 
                states.name as state_name ,
                cities.name as city_name ,
                address.adress 
                FROM address
                JOIN countries ON address.country=countries.id
                JOIN states ON address.state=states.id 
                JOIN cities on address.city=cities.id  
                where defaultshipping='$shipping' and userid = '$id'";

 echo "<pre>";
 echo $query; 
$result=mysqli_query($con,$query);
print_r($result);

while($row=mysqli_fetch_assoc($result))
{
					 $address=$row['adress'];
                     $address1=$row['adress2'];
                     $country=$row['country_name'];
                     $state=$row['state_name'];
                     $city=$row['city_name'];
                     $number=$row['mobile'];
                     $pin=$row['pin'];
}
echo $address;
echo "<pre>";
print_r($_SESSION);
// using array for combining address fields and insert into order table

 $OrderData['id'] = $id;
$OrderData['mail'] = $mail;
$OrderData['adress'] = array( $address1 ,$address, 
				$country, $state , $city,
				$number , $pin);
$OrderData['name']=$name;
$data=implode("\r\n,",$OrderData['adress']);
echo $data;

// // $useraddress=$OrderData['adress'];
print_r ($OrderData);



if($shipping==1)
{
    $data = mysqli_escape_string($con, $data);
$query1="INSERT INTO orders (userid , adress , username , usermail,quantity , price, productname)VALUES('$id','$data','$name','$mail','$quantity','$newprice','$productname')";

 echo $query1;

$result1=mysqli_query($con,$query1);

print_r($result1);
}
// else
// {
// 	header('location:address.php');
// }
?>

