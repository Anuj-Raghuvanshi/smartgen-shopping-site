<?php
	require 'conection/conection.php';
	$s='';
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){		
		$id = $_REQUEST['id'];
		$rec = $ser->prepare("SELECT * FROM page WHERE id='$id'");
		$rec->execute();
		while($result=$rec->fetch()){
			$name = $result['name'];
			$title = $result['title'];
			$is_active = $result['is_active'];
			$page_path = $result['page_path'];
		}
	    if(isset($_POST['submit'])){
			$rt= $ser->prepare("UPDATE page SET name=:name,title=:title,is_active=:active,page_path=:page_path WHERE id=$id" );
			$rt->bindParam('name', $_POST['name']);
			$rt->bindParam('title', $_POST['title']);
			$rt->bindParam('active', $_POST['is_active']);
			$rt->bindParam('page_path', $_POST['page_path']);
			$rt->execute();
			$s='ok';
			header('Location:view.php');
		}
	}
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Edit Page</h3>
		</div>	
	</div>
	<form method="post" class="create-form">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Page Name :</b>
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
								<b>Title :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="title" value="<?php echo $title ;?>">
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
								<select name="is_active">
									<option value="0" selected="$is_active">
										No
									</option>
									<option value="1"  selected="$is_active">
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
								<b>Path :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="page_path" value="<?php echo $page_path ;?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<input type="submit" name="submit" value="Change" class="btn btn-primary">
							<input type="button" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>