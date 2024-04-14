<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_uni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data  based on the user's session 
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to the login page if the user is not authenticated
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$query = "SELECT * FROM customer WHERE Cus_ID = $user_id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}

$userData = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and update the database (validate, sanitize, and secure input)
    $newPhone = mysqli_real_escape_string($conn, $_POST['phone']);
    $newAddress = mysqli_real_escape_string($conn, $_POST['address']);
    
    // Check if a new password is provided
    if (!empty($_POST['new_password'])) {
        $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']); // Get the plain text password
        
        // Update the user's password in the database without hashing
        $updatePasswordQuery = "UPDATE customer SET Password = '$newPassword' WHERE Cus_ID = $user_id";
        $updatePasswordResult = mysqli_query($conn, $updatePasswordQuery);
        if (!$updatePasswordResult) {
            die("Error in updating password: " . mysqli_error($conn));
        }
    }
    
    // Redirect back to the profile page
    header("Location: profile.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>User Profile</title>
    <style>
      .div{
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}


h1 {
    text-align: center;
    margin-top: 20px;
}


form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

input[type="file"] {
    margin-top: 5px;
}


input[type="submit"] {
    background-color: #FFB284;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #C6C09C;
}


br {
    clear: both;
}


h1 {
    color: #333;
}


body {
    padding-top: 20px;
}
.center-container {
  display: flex;
  justify-content: center;
  align-items: center;
  
}

.red-button {
  padding: 10px 20px; 
  background-color: red;
  color: white;
  text-decoration: none;
  border: none;
  border-radius: 5px; 
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
<div class="div">
<br><br><br><br>  
    <h1>User Profile</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $userData['Username']; ?>" readonly>
        <br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $userData['Phone']; ?>">
        <br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $userData['Address']; ?>">
        <br>

        <div>
        <label for="password">Password:</label>
<input type="password" id="password" name="password" value="<?php echo $userData['Password']; ?>" readonly>
<span id="togglePassword" style="cursor: pointer;">Show</span>
</div>
<br>

        <div>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password">
        </div>
        <br>

        

        <input type="submit" value="Save">

    </form>
    
</div>
<div class="center-container">
  <a href="logout.php" id="logout" class="red-button">Logout</a>
</div>
<script>
    // JavaScript to toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    
    // Set the initial state to show the password
    passwordInput.type = 'text';
    togglePassword.textContent = 'Hide';
    
    togglePassword.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.textContent = 'Hide';
        } else {
            passwordInput.type = 'password';
            togglePassword.textContent = 'Show';
        }
    });
</script>
</body>
</html>

