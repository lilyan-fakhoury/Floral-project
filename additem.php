<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_uni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
$product_name="productname";
$product_price="productprice";
$product_img="productimg";
$cat_type="cat_type";

  
    function test_input($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    
    $product_name=test_input($_POST['productname']);
    $product_price=test_input($_POST['productprice']);
    $product_img=test_input($_POST['productimg']);
    $cat_type=test_input($_POST['cat_type']);

    //cat_type to cat_id

switch($cat_type)
{
case "Flower" :
    $cat_id=1;
    break;

    case "Herb":
    $cat_id=2 ;
    break;

    case "Vegetable" :
        $cat_id=3;
        break;
        
    case "Fruit":
        $cat_id=4;
        break;    

}



$sql="INSERT INTO product (product_name , product_price , product_img ,cat_id)
        values ('$product_name' ,'$product_price' ,'$product_img', '$cat_id')";
        
         if ($conn->query($sql) === TRUE) {
            header("location: additem.php");
            exit();
        } else {
            echo "Error inserting item: " . $conn->error;
        }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehome.css">
    <style>
        body {
            background: linear-gradient(to right, #F5CEC7, #e79796);
            font-family: 'Roboto', sans-serif;
        }
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
#catigoriy option {
            width: 100px;
        section {
            margin: 50px;
        }}

        .form-container {
            background-color: rgba(255, 255, 255, 0.3);
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: 500;
            font-size: 14px;
            color: #fff;
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text" ],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #FF6B6B;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #FF4E4E;
        }
    </style>
    <title>Add product</title>
</head>
<body>
    <h1 style="color:white;font-family:Bradley Hand, cursive; padding-left:20px;  padding-top:30px; padding-bottom:30px;">Floral Admin </h1>
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
        <div class="form-container">
            <h2>Add product to the store</h2>
            <form method="post" action="additem.php">
                <label for="productname">product name:</label>
                <input type="text" id="productname" name="productname" required>
            
                <label for="productprice">product price:</label>
                <input type="text"  id="productprice" name="productprice"  required></input>
                <label for="productimg">product img:</label>
                <input type="text" id=" productimg" name="productimg"  required></input>
                <label for="cat_type">category:</label>
                <input list="categoriy" id="cat_type" name="cat_type" style="width: 100px;" required>
                    <datalist id="categoriy">

                       <option value="Flower" />
                       <option value="Herb" />
                       <option value="Vegetable" />
                       <option value="Fruit" />
                    </datalist>
                    <br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>
