<?php
	/**
	*
	*@Database connection
	*/
	require 'db/conection.php';
	if(isset($_GET['order']) && isset($_GET['order']) == 'conferm'){
		$delete_checkout_data = $ser->prepare("DELETE FROM checkout");
	    $delete_checkout_data->execute();

	    $delete_cart_data = $ser->prepare("DELETE FROM cart");
	    $delete_cart_data->execute();
	    header('Location:index.php');
	}
	if(isset($_GET['order']) && $_GET['order'] == 'cancel'){
		$delete_checkout_data = $ser->prepare("DELETE FROM checkout");
	    $delete_checkout_data->execute();

	    $delete_cart_data = $ser->prepare("DELETE FROM cart");
	    $delete_cart_data->execute();
	}
	/**
	*
	*@Getting data from checkouts 
	*/
	$checkout_data = $ser->prepare("SELECT * FROM checkout");
    $checkout_data->execute();
    $num = 1;
    $total = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div class="container">
		<div class="bill col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-6 col-sm-6 col-xs-12 logo smart">
				online shopping 
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12" id="orderActions">
				<a href="javascript:void(0)" class="btn btn-primary pull-right" id="print">
					<i class="fa fa-fw fa-print"></i>Print
				</a>
				<a href="?order=conferm" class="btn btn-primary pull-right">
					Conferm Order
				</a>
				<a href="?order=cancel" class="btn btn-primary pull-right">
					Cancel Order
				</a>
			</div>
		</div>
	<table class="table bill-1">
		<thead>
			<tr>
				<th>Sr.No.</th>
				<th>Product</th>
				<th>price</th>
				<th>Quantity</th>
				<th>Shipping Cost/unit</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php while($rec = $checkout_data->fetch()): ?>
			<tr>
				<td><?php echo $num++ ?></td>
				<td><?php echo $rec['product'] ?></td>
				<td><?php echo $rec['price'] ?></td>
				<td><?php echo $rec['quantity'] ?></td>
				<td><?php echo $rec['shipping_cost'] ?></td>
				<td><?php 
						echo $rec['total'];
						$total = $total + $rec['total'];
					?>
				</td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
	<div class="col-md-12 col-sm-12 col-xs-12 t-hold">
		
		<span class="pull-right total">
			Total : <b><?php echo $total ?></b>
		</span>
	</div>
	</div>
</body>
</html>
