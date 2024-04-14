<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="style1.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <title>Creat Account </title>
   
</head>
<body style="background-color:#F5CEC7;">
    <div class="container">
        <h2>Create Account</h2>
        <form action="val.php" method="POST">
            <div class="form-group">
			<input type="hidden" name="form_type" value="form1">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
			
			
			<div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
            </div>
			<div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
           

            <input type="submit" value="Create" class="btn">
			<a href="login.php">Log into existing account</a>
        </form>
    </div>
</body>
</html>