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
		.headding{
			padding-left: 600px;
		}
		.search_bar{
			padding-left: 30px;
		}
		.search_bar input[type="text"]{
			border: 1px solid lightgrey;
			padding: 4px 10px;
			outline: none;
		}
		.search_bar input[type="text"]:focus{
			box-shadow: 0 0 5px rgba(81, 203, 238, 1);
		}
		.table-responsive{
			padding-left: 30px;
			padding-right: 30px;

		}
		th{
			background-color: #808080;
			color:white;
			border-color: white;
			text-align: center;
			padding: 5px;
		}
		td{
			height: 120px;
		}

	</style>
<?php
header('location:mybooks.php');
?>
</head>

<body>

<div class="text">
	<div class="top_nav">
		<div class="left"><p>Second Hand Book Reselling</p></div>
		<div class="navbar-right">
			<ul>
				<li><p style= "font-size:16px;"></style> Hello, <?php echo $_SESSION['user']; ?></p></li>
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
       	 <a class="nav-link" href="user.php" style="color: white;">Sell Books</a>
      	</li>
     
      	<li class="lefty">
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
<br>

<div class="full">
<div class="headding">
<h3>My Books</h3></div>

<div class="search_bar">
	<input type="text" name="" placeholder="Search Book Name">
	<a href="#"><button style="background-color: blue; width: 40px; height: 36px; margin-left: -4px;"><i class="fa" style="font-size:24px; color: white">&#xf002;</i></button></a>
</div><br>
</div>

<div class="table-responsive">
<table class="table-hover text-center" border="1" style="width:100%">
	
		<thead>
		<th>Image</th>
		<th>Book<br>Name</th>
		<th>Description</th>
		<th>Author Name</th>
		<th>Category</th>
		<th>Language</th>
		<th>Purchase<br>Date</th>
		<th>Book<br>Condition</th>
		<th>Price</th>
		<th>Selling<br>Date</th>
		<th>Book<br>Status</th>
		</thead>

		<tbody>
			
	<?php

	$db='signup';
	$conn = mysqli_connect('localhost','root');
	mysqli_select_db($conn,'signup');
	$uname = $_SESSION['user'];
	$query1 = "select * from registration where username='$uname'";
	$result1 = mysqli_query($conn,$query1);
	$row1 = mysqli_fetch_array($result1);
	$id = $row1["id"];

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'displayupload');

	if(isset($_POST['submit'])){

		$bookname = $_POST['bookname'];
		$newbk['bookname'] = $bookname;
		$_SESSION['newbk']=$newbk['bookname'];

		$category = $_POST['category'];
		$purchasedate = $_POST['purchasedate'];
		$price = $_POST['price'];
		$authorname = $_POST['authorname'];
		$booklanguage = $_POST['language'];
		$bookcondition = $_POST['condition'];
		$description = $_POST['description'];

		$files = $_FILES['file'];
		$filename = $files['name'];
		$fileerror = $files['error'];
		$filetmp = $files['tmp_name'];

		$fileext = explode('.', $filename);
		$filecheck = strtolower(end($fileext));

		$fileextstored = array('jpg','jpeg','png');

		$sellingdate = date('Y-m-d');;

		$bookstatus = "available";
			$new= "sold";

		if (isset($_POST['btnn'])) {
  		$bookstatus= $new;
    		echo $bookstatus;
		} else {
    		echo $bookstatus;
		}


		if(in_array($filecheck, $fileextstored)){

				$fileDestination = 'uploads/'.$filename;
				move_uploaded_file($filetmp, $fileDestination);

				$q = "INSERT INTO `imgupload`(`username`, `image`, `book name`, `description`, `author name`, `category`, `language`, `purchase date`, `book condition`, `price`, `selling date`, `book status`,`userid`) VALUES ('{$_SESSION['user']}','$fileDestination','$bookname','$description','$authorname','$category','$booklanguage','$purchasedate','$bookcondition','$price','$sellingdate','$bookstatus','$id' )";

				$query = mysqli_query($con,$q);


				// $row = mysqli_num_rows(querydisplay);
				}else{
					?>
						<script>
							alert("This Extension Type Is Not Allowed");
						</script>
					<?php
				}
	}

	?>

		</tbody>
		
	</table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>