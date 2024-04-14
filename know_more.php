<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_uni";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = array();
$name = array();
$intro = array();
$history = array();
$season1 = array();
$season2 = array();
$in_out = array();
$soil = array();
$water = array();
$location = array();
$img_intro = array();
$img1 = array();
$img2 = array();
$img3 = array();
$how_to_plant = array();
$how_to_grow = array();
$how_to_take_care = array();

$sql = "SELECT id, name, intro, history, season1, season2, `in/out`, soil, water, location, img_intro, img1, img2, img3, how_to_plant, how_to_grow, how_to_take_care FROM cart_product";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id[] = $row['id'];
        $name[] = $row['name'];
        $intro[] = $row['intro'];
        $history[] = $row['history'];
        $season1[] = $row['season1'];
        $season2[] = $row['season2'];
        $in_out[] = $row['in/out'];
        $soil[] = $row['soil'];
        $water[] = $row['water'];
        $location[] = $row['location'];
        $img_intro[] = $row['img_intro'];
        $img1[] = $row['img1'];
        $img2[] = $row['img2'];
        $img3[] = $row['img3'];
        $how_to_plant[] = $row['how_to_plant'];
        $how_to_grow[] = $row['how_to_grow'];
        $how_to_take_care[] = $row['how_to_take_care']; 
      }
} else {
    echo "No data found.";
}

if (isset($_GET['product'])) {


    $i = $_GET['product'];

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>know more</title>
    <style>

.contant{
display: flex;
flex-wrap: wrap;
justify-content: center;
}
.title{
    font-size: 110px;
    font-weight: 900;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-align: center;
    color:#e79796;
    

}
.icon{
color:crimson;
font-size: 50px;

}
.tit1{
font-size: 16px;

color:black;


}
.tit2{
font-size: 30px;
display: block;
color:#e79796;

margin-left: 100px;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;


}
.main{
margin-top: 50px;

box-shadow:  0 5px 25px rgba(1, 1, 1, 15%);
padding: 20px 30px;
width: 40.25em;
  height: 20.25em;
  margin-left: 400px;
  border-radius: 30px;
  transition: 0.7s ease;

}
.main:hover{ 

    transform: scale(1.1);
}

.tit3{
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;


}
.tit4{
    font-size: 20px;

color:crimson;
margin-left: 100px;
text-align:left;

}
.main3{
display: flex;
flex-wrap: wrap;
margin-top: 70px;
justify-content: center;
margin-bottom: 30px;
}

 .contant11 img{
    border: 2px;
border-radius: 30px;
padding-left: 10px;


}
.tit5{

    font-size: 30px;

color:#e79796;
margin-bottom: 10px;
margin-left: 200px;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;


}
.tit6{
    font-size: 15px;

color:black;
margin-left: 100px;  
}


</style>
</head>
<body>
<img src="photo/logo.png" alt="" style="padding-left: 400px;">
<br><br><hr><br><br>  
<?php 
        echo"


    <div class='contant'>
      
<h1 class='title'>".$name[$i]."</h1>
<img src='".$img_intro[$i]."' width='15%' height='15%'>



    </div>
   
<section>

<div class='contant'>
<pre class='tit1'>
    ".$intro[$i]."
           <span class='tit2'>History</span>
     ".$history[$i]."
</pre>
</div>


</section>

<section>
<div class='main'>
<div class='contant'>
    
    <h1 class='tit3'>Information about growing  plant</h1>
    <a href='#' class='icon'><i class='fa-solid fa-seedling'></i></a></div>
<pre class='tit4'>
".$season1[$i]."
".$season2[$i]."
".$in_out[$i]."
".$soil[$i]."
".$water[$i]."
".$location[$i]."


</pre>
</div>
</section>

<section>

<div class='main3'>
<div class='contant11'>

<img src='".$img1[$i]."' alt='img1' width='300px' height='400px'>
<img src='".$img2[$i]."' alt='img2' width='300px' height='400px'>
<img src='".$img3[$i]."' alt='img3' width='300px' height='400px'>
</div>
</div>
</section>


<section>

    <span class='tit5'>HOW TO PLANT </span>
    <pre class='tit6'>
       ".$how_to_plant[$i]."



    </pre>
  <hr>

    <span class='tit5'> HOW TO GROW  </span>
    <pre class='tit6'>
       ".$how_to_grow[$i]."



    </pre>

<hr>

    
    <span class='tit5'>HOW TO TAKE CARE OF IT </span>
    <pre class='tit6'>
       ".$how_to_take_care[$i]."



    </pre>



</section>
";  ?>
</body>
</html>