<?php
include'db.php';
$id=$_SESSION['id'];


include'navigation.php';
if(empty($_SESSION['mail'])){
    header('location:login.php');
}
// $sql11="SELECT * FROM address where userid='$id'";
// $r1=mysqli_query($con,$sql11);
// if($r1==0)
// {
//     header('location:address.php');
// }

?>
<body>
<div class="container" style="margin-top:50px">
  <div class="row">



    
    <div class="col-sm-9">
 


<div class="row">
  <table class="table col-sm-12">
  <thead>
    <tr>
      <th scope="col"style="text-align:center;">IMAGE</th>
      
      <th scope="col">PRODUCT NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
<?php


                $total=0;
                
                $query= "SELECT 
                productcart.id, 
                productcart.quantity,
                products.productname,
                products.description,
                products.price,
                products.discount,
                user.name
          FROM productcart
                JOIN products ON products.id = productcart.productid
                JOIN user ON user.id = productcart.userid
                WHERE user.id = $id

        ";

                  $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($result)){
                        $line_total=0;
                            $id=$row['id'];
                            $name=$row['name'];
                            $productname=$row['productname'];
                            $price=$row['price'];
                            $discount=$row['discount'];
                            $description=$row['description'];
                            $quantity=$row['quantity'];
                            $newprice=$price*$quantity;
                            $line_total= $line_total +$newprice; 
                            $total=$total+$line_total;
                            $total1=$total*(100-$discount)/100;
                           
echo'



    <tr>
        <td> <img src="../images/2.jpg" class="card-img-top mx-auto d-block" style="width: 10rem ;height: 10rem ;"></td>
          
           <td>  <h5 class="card-title">'.$productname.'</h5></td>
           <td> <p class="card-text">₹'.$newprice.'</p></td>
            <td><p class="text-dark" style="margin-left:20px;font-size:20px;">
         '.$quantity.'</p></td>
         </tr>
        ';
}
echo'<tr>

<td colspan="2" align="center" ><h5> Total Price:</h5></td>
<td><b>'.$total.'</b></td>
</tr>
';
?>
</tbody>
</table>
</div>
  <!-- <a href="removeproduct.php?deleteid='.$id.'"   class="btn btn-danger">Remove Product </a> -->
</div>
<div class="col-sm-3">
	<div class="card mb-3" style="margin-top:0px;">
                    <div class="card-body">

                            <div class="form-group"> <label><b>Please Select Payment Method:</b></label>
     <?php
             $userid=$_SESSION['id'];
             $username=$_SESSION['name'];
             $shipping=1;
              $query1 = "SELECT address.*, 
                countries.name as country_name, 
                states.name as state_name ,
                cities.name as city_name ,
                address.adress 
                FROM address
                JOIN countries ON address.country=countries.id
                JOIN states ON address.state=states.id 
                JOIN cities on address.city=cities.id
                where address.userid=$userid
                and address.defaultshipping=$shipping";
              


           
             $result1=mysqli_query($con,$query1);
               // echo $query1;
            // die();
            //  // print_r($result1);
            //  die();
             if($result1){

                 while($row1=mysqli_fetch_assoc($result1)){
                    //  $id=$row1['id'];
                    $id1 = $row1['id'];
                     $address=$row1['adress'];
                     $address1=$row1['adress2'];
                     $country=$row1['country_name'];
                     $state=$row1['state_name'];
                     $city=$row1['city_name'];
                     $number=$row1['mobile'];
                     $pin=$row1['pin'];
                   
                

      echo ' 
                 
  <label class="form-check-label" for="exampleRadios1">
  Payments Methods:
  </label>
     <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Or pay on cash on delivery
  </label>
</div>
 <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
  <label class="form-check-label" for="exampleRadios1">
   Or Pay Using UPI
     </label>
</div>
      

    
    ';
    }
}
    // echo $total;
     ?>

        


                    

                    </div>
    
                 
                </div>

 <aside class="col-sm-12" style="margin-top:10px;">

                
<?php
                         
                            echo'
                            <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger b ml-3"><strong>'.$discount.'%</strong></dd>
                        </dl>
            
                        <dl class="dlist-align">
                            <dt>Offer Price:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>₹'.$total1.'</strong></dd>
                        </dl>
                                <td><p class="card-text"><button type="submit" class="btn btn-danger"style="margin-left:40px;margin-top:50px;margin-bottom:10px;" 
                                data-toggle="modal" data-target="#exampleModalLong">
                                 Place Order
                                    </button></p></td>
</tr>
                    </div>
                </div>
                ';
              ?>
            </aside> 
               </div>
</div>
</div>
</div>
</div>

 




<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Your Name and Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
             

      echo ' 
                <p class="card-text"><b>'. $_SESSION['name'].'</b></p>
                <label><b>Your Address :</b></label> 
      <p class="card-text">'. $address1.','. $address.'
      ,'. $city.'
        ,'. $state.'
      ,'. $country.','.$pin.'.</p>
      <p class="card-text"><b>Mobile No.:</b>'.$number.'</p>
         <p class="card-text"><b>Email:</b>'.$_SESSION['mail'].'</p>
    
    ';

    // echo $total;
   
                         
                            echo'
                            <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger b ml-3"><strong>'.$discount.'%</strong></dd>
                        </dl>
            
                        <dl class="dlist-align">
                            <dt>Offer Price:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>₹'.$total1.'</strong></dd>
                        </dl>
                                <td><p class="card-text"></tr>
                                <div class="modal-footer">
        <button class="btn btn-success" style="margin-left:40px;margin-top:50px;margin-bottom:10px;" type="button" onclick="order('.$shipping.')" >
                                Confirm Order
                                    </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
                    </div>
                </div>
                ';
              ?>          
      </div>

    </div>
  </div>
</div>

<?php

include'footer.php';

?>
<script type="text/javascript">
   
          
       
//     function order(addressid){
// $('#addtocart').on('click', function() {
//      if(confirm('Are you sure you want to continue.')){
//           var cart = $(this).val();
//           $.ajax({
//                url: "order.php",
//                type: "GET",
//                data: {
//                     userorder: placeoder
//                },
//                success: function(data) {
//                     $("#userorder").html(data);

//                }
//           });
   
// }
// }
        function order(orderid) {
            // alert(orderid);
      if(confirm("Are you sure you want to continue??")){
    
          $.ajax({
               url: "order.php",
               type: "POST",
               data: {
                'orderid':orderid
                
               },
              success: function (response) {
                    alert("Hurray! Your Order Has Been Placed Successfully.");
                    window.location.href = "orderdetail.php";
                    
            },
            failure: function (response) {
                alert(response);
            }

               
          });
        }
        }
    
    
</script>
</body>



</html>


