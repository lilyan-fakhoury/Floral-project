<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="style1.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
    <title>Login Form</title>
   
</head>
<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];
    
    if ($source === 'notlogin') {
        echo "
        <div class='wrapper-failed'>
          <div class='card'>
            <div class='subject'>
              <h3>Failed</h3>
              <p>Invalid username or password.</p>
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
    }

    if ($source === 'creat') {
        echo "
        <div class='wrapper-failed' >
          <div class='card' style='  border-left: 5px solid lightgreen;'>
            <div class='subject'>
              <h3>Success</h3>
              <p>Account created successfully!</p>
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
    }
}
?>



<body style="background-color:#F5CEC7;">
    <div class="container">
        <h2>Login</h2>
        <form action="val.php" method="POST">
            <div class="form-group">
			<input type="hidden" name="form_type" value="form2">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="Login" class="btn">
			<a href="creat account.php"style="margin-left:460px;" >Create new account</a>
        </form>
    </div>
</body>
</html>

