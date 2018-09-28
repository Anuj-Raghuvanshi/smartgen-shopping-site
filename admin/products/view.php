<?php
require 'conection/conection.php';
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "delete")
	{
		$id=$_REQUEST['id'];
		$delete = $ser->prepare("DELETE FROM product WHERE id=$id");
		$delete->execute();
		header('Location:view.php');
	}
	$query = $ser->prepare("SELECT * FROM product");
	$query->execute();
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Product Manager</h3>
		</div>	
		<div class="panel panel-default">
			<div class="panel-body">
				<h5 class="links">
					<a href="?content=add-product">Click Here</a> 
					to add new 
					<a href="?content=add-product">Menu</a>
				</h5>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Category</th>
				<th>Company</th>
				<th>Modal</th>
				<th>Image</th>
				<th>Price</th>
				<th>Shiping</th>
				<th>Is Avilabel</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php while($result=$query->fetch()):?> 
			<tr>
				<td>
					<?php echo $result['id']; ?>
				</td>
				<td>
					<?php echo $result['category']; ?>
				</td>
				<td>
					<?php echo $result['company']; ?>
				</td>
				<td>
					<?php echo $result['modal']; ?>
				</td>
				<td>
					<img src="<?php echo $result['img']; ?>" class="img-t">
				</td>
				<td>
					<?php echo $result['price']; ?>
				</td>
				<td>
					<?php echo $result['shiping_cost']; ?>
				</td>
				<td>
					<?php echo $result['is_avilabel']; ?>
				</td>
				<td>
					<a href="?content=edit-product&action=edit&id=<?php echo $result['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
				</td>
				<td>
					<a href="?content=products&action=delete&id=<?php echo $result['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you shure you want to delete this page!!');">Delete</a>
				</td>
			</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>