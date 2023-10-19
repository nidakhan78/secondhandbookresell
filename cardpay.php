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
	body{
			height: 100%;
			width: 100%;
			overflow-y: scroll;
		}
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
			display: flex;
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
			margin: 0;
			margin-left: 80px;
			margin-right: 200px;
		}
		header{
			background-image: url(bg4.jpg);
			height: 50vh;
			background-size: cover;
			background-position: center;
		}
		.headding{
			padding-left: 650px;
		}
		.fleft{
			padding-left: 600px;
			color: black;
		}
		.fleft b{
			padding-left: 60px;
			font-size: 20px;
			font-family: sans-serif;
		}
		.rad input[type="radio"]{
			margin-left: 10px;
			margin-right: 10px;
			
		}
		.tcc{
			width: 30%;
			height: 505px;
			padding: 450px;
			padding-top: 20px;
			float: left;
			overflow: hidden;
		}
		.fill{
			width: 448px;
			height: 500px;
			margin-left: 0px;
			padding: 0;
			padding-top: 20px;
			float: left;
		}
		.fill input{
			width: 80%;
			height: 30px;
			padding: 5px;
			font-size: 14px;
			margin-top: 5px;
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
				<li> <a href="index.php" style="font-size: 16px; color: black; text-decoration: none">Logout </a><i class="fa fa-sign-out" style="font-size:16px; color: black"></i></li>
			</ul>
		</div>
	</div>
</div>

<nav class="navbar navbar-expand-lg bg-dark">
	<div class="contain">
 	<ul class="navbar-nav active">
    	<li class="nav-item">
       	 <a class="nav-link" href="user.php" style="color: white;">Sell Books</a>
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
<header>
	
</header><br>
<div class="headding">
<h3>Make Payment</h3></div><br>

<form action="beforeorder.php?action=spay&id=<?php echo $result["uploadproducts_id"]; ?>" method="post" enctype="multipart/form-data">
	<div class="fleft">
		<b>Payment Options:</b><br>

	<div class="rad">
		<input type="radio" name="Payment" value="Cash On Delivery" onclick="myFunction('pay.php')">Cash On Delivery
		<input type="radio" name="Payment" value="Credit Card" checked>Credit Card
		</div><br><br>
	</div>


	<div class="tcc" id="tpay">
		<b style="font-family: sans-serif;">Shipping Address</b><br><textarea name="ship" rows="5" cols="35" placeholder="" value="" style="margin-top: 5px;" autocomplete="off" required></textarea><br><br>
	</div>

	<div class="fill">
		Name on Card<br><input type="text" name="" placeholder="  Enter Name on Card" required><br><br>
		Card No<br><input type="text" name="" placeholder="  Enter Card No" required><br><br>
		CVV<br><input type="text" name="" placeholder="  Enter CVV" required><br><br>
		Total Amount<br><input type="text" name="" placeholder="" value="<?php echo $_SESSION['newtotal']; ?>"><br><br>
		<a href="order.php"><button style="width: 25%; height:45px; font-size: 14px; background-color: #ff6663; color: white;
		margin-left: 80px; border:1px solid orange;" type="submit" name="spay">Make Payment</button></a>
	</div><br><br><br>
</form>

<script>
function myFunction(url) {

   window.location.href =  'http://localhost/project/'  + url 
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>