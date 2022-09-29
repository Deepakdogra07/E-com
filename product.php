<?php
include'db.php';
include 'navigation.php';

?>


<div class="container" style="margin-top:30px">
  <div class="row">



    <div class="col-sm-2">
      
      
      <ul class="nav nav-pills flex-column">
         <li class="nav-item">
          <a class="nav-link" href="index.php">See Our Ecommerce Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="showproduct.php">Products</a>
        </li>
        
       
        <li class="nav-item">
            <a class="nav-link " href="logout.php">Logout</a>
      </li>
      </ul>
      <hr class="d-sm-none">
    </div>

    <div class="col-sm-10">
 


<div class="row">
<?php
				$id=$_GET['productid'];
                 $sql="SELECT * FROM products WHERE id=$id";

                 $result=mysqli_query($con,$sql);

                  // print_r($result);
                  // exit();
                        while($r=mysqli_fetch_assoc($result)){
                        	// $query="SELECT * FROM products" WHERE id=$r['id'];
                         //     $result1=mysqli_query($con,$query);{
                             	
                            $name=$r['name'];
                            $price=$r['price'];
                            $discount=$r['discount'];
                            $discount1=100-$discount;
                            $description=$r['description'];
                            $total=($price*$discount1)/100;
echo'
    <div class="col-md-4">
        <div class="card " style="width: 18rem;">
         <img src="../images/2.jpg" class="card-img-top mx-auto d-block" style="width: 10rem ;height: 10rem ;">
        <div class="card-body">
            <h5 class="card-title">'.$name.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;<b>Price</b>:&nbsp;'.$price.'</h5>
            <p class="card-text"><b>Discount</b>:'.$discount.'%&nbsp;</p>
          <p class="card-text"><b>Product Description:</b><br>'.$description.'</p>
             <a href="address.php" class="btn btn-success" style="margin-left:70px;" onclick="abc()" id="addtocart"
             data-toggle="modal" data-target="#exampleModalLong">Buy Now</a>
        </div>
        </div>
    </div>';
}

?>
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
             $userid=$_SESSION['id'];
             $username=$_SESSION['name'];
             $shipping=1;
              $query1 = "SELECT address.*, 
                countries.name as country_name, 
                states.name as state_name ,
                cities.name as city_name ,
                address.adress ,address.addressid
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
                     $id1 = $row1['addressid'];

                     $address=$row1['adress'];
                     $address1=$row1['adress2'];
                     $country=$row1['country_name'];
                     $state=$row1['state_name'];
                     $city=$row1['city_name'];
                     $number=$row1['mobile'];
                     $pin=$row1['pin'];
                     $shipping=$row1['defaultshipping'];
                   
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
    }
}
    // echo $total;
   
                         
                            echo'
                            <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger b ml-3"><strong>'.$discount.'%</strong></dd>
                        </dl>
            
                        <dl class="dlist-align">
                            <dt>Offer Price:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>₹'.$total.'</strong></dd>
                        </dl>
                                <td><p class="card-text"><button type="submit" class="btn btn-danger"onclick="order('.$shipping.')" data-toggle="modal" data-target="#exampleModal"style="margin-left:40px;margin-top:50px;margin-bottom:10px;" >
                                 Confirm Order.
                                    </button></p></td>
</tr>
                    </div>
                </div>
                ';
              ?>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php

include'footer.php';

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>


    function abc(){
$('#addtocart').on('click', function() {
          var cart = $(this).val();
          $.ajax({
               url: "usercart.php",
               type: "GET",
               data: {
                    usercart: addtocart
               },
               success: function(data) {
                    $("#usercart").html(data);

               }
          });
     });
}
      // function order(addressid){
      //   confirm("Are you Sure??");
      //   var order = $(this).val();
      //   $.ajax({
      //       url:"order.php";
      //       type:"POST",
      //       data{
      //           order:order
      //       },
      //       success: function(data){
      //           ("#order").php(data);
      //       }
      //   });
      // }
      function order(orderid) {
            
      if(confirm("Are you sure you want to continue??")){
    
          $.ajax({
               url: "order.php",
               type: "POST",
               data: {
                'orderid':orderid
                
               },
              success: function (orderid) {
               if (orderid.d == true) {
                    alert("You will now be redirected.");
                    window.location = "index.php";
                }
            },
            failure: function (orderid) {
                alert(orderid.d);
            }
          });
        }
        }


    </script>
</body>

</html>