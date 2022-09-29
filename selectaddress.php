<?php
include'db.php';
include'navigation.php';
$id=$_SESSION['id'];
if(empty($_SESSION['mail'])){
    header('location:login.php');
}


?>
<div class="container" style="margin-top:50px">
  <div class="row">
  	<?php
  	$query=" SELECT address.*, 
                countries.name as country_name, 
                states.name as state_name ,
                cities.name as city_name ,
                address.adress 
                FROM address
                JOIN countries ON address.country=countries.id
                JOIN states ON address.state=states.id 
                JOIN cities on address.city=cities.id
                where address.userid='$id'";
  	// echo $query;
  	$result=mysqli_query($con,$query);
  	// print_r($result);
  	while($row=mysqli_fetch_assoc($result)){
  		$addressid=$row['addressid'];
  		$address=$row['adress'];
  		$address1=$row['adress2'];
      $username=$row['username'];
  		$city=$row['city_name'];
      $pin=$row['pin'];
  	  $mobile=$row['mobile'];
      $country=$row['country_name'];
      $state=$row['state_name'];


echo '
 <div class="col-md-4">
<div class="card" style="width: 18rem;">
  <div class="card-body">
  <input type="radio">
    <h5 class="card-title">'.$username.'</h5>
    <h6 class="card-subtitle mb-2 ">'.$address.','.$address1.'</h6>
    <p class="card-text">'.$city.','.$state.','.$country.'</p>
    <p class="card-text">'.$mobile.'</p>
    <p class="card-text">'.$pin.'</p>
  </div>
  <button class="btn btn-success"  type="button" onclick="address('.$addressid.')" > Make this address default</button>
</div>
</div>';





    }

  	?>
</div>
</div>
<script type="text/javascript">
  function address(adressid) {
            // alert(orderid);
      if(confirm("Are you sure you want to continue??")){
    
          $.ajax({
               url: "changeaddress.php",
               type: "POST",
               data: {
                'adressid':adressid
                
               },
              success: function () {
                   
                    // window.location.href = "usercart.php";
                    
            },
           

               
          });
        }
        }

</script>