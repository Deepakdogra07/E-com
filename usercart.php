<?php
include'db.php';

if (empty($_SESSION['mail'])) {
  $id=$_COOKIE[$cookie_name];
  // echo $_COOKIE['value'];
}
else
{
 $id=$_SESSION['id']; 
$name=$_SESSION['name'];  
}

include'navigation.php';


?>
<head>
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
</head>
<body>
<div class="container" style="margin-top:50px">
  <div class="row">



    
    <div class="col-sm-9">
 


<div class="row">
  <table class="table col-sm-12">
  <thead>
    <tr>
      <th scope="col">IMAGE</th>
      
      <th scope="col">PRODUCT NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">Quantity</th>
      <th scope="col" colspan="2" style="text-align:center;">ACTION</th>
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
                products.imagename,
                 products.productname,
                products.discount
        FROM productcart
                JOIN products ON products.id = productcart.productid
                WHERE productcart.userid = '$id'

        ";

                  $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($result)){
                        $line_total=0;
                            $id1=$row['id'];
                            $productname=$row['productname'];
                            $price=$row['price'];
                            $description=$row['description'];
                            $quantity=$row['quantity'];
                            $discount=$row['discount'];
                            $image=$row['imagename'];
                            $newprice=$price*$quantity;
                            $line_total= $line_total +$newprice; 
                            $total=$total+$line_total;
                            $total1=$total*(100-$discount)/100;
                            if($id1==0){
                                echo'<h1>your cart is empty go shopping</h1>';
                            }
                        
         else
         {                   
echo'



    <tr>
        <td> <img src="../images/'.$image.'" class="card-img-top mx-auto d-block" style="width: 10rem ;height: 10rem ;"></td>
          
           <td>  <h5 class="card-title">'.$productname.'</h5></td>
           <td> <p class="card-text">₹'.$line_total.'</p></td>
            <td><p class="card-text">'.$description.'</p></td>
            
 
       <td><p class="card-text">
     
         <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="'.$quantity.'" 
         id="change" data-task="minus" data-id="'.$id1.'" onclick="change('.$quantity.', this)">
         <input type="number" step="1" max="10"  value="'.$quantity.'" onchange="quantity('.$id1.', this)" 
         id="change_input_'.$id1.'" class="quantity-field border-0 text-center w-25">
         <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm lh-0" data-field="'.$quantity.'" data-id="'.$id1.'" id="quantity"  data-task="plus" onclick="change('.$quantity.', this)">
      </p></td>
            <td> <button type="submit" class="btn btn-primary" onclick="deleteproduct('.$id1.')"> remove</button>  </td>
            <tr>
        </div>
        </div>
    </div>';
}
}
?>
</tbody>
</table>
</div>
  <!-- <a href="removeproduct.php?deleteid='.$id.'"   class="btn btn-danger">Remove Product </a> -->
</div>
    <div class="col-sm-3">

 <aside class="col-sm-12">
    <?php
    if ($id1==0) {
         echo" ";
     } 
     else
     {
        echo'<button class="btn btn-danger" onclick="deletecart('.$id.')" style="margin-left:50px;">remove all</button>';
     }
     ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
<?php
                         
                            echo'
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">₹'.$total.'</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3">'.$discount.'%</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Offer Price:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>₹'.$total1.'</strong></dd>
                        </dl>
                        <hr> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Make Purchase
</button>
                         <a href="showproduct.php" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                    </div>
                </div>
                ';
              ?>
            </aside> 
               </div>
</div>
</div>

<?php if ($id1==0) {
   echo' 


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="alert alert-danger">Oops! Your Cart is empty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <a  class="btn btn-danger" href="index.php" align="center">Go shopping</a>
      </div>
    </div>
  </div>
</div>

    ';
}
else{
   echo' 


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Please Select One of these for Address.</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
            <a  class="btn btn-success" href="oldaddress.php">Use Your Default Address</a>
            <a  class="btn btn-warning" href="selectaddress.php">OR select fromprevious address</a>
        <a  class="btn btn-primary" href="address.php">Add New Address</a>
      </div>
    </div>
  </div>
</div>

    ';
}
?>

<?php

include'footer.php';

?>
</body>

<script>
     function change(quantity, obj) {
// alert(quantity);
  var $button = $(obj).val();
  var task = $(obj).data("task");
  var id = $(obj).data("id");
  var cart_qty = parseInt($("#change_input_"+id).val());

  if(task=="plus")
  {
    cart_qty++;
  }
  else
  {
    cart_qty--;
  }
  if(cart_qty<=0)
  {
 cart_qty=0
  }

 

  $.ajax({
 url : "update.php",
 type : "POST",
 data:{
    id : id,
    cart_qty : cart_qty 
 },
  dataType:"json",
  success: function(data){
    // location.reload();
  }
  });
  // alert(cart_qty);
$("#change_input_"+id).val(cart_qty);
 


  return true;
  

        }






      function quantity(pid, obj) {
      {
      var qty=$(obj).val();
          $.ajax({
               url: "updatecart.php",
               type: "POST",
               data: {
                    pid: pid,
                    qty: qty
               },
               success: function(data) {
                location.reload();
               }
          });
        }
        }
    function deleteproduct(deleteid){
            if(confirm("Are You sure you want to delete this product")){
          $.ajax({
               url: "removeproduct.php",
               type: "POST",
               data: {
                    deleteid:deleteid
               },
               success:function() {
                location.reload();
               }

                 });
   }
  


}

                function deletecart(orderid) {
            // alert(orderid);
      if(confirm("Are you sure you want to continue??")){
    
          $.ajax({
               url: "deleteproduct.php",
               type: "POST",
               data: {
                'orderid':orderid
                
               },
              success: function (response) {
                    location.reload();
                    // window.location.href = "index.php";
            },
            failure: function (response) {
                alert(response);
            }

               
          });
        }
        }
   

                                                                                     
        
                              
</script>

</html>


