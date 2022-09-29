<?php
include'db.php';
include 'navigation.php';
print_r($_SESSION['admin_mail']);

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
          <a class="nav-link " href="orders.php">Orders</a>
        </li>
        
         <li class="nav-item">
          <a class="nav-link" href="addproduct.php">Add Product</a>
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
                 $sql="SELECT * FROM products";

                 $result=mysqli_query($con,$sql);

                  // print_r($result);
                  // exit();
                        while($r=mysqli_fetch_assoc($result)){
                             $id=$r['id'];
                            $name=$r['productname'];
                            $price=$r['price'];
                            $image=$r['imagename'];
                            // $discount=$r['discount'];
                            // $newprice=$r['newprice'];
echo'
    <div class="col-md-4">
        <div class="card " style="width: 18rem;">
         <img src="../images/'.$image.'" class="card-img-top mx-auto d-block" style="width: 10rem ;height: 10rem ;">
        <div class="card-body">
            <h5 class="card-title">'.$name.'</h5>
            <p class="card-text">'.$price.'</p>
             <a href="update.php?updateid='.$id.'" class="btn btn-primary">Update Product</a>
            <a href="delete.php?deleteid='.$id.'"  class="btn btn-danger">Delete Product</a>
        </div>
        </div>
    </div>';
}
?>
</div>


</div>
  </div>
</div>

<?php

include'footer.php';

?>
<script type="text/javascript">
         $(document).on('change', '#111', function() {
     // alert();
     var country_id = $(this).val();
     $.ajax({
     url: "a.txt",
     type: "GET",
     data: {},
     success: function(data){
          $("#state-dropdown").html(data);

          }
     });
}); 


</script>

</body>
</html>