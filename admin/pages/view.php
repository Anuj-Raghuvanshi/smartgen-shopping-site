<?php
require 'conection/conection.php';
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "delete")
	{
		$id=$_REQUEST['id'];
		$delete = $ser->prepare("DELETE FROM page WHERE id=$id");
		$delete->execute();
	}
	$query = $ser->prepare("SELECT * FROM page");
	$query->execute();
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Page Maneger</h3>
		</div>	
		<div class="panel panel-default">
			<div class="panel-body">
				<h5 class="links">
					<a href="?content=add-page">Click Here</a> to add new 
					<a href="?content=add-page">Page</a>
				</h5>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Title</th>
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
					<?php echo $result['title']; ?>
				</td>
				<td>
					<?php echo $result['is_active']; ?>
				</td>
				<td>
					<a href="?content=edit-page&action=edit&id=<?php echo $result['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
				</td>
				<td>
					<a href="?content=pages&action=delete&id=<?php echo $result['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you shure you want to delete this page!!');">Delete</a>
				</td>
			</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>