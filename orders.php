<?php
include 'db.php';
include'navigation.php';
$id=$_SESSION['id'];

?>
<div class="container" style="margin-top:30px">
  <div class="row">



    <div class="col-sm-2">
      
      
         <ul class="nav nav-pills flex-column">
        <li class="nav-item">
           <li class="nav-item">
          <a class="nav-link  " href="index.php">See Our Ecommerce Site</a>
        </li>
          <a class="nav-link " href="showproduct.php">Show Products</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="orders.php">Orders</a>
        </li>
       
        
         <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>
  <div class="col-sm-10">
    <div class="row">
        <?php
        $query="SELECT * FROM orders";
        // echo $query;
        $result=mysqli_query($con,$query);
        print_r($res);
        while($row=mysqli_fetch_array($result)){
        $order=$row['orderid'];
        // echo $order;
        // exit();
    }
  echo ' <form method="post">
  <ul class="navbar-nav">


          <li class="nav-item" style="margin-left:100px;"> 

      <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Search Here For Orders" style="width:600px;float:left;" name="search" > 
      
      ';?>
                     <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" name="country" id="country">
                         <option value="">Select Country</option>
                      <?php include'country.php';?>
            </select>
               </div>

               <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" name="state" id="state">
                         <option value="">Select State</option>
                         
                    </select>
               </div>
              
               <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" name="city" id="city">
                         <option value="">Select City</option>
                      
                    </select>
               </div>
                     
      <?php echo' <button type="submit" class="btn btn-info" style="width:100px;float:left;" onclick="searchfun()">Search </button>
      </li>
    </ul>
    </form>
';

// include'showorder.php';
        ?> 

<!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="orders.php">1</a></li>
    <li class="page-item"><a class="page-link" href="orders.php">2</a></li>
    <li class="page-item"><a class="page-link" href="orders.php">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->
    </div>
       
</div>

</div>
</div>
<?php include'footer.php';?>



<script type="text/javascript">
      function searchfun(){
        event.preventDefault();
         // alert("hi");
        $.ajax({
            url:"search.php",
            type : "POST",
            success: function() {
                

               }

        });
     }
     // this  ajax query for state
    
$('#country').on('change', function() {
          var country = $(this).val();
          $.ajax({
               url: "state.php",
               type: "POST",
               data: {
                    country: country
               },
               success: function(data) {
                    $("#state").html(data);

               }
          });
     });

      // this  ajax query for city


     $('#state').on('change', function() {
          var state = $(this).val();
          $.ajax({
               url: "city.php",
               type: "POST",
               data: {
                    state_id: state
               },
               success: function(data) {
                    $("#city").html(data);

               }
          });
     });
   
</script>
