<?php

session_start();

if(!isset($_SESSION['user'])){
echo "You are logged out";
	header('location:index.php');
}
?>

<?php
	if(isset($_POST['bsearch'])){
		$valuetoSearch = $_POST['valuetosearch'];
		$que = "SELECT * FROM `product` WHERE CONCAT(`item`, `details`, `cost`) LIKE '%".$valuetoSearch."%' ";
		$search_result = filterTable($que);
	}else{
		$que = "SELECT * FROM `product`";
		$search_result = filterTable($que);
	}

	function filterTable($que){
		$con = mysqli_connect('localhost','root','','productdetail');
		$filter_result = mysqli_query($con, $que);
		return $filter_result;
	}
?>

<?php
	if(isset($_POST['cate'])){
		$vcat = $_POST['cate'];
		$q = "SELECT * FROM `product` WHERE (`category`) LIKE '%".$vcat."%' ";
		$searchh_result = filterrTable($q);
	}else{
		$q = "SELECT * FROM `product`";
		$searchh_result = filterrTable($q);
	}

	function filterrTable($q){
		$con = mysqli_connect('localhost','root','','productdetail');
		$filterr_result = mysqli_query($con, $q);
		return $filterr_result;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

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
		.contain .navbar-nav .lefty{
			background: #DAA520;
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
		.search_bar{
			padding-left: 150px;
		}
		.search_bar input[type="text"]{
			height: 36px;
			border: 1px solid lightgrey;
			padding: 4px 30px;
			outline: none;
		}
		.search_bar input[type="text"]:focus{
			box-shadow: 0 0 5px rgba(81, 203, 238, 1);
		}
		.product{
			border: 1px solid black;
			margin: -1px 19px 3px 10px;
			padding: 30px;
			text-align: center;
			background-color: white;	
		}
		.col-md-3{
			display: inline-block;
		}
	</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
    	<li class="nav-item">
       	 <a class="nav-link" href="user.php" style="color: white;">Sell Books <span class="sr-only">(current)</span></a>
      	</li>
     
      	<li class="nav-item">
       	 <a class="nav-link" href="mybooks.php" style="color: white;">My Books</a>
      	</li>
   
     	<li class="lefty">
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
<h3>View Books</h3></div><br>

<form action="viewbooks.php" method="POST">
<div class="search_bar">
	<input type="text" name="valuetosearch" placeholder="Search Book Name" autocomplete="off">
	<button type="subbmit" name="bsearch" style="background-color: blue; width: 40px; height: 36px; margin-left: -4px;"><i class="fa" style="font-size:24px; color: white">&#xf002;</i></button>
</div>
<br><br><br><br>
</form>

	<?php
	$database_name = "productdetail";
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'productdetail');

	$qu= "INSERT INTO `product`( `item`, `details`, `cost`) VALUES ('item','details','cost',)";
	$result = mysqli_query($con,$qu);

	$query = "SELECT * FROM product ORDER BY id ASC";
	$result = mysqli_query($con, $query);


	if(mysqli_num_rows($result) > 0){

		while ($row = mysqli_fetch_array($result)){
			while( $row = mysqli_fetch_array($search_result)){
				
			?>
		
		<div class="col-md-3" style="padding-left: 20px;">
			<form method="post" action="addcart.php?action=add&id=<?php echo $row["id"]; ?>">

				<div class="product">
					<img src="<?php echo $row["item"]; ?>" class="img-responsive" height="200px" width="200px;"><br>
					<h5 class="text" style="color: black;"><?php echo $row["details"]; ?></h5>
					<h5 class="text-danger">$ <?php echo $row["cost"]; ?></h5>
					<input type="hidden" name="hidden_img" value="<?php echo $row["item"]; ?>">
					<input type="hidden" name="hidden_name" value="<?php echo $row["details"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["cost"]; ?>">
					<input type="hidden" name="hidden_category" value="<?php echo $row["category"]; ?>">
					<input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add To Cart">
				</div>
			</form>
		</div>
		<?php
			
		}
	}
}
	?>	
<br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
