<?php
	require 'conection/conection.php';
	$s='';
	$select = $ser->prepare("SELECT id,name FROM page");
	$select->execute();
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){		
		$id = $_REQUEST['id'];
		$rec = $ser->prepare("SELECT * FROM menu WHERE id='$id'");
		$rec->execute();
		while($result=$rec->fetch()){
			$id = $result['id'];
			$name = $result['name'];
			$page_id = $result['page_id'];
			$active = $result['is_active'];
			$order = $result['display_order'];
		}
	}
	if(isset($_POST['submit'])){
		echo $_POST['active'];
		$rt= $ser->prepare("UPDATE menu SET name=:name,page_id=:page_id,is_active=:active,display_order=:display_order WHERE id=$id" );
		$rt->bindParam('name', $_POST['name']);
		$rt->bindParam('page_id', $_POST['page_id']);
		$rt->bindParam('active', $_POST['active']);
		$rt->bindParam('display_order', $_POST['order']);
		$rt->execute();
		$s='ok';
		header('Location:view.php');
	}
	if(isset($_POST['cancel'])){
		header('Location:view.php');
	}
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Add Menu</h3>
		</div>	
	</div>
	<form method="post" class="create-form">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Name :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="name" value="<?php echo $name ;?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Page Id:</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="page_id">
									<option>Select</option>
									<?php while($result=$select->fetch()):?> 
										<option value="<?php echo $result['id']; ?>" selected="<?php echo $result['id']; ?>">
											<?php echo $result['name']; ?>
										</option>
									<?php endwhile;?>
								</select>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Is Active :</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="active">
									<option value="0" selected="<?php echo $active; ?>">
										No
									</option>
									<option value="1" selected="<?php echo $active; ?>">
										Yes
									</option>
								</select>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Display Order :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="number" name="order"  value="<?php echo $order ;?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<input type="submit" name="submit" value="Update" class="btn btn-primary">
							<input type="button" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>