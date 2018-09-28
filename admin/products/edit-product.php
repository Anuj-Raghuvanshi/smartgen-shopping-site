<?php
	require 'conection/conection.php';
	$s='';
	$select = $ser->prepare("SELECT name FROM category");
	$select->execute();
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){		
		$id = $_REQUEST['id'];
		$rec = $ser->prepare("SELECT * FROM product WHERE id='$id'");
		$rec->execute();
		while($result=$rec->fetch()){
			$category = $result['category'];
			$is_avilabel=$result['is_avilabel'];
			$img = $result['img'];
			$spes = $result['spes'];
			$company = $result['company'];
			$modal = $result['modal'];
			$price = $result['price'];
			$shiping_cost = $result['shiping_cost'];
		}
	}
	if(isset($_POST['submit'])){
		if($_FILES['file']['name'] != ''){
			$target_path="../img/";
			$target_path=$target_path.basename($_FILES['file']['name']);
			$file_path="../img/".$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'],$target_path);
			$path=$file_path;
		}
		if($_FILES['file']['name'] == ''){
			$path=$img;
		}
		$rt= $ser->prepare("UPDATE product SET category=:category,is_avilabel=:is_avilabel,img=:img,spes=:spes,company=:company,modal=:modal,price=:price,shiping_cost=:shiping_cost WHERE id=$id" );
		$rt->bindParam('category', $_POST['category']);
		$rt->bindParam('is_avilabel', $_POST['is_avilabel']);
		$rt->bindParam('img', $path);
		$rt->bindParam('spes', $spes);
		$rt->bindParam('company', $_POST['company']);
		$rt->bindParam('modal', $_POST['modal']);
		$rt->bindParam('price', $_POST['price']);
		$rt->bindParam('shiping_cost', $_POST['shiping_cost']);
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
			<h3>Update Product</h3>
		</div>	
	</div>
	<form method="post" class="create-form" enctype="multipart/form-data">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Image :</b>
							</div>
							<div class="col-md-8 text-left">
								<img src="<?php echo $img;?>" class="img-t">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Category :</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="category">
									<?php while($result=$select->fetch()):?> 
										<option selected="<? echo $category ?>">
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
								<b>Company :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="company" value="<?php echo $company; ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Modal :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="modal" value="<?php echo $modal; ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Price :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="number" name="price"  value="<?php echo $price; ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Shiping Cost :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="number" name="shiping_cost" value="<?php echo $shiping_cost; ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Update Image :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="file" name="file">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Is Avilabel :</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="is_avilabel">
									<option value="0" selected="<?php echo $is_avilabel; ?>">
										No
									</option>
									<option value="1" selected="<?php echo $is_avilabel; ?>">
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
							<input type="submit" name="submit" value="Update" class="btn btn-primary">
							<input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>