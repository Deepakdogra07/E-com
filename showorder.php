<?php
include'db.php';
include'navigation.php';
$id=$_SESSION['id'];


?>
<div class="container" style="margin-top:30px">
  <div class="row">



    <div class="col-sm-2">
        
      
      <ul class="nav nav-pills flex-column">
         <li class="nav-item">
          <a class="nav-link" href="index.php">See Our Ecommerce Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="showproduct.php">Products</a>
        </li>
       <!--  <li class="nav-item">
          <a class="nav-link" href="form.php">Register Now</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-10">
 



 		<div class="row">

  	<h1 style="margin-left: 350px;">My Order Details:</h1>
  
        
         
  	<?php
    if($id==0){
      echo'<br><BR><div class="alert alert-danger" style="margin-left:350px;"><h3 > Your Cart is empty!!!</h3></div>';
    }
    else{
   	$query="SELECT  *  FROM OrderDetails
          
          WHERE userid='$id'";
  	// echo $query;
  	$result=mysqli_query($con,$query);
  	// print_r($result);
  	while($row=mysqli_fetch_array($result)){
  		$productname=$row['productname'];
  		$productprice=$row['productprice'];
      $quantity=$row['orderquantity'];
      $offerprice=$row['offerprice'];
      // $address=$row['adress'];
                            
echo'
  <div class="col-md-4"  style="margin-top:0px;">
<div class="card " style="width: 18rem; margin-top: 10px;">
<p class="card-text"> <b>Product:</b>'.$productname.',</p>
 <h5 class="card-title"><b>Price:</b>'.$productprice.'</h5>
            <p class="card-text"> <b>Quantity:</b>'.$quantity.'</p>
            <p class="card-text"> <b>Payable Amount:</b>'.$offerprice.'</p>
 </div>
 </div>
  	';	
    }  	
  
  }
  	?>
 
  	

        </div>
         <div class="">
<?php
echo'<button class="btn btn-success" onclick="deletecart('.$id.')" style="float:right">SEE MORE PRODUCTS</button>';
?>   
</div> 
    </div>

</div>
</div>




<?php

include'footer.php';

?>

      <script type="text/javascript">
      	
      	// function deletecart(){
      	// 	$.ajax({
       //         url: "deleteproduct.php",
       //         type: "",
       //         data: {
       //             :
       //         },
       //         success:function() {
       //          window.location:"index.php";
       //         }

       //           });
      	// }
         function deletecart(orderid) {
            // alert(orderid);
      
    
          $.ajax({
               url: "deleteproduct.php",
               type: "POST",
               data: {
                'orderid':orderid
                
               },
              success: function (response) {
                    
                    window.location.href = "index.php";
            },
            failure: function (response) {
                alert(response);
            }

               
          });
        }
           
      </script>



</body>
</html>