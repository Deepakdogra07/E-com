<?php
include'db.php';
 // print_r($_SESSION);
include 'navigation.php';

if (empty($_SESSION['mail'])) {
 // header('location: login.php');
  
$id=$_COOKIE[$cookie_name];
}
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
                 $sql="SELECT * FROM products";

                 $result=mysqli_query($con,$sql);

                  // print_r($result);
                  // exit();
                        while($r=mysqli_fetch_assoc($result)){
                             $id=$r['id'];
                            $name=$r['productname'];
                            $price=$r['price'];
                             $discount=$r['discount'];
                              $image=$r['imagename'];
                            // $newprice=$r['newprice'];
echo'
    <div class="col-md-4">
        <div class="card " style="width: 18rem;">
         <img src="../images/'.$image.'" class="card-img-top mx-auto d-block" style="width: 10rem ;height: 10rem ;">
        <div class="card-body">
            <h5 class="card-title">'.$name.'</h5>
            <p class="card-text"> <b>Price:</b>'.$price.'</p>
             <button type="submit" class="btn btn-warning" onclick="cart('.$id.')">Add TO CART</button>
            <a href="product.php?productid='.$id.'"   class="btn btn-info">SEE MORE</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    function cart(pid) {
      if(confirm("Do you want to add this Product??")){
          $.ajax({
               url: "insertcart.php",
               type: "POST",
               data: {
                    pid: pid
               },
               success: function(data) {
                // location.reload();
               }
          });
        }
        }

</script>

</body>
</html>