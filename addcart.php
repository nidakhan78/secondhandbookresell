
<?php

session_start();

if(!isset($_SESSION['user'])){
echo "You are logged out";
	header('location:index.php');
}
?>

<?php
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'productdetail');

	if(isset($_POST["add"])){
		if(isset($_SESSION["cart"])){
			$item_array_id = array_column($_SESSION["cart"], "product_id");
		if(!in_array($_GET["id"], $item_array_id)){
			$count = count($_SESSION["cart"]);
			$item_array = array(
			'product_id'  => $_GET["id"],
			'item_img'  => $_POST["hidden_img"],
			'item_name'  => $_POST["hidden_name"],
			'item_price'  => $_POST["hidden_price"],
		);
		$_SESSION["cart"][$count] = $item_array;
		echo '<script>alert("Item Successfully Added to Your Cart")</script>';
		echo '<script>window.location="viewbooks.php"</script>';
	}else{
			echo '<script>alert("Product is already Added to Cart")</script>';
			echo '<script>window.location="addcart.php"</script>';
		}
	}else{
		$item_array = array(
			'product_id'  => $_GET["id"],
			'item_img'  => $_POST["hidden_img"],
			'item_name'  => $_POST["hidden_name"],
			'item_price'  => $_POST["hidden_price"],
		);
		$_SESSION["cart"][0] = $item_array;
	}
}

if(isset($_GET["action"])){
	if($_GET["action"] == "delete"){
		foreach ($_SESSION["cart"] as $key => $value) {
			if($value["product_id"] == $_GET["id"]){
				unset($_SESSION["cart"][$key]);
				echo '<script>alert("Product has been Removed...!")</script>';
				echo '<script>window.location=addcart.php</script>';
			}
		}
	}
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
		.table-responsive{
			padding-left: 20px;
			padding-right: 20px;
			background-color: white;
			
		}
		th{
			background-color: #808080;
			color:white;
			padding: 5px;
		}
		.btn{
			width: 50%;
			height: 38px;
			background-color: black;
			color: white;
			border: 1px solid black;
		}
		.table-responsive button:hover, .table-responsive button:active{
			color: white;
		}
</style>

</head>

<body>
<!--NIda was here-->
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
<h3>My Cart</h3></div><br>

<div class="table-responsive">
<table class="table shadow" style="width:100%" >
	
		<tr>
		<th style="width: 10%; text-align: center;">Item</th>
		<th style="width: 10%; text-align: center;">Author Name</th>
		<th style="width: 10%; text-align: center;">Cost</th>
		<th style="width: 10%; text-align: center; padding-right: 30px;">Action</th>
		</tr>
		
		<?php
			if (!empty($_SESSION['cart'])){
				

				foreach ($_SESSION['cart'] as $key => $value){
					$total = 0;
					$ntotal = $total + $value["item_price"];
					?>
		<tr>
			<td style="text-align: center;"><img src="<?php echo $value["item_img"]; ?>" height="100px" width="100px"></td>
			<td style="text-align: center; padding-top: 40px;"><?php echo $value["item_name"]; ?></td>
			<td style="text-align: center; padding-top: 40px;">$ <?php echo $value["item_price"]; ?></td>
			<td style="text-align: center; padding-top: 40px;"><a href="addcart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><button style="width: 90px; height: 40px; background-color: red;color: white;">Delete</button></a></td>
		</tr>
		<tr>
			<td style="font-family: sans-serif; font-size: 16px; border: none;" name="" value=""><b>TOTAL PRICE: $<?php echo number_format($ntotal);?></b></td>
			<td style="border: none;"></td>
			<td style="border: none;"></td>
			<td style="border: none;"></td>
		</tr>
		<tr>
			<td style="border: none;"><a href="pay.php"><button type="button" class="btn" name="btnn" action="myorders.php" method="post" enctype="multipart/form-data">Buy Now</button></a><br></td>
			<td style="border: none;"></td>
			<td style="border: none;"></td>
			<td style="border: none;"></td>
		</tr>		
				<?php
				
				}
			?>
		
			<?php
			}

		?>
	
	</table>
	
	</div><br><br>

<?php
if(isset($_POST["add"])){
$_SESSION['newtotal'] = $value['item_price'];

$_SESSION['det'] = $value['item_name'];
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>