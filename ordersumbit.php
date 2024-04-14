<?php
if (isset($_GET['send']) && $_GET['send'] === 'addorderpage') {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="storestyle.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Cart</title>

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
      </ul>
      <hr>
    </nav>
    <br><br><br><br>




<?php
echo "done here";
}
else{
    header("Location: cart.php");
    exit();
}
   ?>