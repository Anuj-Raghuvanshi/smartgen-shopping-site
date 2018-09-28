<?php
require 'conection/conection.php';
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "delete")
	{
		$id=$_REQUEST['id'];
		$delete = $ser->prepare("DELETE FROM category WHERE id=$id");
		$delete->execute();
		header("Location:view.php");
	}
	$query = $ser->prepare("SELECT * FROM category");
	$query->execute();
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Categorys</h3>
		</div>	
		<div class="panel panel-default">
			<div class="panel-body">
				<h5 class="links">
					<a href="?content=add-category">Click Here</a> 
					to add new 
					<a href="?content=add-category">Category</a>
				</h5>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Is Active</th>
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
					<?php echo $result['name']; ?>
				</td>
				<td>
					<?php echo $result['is_active']; ?>
				</td>
				<td>
					<a href="?content=edit-category&action=edit&id=<?php echo $result['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
				</td>
				<td>
					<a href="?content=categorys&action=delete&id=<?php echo $result['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you shure you want to delete this page!!');">Delete</a>
				</td>
			</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>