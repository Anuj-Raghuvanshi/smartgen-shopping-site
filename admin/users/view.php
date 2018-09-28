<?php
require 'conection/conection.php';
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "delete")
	{
		$id=$_REQUEST['id'];
		$delete = $ser->prepare("DELETE FROM users WHERE id=$id");
		$delete->execute();
	}
	$query = $ser->prepare("SELECT * FROM users");
	$query->execute();
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>User Maneger</h3>
		</div>	
		<div class="panel panel-default">
			<div class="panel-body">
				<h5 class="links">
					<a href="">Click Here</a> to add new <a href="">User</a>
				</h5>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>User Name</th>
				<!-- <th>Change Password</th> -->
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
					<?php echo $result['fname'].' '.$result['lname']; ?>
				</td>
				<td>
					<?php echo $result['email']; ?>
				</td>
				<!-- <td>
					<a href="?content=change-password&action=edit&id=<?php echo $result['id']; ?>" class="btn btn-primary btn-xs">Change Password</a>
				</td> -->
				<td>
					<a href="?content=users&action=delete&id=<?php echo $result['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you shure you want to delete this user!!');">Delete</a>
				</td>
			</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>