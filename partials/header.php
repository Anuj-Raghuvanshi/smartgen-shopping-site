<?php
	/**
    *
    *@Database connection
    */
    require 'db/conection.php';

    /**
    *
    *@Fetching faq data
    */
    $cart_items = $ser->prepare("SELECT * FROM cart");
    $cart_items->execute();
    $total_items = $cart_items->rowCount();
    
?>
<!DOCTYPE html>
<html>
<head>
	<!--meta defined-->
	<meta charset="utf-8">
	<!--title-->
	<title><?php echo $title;?></title>
	<!--css defined-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/about.css">
	<link rel="stylesheet" type="text/css" href="css/faq.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
</head>
<body>
	<div class="top-menu">
		<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 menu-top-1">
				<div class="col-md-6 col-sm-6 col-xs-6 top">
				<div class="top-left">
					<ul>
						<li>
							<a href="login.php"><i class="fa fa-fw fa-sm fa-user"></i>Login</a>
						</li>
						<li>
							<a href="admin/index.php"><i class="fa fa-fw fa-sm fa-user"></i>Admin Login
							<a href="cart.php">
								<i class="fa fa-fw fa-sm fa-shopping-cart"></i>
								Your Cart( <?php echo $total_items; ?> )
							</a>
						</li>
					</ul>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 top">
					<div class="pull-right top-right">
						<div class="search">
							<input type="text" placeholder="Search">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
