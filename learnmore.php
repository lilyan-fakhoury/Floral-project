<?php
session_start();
$Username = $_SESSION['username'];
$Cus_ID = $_SESSION['id'];
$commenttable = array();
$usernametable = array();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_uni";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Data
$id = array();
$product_name = array();
$description = array();
$price = array();
$img1 = array();
$img2 = array();
$img3 = array();

$sql = "SELECT id, product_name, description, price, img1, img2, img3 FROM learn_more";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $id[] = $row['id'];
    $product_name[] = $row['product_name'];
    $description[] = $row['description'];
    $price[] = $row['price'];
    $img1[] = $row['img1'];
    $img2[] = $row['img2'];
    $img3[] = $row['img3'];
  }
} else {
  echo "No data found.";
}

if (isset($_GET['product'])) {
    $i = $_GET['product'];
    $_SESSION['pro'] = $i;
}

// Comment
$theid = $_SESSION['pro'];

$sqlnew = "SELECT comment, Username FROM comment WHERE product_id = $theid";
$resultnew = $conn->query($sqlnew);
if ($resultnew->num_rows > 0) {
    while ($rownew = mysqli_fetch_assoc($resultnew)) {
        $commenttable[] = $rownew['comment'];
        $usernametable[] = $rownew['Username'];
    }
}

if (isset($_GET['comment'])) {
    $comment = $_GET['comment'];

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $cflag = "0";
    if (empty($comment)) {
        $cflag = "write a comment";
    } else {
        $comment = test_input($_GET['comment']);
    }

    if ($cflag != "0") {
        echo "Failed... Please write a comment";
    } else {
        // Use prepared statement to avoid SQL injection
        $sql = "INSERT INTO comment (comment, Cus_ID, Username, product_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisi", $comment, $Cus_ID, $Username, $theid);

        if ($stmt->execute()) {
            // Redirect back to the same page after adding a comment
            header("Location: learnmore.php?product=$theid");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="learnstyle.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title>learn_more</title>

<script>
    function changeImage(newImageSource) {
        var mainImage = document.getElementById('imggg');
        mainImage.src = newImageSource;
    }
</script>
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
<div class='element'>
  <img  src='<?php echo $img1[$i]; ?>' alt='img' width='500px' height='500px' id='imggg'>
  <div class='span1'>
    <p class='pree'>
      <span class='span2'><?php echo $product_name[$i]; ?></span><br><br>
      <?php echo $description[$i]; ?>
    </p>
    <p class='price' ><?php echo $price[$i]; ?></p>
  </div>
</div>
<div class='but'>
  <button onclick="changeImage('<?php echo $img1[$i]; ?>')">
    <img src="<?php echo $img1[$i]; ?>" alt="img" width="100px" height="100px" id="img11">
  </button>
  <button onclick="changeImage('<?php echo $img2[$i]; ?>')">
    <img src="<?php echo $img2[$i]; ?>" alt="img" width="100px" height="100px" id="img22">
  </button>
  <button onclick="changeImage('<?php echo $img3[$i]; ?>')">
    <img src="<?php echo $img3[$i]; ?>" alt="img" width="100px" height="100px" id="img33">
  </button>
</div>
<br><br>
<button  class='add' type='button' onclick='cart(<?php echo $i; ?>)'  >Add to cart</button>
<br><br><br><br><br><br><br><br>

<div class="comments-container">
    <h2>Comments</h2>
    <?php foreach ($commenttable as $index => $comment) { ?>
        <div class="comment">
            <p><strong><?php echo htmlspecialchars($usernametable[$index]); ?>:</strong></p>
            <p><?php echo htmlspecialchars($comment); ?></p>
        </div>
    <?php } ?>
</div>
<br><br><br><br><br>
<form action="learnmore.php" method="GET">
    <label for="comment"><span style="padding-left:100px;font-size:22px;">Add a Comment</span></label><br/>
    <textarea class="msg-textarea" name="comment" id="comment" type="text"></textarea>
    <input class="b" type="submit" value="Send a comment"/>
</form>


<script>
function cart(cartitem) {
  window.location.href = 'cart.php?item=' + cartitem;
}
</script>
</body>
</html>
