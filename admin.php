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
 $ID_msg=array();
$Username=array();
$email = array();
$massage = array();
$time = array();

$sql = "SELECT ID_msg,Username, email, massage, time  FROM massage" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ID_msg[] = $row['ID_msg'];
        $Username[] = $row['Username'];
        $massage[] = $row['massage'];
        $email[] = $row['email'];
        $time[] = $row['time'];
    }
}

//remove
if (isset($_POST['remove_msg'])) {
    $message_id_here = $_POST['remove_msg'];
    $remove_query = "DELETE FROM massage WHERE  ID_msg = '$message_id_here'";
    
    if ($conn->query($remove_query) === TRUE) {
        // Item removed successfully, you can redirect or refresh the page here
        header("location:admin.php");
        exit();
    } }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="stylehome.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
    nav {
   
   
   padding-left: 40px;
 }
 
 nav ul {
   list-style-type: none;
   margin: 0;
   padding: 0;
   display: flex;
  
 }
 
 nav li {
   margin: 0 10px;
 }
 
 nav li a {
   display: block;
   color: #555555;
   text-decoration: none;
   padding: 10px;
   border-radius: 4px;
   transition: background-color 0.3s ease;
 }
 
 nav li a:hover {
   background-color: #555;
   text-decoration: none;
   color: #fff;
 }

 .vl {
   border-left: 2px solid rgb(65, 65, 65);
   height: 32px;
 }

h1 {

  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}

table {
  width: 100%;
  table-layout: fixed;
}

.tbl-header {
  background-color: rgba(255, 255, 255, 0.3);
}

.tbl-content {
  height: 300px;
  overflow-x: auto;
  margin-top: 0px;
  border: 1px solid rgba(255, 255, 255, 0.3);
}

th {
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}

td {
  padding: 15px;
  text-align: left;
  vertical-align: middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255, 255, 255, 0.1);
}

body {
  background: linear-gradient(to right, #F5CEC7, #e79796);
  font-family: 'Roboto', sans-serif;
}

section {
  margin: 50px;
}

.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}

.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}

.made-with-love a {
  color: #fff;
  text-decoration: none;
}

.made-with-love a:hover {
  text-decoration: underline;
}


::-webkit-scrollbar {
  width: 6px;
}

::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
</style>
    <title>Admin page</title>
   
</head>
<body>
<h1 style="color:white;font-family:Bradley Hand, cursive; padding-left:20px;  padding-top:30px; padding-bottom:30px;">Floral Admin</h1>

    <nav>
    <ul>
    <li><a href="admin.php">massages</a></li>
    <li><a href="additem.php">Add product</a></li>
        <div class="vl"></div>
       
        
        </ul>
        <hr>
</nav>
<br><br><br><br>


<section>

  <h1>The massges </h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Massage</th>
          <th>Time</th>
          <th>Remove</th>
         
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php 
         for ($i = 0;$i < count($massage); $i++) {
        echo"
        <tr>
        <td>".$Username[$i]."</td>
          <td>".$email[$i]."</td>
          <td>".$massage[$i]."</td>
          <td>".$time[$i]."</td>
          <td> <form method='post' action='admin.php'>
          <input type='hidden' name='remove_msg' value='".$ID_msg[$i]."'>
          <button class='btn btn-outline-danger' type='submit' style='color:black;'>REMOVE</button>
      </form></td>
          
        </tr> ";
        }
     ?>
      </tbody>
    </table>
  </div>
</section>




</body>
</html>
