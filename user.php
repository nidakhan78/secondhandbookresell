<?php

session_start();

if(!isset($_SESSION['user'])){
echo "You are logged out";
	header('location:index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<style type="text/css">
		.text .top_nav{
			width: 100%;
			height: 50px;
			background: white;
			padding: 0 50px;
			padding-top: 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.text .top_nav .left{
			padding-top: 2px;
			padding-bottom: 2px;
			font-size: 25px;
			font-family: Times New Roman, serif;
		}

		.text .top_nav .navbar-right ul{
			display: flex;
			list-style: none;
			padding-top: 15px;
			font-family: sans-serif;
		}

		.text .top_nav .navbar-right ul li{
			float: right;
			margin: 0 40px;
		}

		.navbar-nav li{
			display: inline-block;
			margin: 0;
			margin-left: 80px;
			margin-right: 200px;
		}
		.contain .navbar-nav .lefty{
			background: #DAA520;
		}
		.full{
			border: 1px solid;
			width: 900px;
			height: 550px;
			margin-left: 200px;
		}
		.full input{
			width: 100%;
			height: 35px;
			padding: 5px;
			font-size: 14px;
			margin-top: 5px;
		}
		.headding{
			border-bottom:1px solid black;
			width: 100%;
			padding-left: 40px;
			padding-top: 10px;
			background-color: #F5F5F5;
			color: black;
		}
		.left-form{
			width: 450px;
			height: 505px;
			margin-left: 0;
			padding: 20px;
			padding-top: 20px;
			float: left;
		}
		.left-form .btn{
			cursor: pointer;
		}
		.right-form{
			width: 448px;
			height: 500px;
			margin-left: 0;
			padding: 10px;
			padding-top: 20px;
			float: left;
		}
		.footer{
			padding-right: 30px;
			padding-top: 35px;
		}
		.footer .btnn{
			border:1px solid;
			width: 90px;
			height: 40px;
			background-color: #1167B1;
			color: white;
			float: right;
			cursor: pointer;
		}
		.footer .btnn:hover, .footer .btnn:active{
			background: #78C5EF;
			border: none;
		}
	</style>
</head>

<body>

<div class="text">
	<div class="top_nav">
		<div class="left"><p>Second Hand Book Reselling</p></div>
		<div class="navbar-right">
			<ul>
				<li><p style= "font-size:16px;"></style> Hello, <a style= "color: red"><?php echo $_SESSION['user']; ?></a></p></li>
				<a href="addcart.php"><i style="font-size:22px; color: black" class="fa">&#xf07a;</i>
				<li> <a href="logout.php" style="font-size: 16px; color: black; text-decoration: none">Logout </a><i class="fa fa-sign-out" style="font-size:16px; color: black"></i></li>
			</ul>
		</div>
		
	</div>
	
</div>

<nav class="navbar navbar-expand-lg bg-dark">
	<div class="contain">
 	<ul class="navbar-nav active">
    	<li class="lefty">
       	 <a class="nav-link" href="user.php" style="color: white;">Sell Books <span class="sr-only">(current)</span></a>
      	</li>
     
      	<li class="nav-item">
       	 <a class="nav-link" href="mybooks.php" style="color: white;">My Books</a>
      	</li>
   
     	<li class="nav-item">
      	 <a class="nav-link" href="viewbooks.php" style="color: white;">View Books</a>
     	</li>
     	
     	<li class="nav-item">
      	 <a class="nav-link" href="myorders.php" style="color: white;">My Orders</a>
     	</li>
 	 </ul>
	</div>
</nav>
<br></br>

<div class="full">
<div class="headding">
<h3>Sell Books</h3></div>

<form action="beforemybooks.php" method="post" enctype="multipart/form-data">
	<div class="left-form">
	Book Name:<br><input type="text" name="bookname" placeholder=" Enter Book Name" autocomplete="off" required></br></br>
	Category:<br><select name="category" style="margin-top: 5px;" required>
		<option value="" selected disabled>--Select Category--</option>
		<option value="Science">Science</option>
		<option value="Drama">Drama</option>
		<option value="Action and Adventure">Action and Adventure</option>
		<option value="Romance">Romance</option>
		<option value="Mystery">Mystery</option>
		<option value="Horror">Horror</option>
		<option value="Health">Health</option>
		<option value="Travel">Travel</option>
		<option value="Childrens">Childrens</option>
		<option value="Dictionaries">Dictionaries</option>
		<option value="History">History</option>
		<option value="Cookbooks">Cookbooks</option>
		<option value="Math">Math</option>
		<option value="Comics">Comics</option>
		<option value="Fantasy">Fantasy</option>
		<option value="Others">Others</option>
		</select> </br></br>
	Purchase Date:<br><input type="date" name="purchasedate" placeholder=" Enter Purchase Date" required></br></br>
	Price:<br><input type="number" onkeypress="return event.charCode >= 49" min="1" step="1" name="price" placeholder=" Enter Price" autocomplete="off" required></br></br></br>
	Upload Image:<input class="btn" type="file" name="file" id="file" required>
</div>
	<div class="right-form">
		Author Name:<br><input type="text" name="authorname" placeholder=" Enter Author Name" autocomplete="off" required></br></br>
		Book Language:<br><select name="language" style="margin-top: 5px;" required>
			<option value="" selected disabled>--Select Book Language--</option>
			<option value="English">English</option>
			<option value="Hindi">Hindi</option>
			<option value="Marathi">Marathi</option>
		</select></br></br>
		Book Condition:<br><select name="condition" style="margin-top: 5px;" required>
			<option value="" selected disabled>--Select Book Condition--</option>
			<option value="New">New</option>
			<option value="Good">Good</option>
			<option value="Fair">Fair</option>
			<option value="Poor">Poor</option>
		</select></br></br>
		Description:<br><textarea name="description" rows="3" cols="50" placeholder="  Enter Description" style="margin-top: 5px;" required></textarea></br></br>
	<div class="footer">
		<input class="btnn" type="submit" name="submit" value="Submit"></div>
	</div>
	</div>

</form>
<br><br>
<div></div><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>