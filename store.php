<?php
if (isset($_GET['cart'])) {
  $cart = $_GET['cart'];
if ($cart === 'addtocart') {
  echo "
  <div class='wrapper-failed' >
    <div class='card' style='  border-left: 5px solid lightgreen;'>
      <div class='subject'>
        <h3>Success</h3>
        <p>add to cart!</p>
      </div>
      <div class='icon-times'><button onclick='closeFailureMessage()'>X</button></div>
    </div>
  </div>
  <script>
    function closeFailureMessage() {
      var wrapperFailed = document.querySelector('.wrapper-failed');
      wrapperFailed.style.display = 'none';
    }
  </script>
  ";
}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="storestyle.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title>Store</title>
<style>
      .wrapper-failed {
  position: fixed; 
  top: 20px; 
  right: 20px; 
  z-index: 9999; 
}

.wrapper-failed .card {
  width: 300px; 
  background-color: #fff;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-left: 5px solid #28a745; 
  border-radius: 3px;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}


</style>
</head>
<body>
<img src="photo/logo.png" alt="" style="padding-left: 400px;">
<nav>
    <ul>
        <li><a href="homepage.php">Home page</a></li>
        <div class="vl"></div>
        <li><a href="store.php">Store</a></li>
        <div class="vl"></div>
        <li><a href="msg.php">Send a msg</a></li>
        <div class="vl"></div>
        <li><a href="cart.php">Shopping Cart</a></li>
        <div class="vl"></div>
        <li><a href="profile.php">Profile</a></li>
    </ul>
    <hr>
</nav>
<br><br><br><br>

<div class="container">
  <div class="row">

<?php
error_reporting(E_ERROR | E_PARSE);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_uni";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$product_name = array();
$cat_id = array();
$product_price = array();
$product_img = array();
$cat_title=array();

$sql = "SELECT product_name, cat_id, product_price, product_img FROM product";
$sql2="SELECT cat_title FROM categoriy" ; 
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $product_name[] = $row['product_name'];
    $cat_id[] = $row['cat_id'];
    $product_price[] = $row['product_price'];
    $product_img[] = $row['product_img'];
  }
} else {
  echo "No data found.";
}
if ($result2->num_rows > 0) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
    $cat_title[] = $row2['cat_title'];
  
  }}

for($i=0 ; $i < count($product_name) ; $i++){
    echo "
    <div class='container' >
    
    <div  class='row'  >
    
        <div class='col-md-4'>
            <div  class='card'  >
            <br>
            <img src='".$product_img[$i]."' alt=".$product_name[$i]." style='width:33.3%'>
            <h1>".$product_name[$i]."</h1>
            <p class='price'>".$product_price[$i]."</p>
            <p style='text-align: center; font-family:Serif ;'> ";
            switch($cat_id[$i]){
              case 1 :
               echo $cat_title[0];
          break;
          case 2 :
            echo $cat_title[1];
            break;

          case 3 :
            echo $cat_title[2];
          break;
          case 4 :
            echo $cat_title[3];
            break;
             } 
            
            
            
            echo"</p>
                       
            <div class='btn-group'>
           
            <button class='btn' type='button' onclick='know(".$i.")'>Learn more</button>
            <button class='btn' type='button' onclick='cart(".$i.")'  >Add to cart</button>
            </div></div><br><br></div>
            
               " ;
               if ($i==count($product_name)-1)
               {
                break ;
               }
               echo "
            <div class='col-md-4'>
            <div  class='card '>
            <br>
            <img src='".$product_img[$i=$i+1]."' alt=".$product_name[$i]." style='width:33.3%'>
            <h1>".$product_name[$i]."</h1>
            <p class='price'>".$product_price[$i]."</p>
            <p style='text-align: center; font-family:Serif ;'>";
            switch($cat_id[$i]){
              case 1 :
               echo $cat_title[0];
          break;
          case 2 :
            echo $cat_title[1];
            break;

          case 3 :
            echo $cat_title[2];
          break;
          case 4 :
            echo $cat_title[3];
            break;
             } 
            echo"</p>
            <div class='btn-group'>
            <button class='btn' type='button' onclick='know(".$i.")'>Learn more</button>
            <button class='btn' type='button' onclick='cart(".$i.")'  >Add to cart</button>
            </div></div><br><br></div>
            
    
             " ;
             if($i==count($product_name)-1)
             {
                break ;
             }
             echo "
            <div class=' col-md-4'>
            <div  class='card ' >
            <br>
            <img src='".$product_img[$i=$i+1]."' alt=".$product_name[$i]." style='width:33.3%'>
            <h1>".$product_name[$i]."</h1>
            <p class='price'>".$product_price[$i]."</p>
            <p style='text-align: center; font-family:Serif ;'>"; 
            switch($cat_id[$i]){
              case 1 :
               echo $cat_title[0];
          break;
          case 2 :
            echo $cat_title[1];
            break;

          case 3 :
            echo $cat_title[2];
          break;
          case 4 :
            echo $cat_title[3];
            break;
             } 
            echo"</p>
            <div class='btn-group'>
            <button class='btn' type='button' onclick='know(".$i.")'>Learn more</button>
            <button class='btn' type='button' onclick='cart(".$i.")'  >Add to cart</button>
            </div></div><br><br></div>
              
            </div></div> 
            
    " ; 
    }
$conn->close();
?>

</div>
</div>

<script>
function know(number) {
  window.location.href = 'learnmore.php?product=' + number;
}

function cart(cartitem) {
  window.location.href = 'cart.php?item=' + cartitem;
}
</script>

</body>
</html>
