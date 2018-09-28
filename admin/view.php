<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin-2.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<header>
		<div class="container-fluide">
			<div class="container smart">
				Smart Generation
			</div>
			<div class="date">
				<div class="container">
					<span>
						<?php
							$date = date('d-M-Y');
							echo $date;
						?>
					</span>
					<!-- <span class="pull-right">
						<a href="shivam/admin">Logout</a>
					</span> -->
				</div>
			</div>
			
		</div>
	</header>

	<section>
		<div class="container">
			<div class="col-md-3 padding-left">
				<div class="list-group">
					<a href="?content=pages" class="list-group-item">Page manager</a>
					<a href="?content=add-page" class="list-group-item">Add Page</a>
					<a href="?content=menus" class="list-group-item">Menus</a>
					<a href="?content=add-menu" class="list-group-item">Add Menu</a>
					<a href="?content=users" class="list-group-item">Users</a>
					<a href="?content=create-user" class="list-group-item">Add user</a>
					<a href="?content=contact-us" class="list-group-item">Contact Details</a>
					<a href="?content=categorys" class="list-group-item">Categorys</a>
					<a href="?content=products" class="list-group-item">Products</a>
					<a href="?content=add-product" class="list-group-item">Add product</a>
				</div>
			</div>
			<div class="col-md-9 padding-right">
				<div>
					<?php require "route.php"; ?>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="footer">
			Design and develope by Shivam, Karan, Khushi
		</div>
	</footer>
</body>
</html>