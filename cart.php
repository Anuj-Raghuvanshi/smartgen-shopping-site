<?php
    /**
    *
    *@Database connection
    */
    require 'db/conection.php';
    $cart = $ser->prepare("SELECT * FROM cart");
    $cart->execute();

    $cart_total = $ser->prepare("SELECT total FROM cart");
    $cart_total->execute();
    $row = $cart_total->rowCount();
    $sum = 0;
    /**
    *
    *@Update cart
    */
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $t = $_POST['quantity']*$_POST['price'];
        $rt= $ser->prepare("UPDATE cart SET quantity=:quantity,total=:total WHERE id=$id" );
        $rt->bindParam('quantity', $_POST['quantity']);
        $rt->bindParam('total', $t);
        $rt->execute();
        header('Location:cart.php');
    }
    
    /**
    *
    *@Database connection
    */
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == "remove")
    {
        $id=$_REQUEST['id'];
        $delete = $ser->prepare("DELETE FROM cart WHERE id=$id");
        $delete->execute();
        header("Location:cart.php");
    }
   
    
    $title="CART | Online Shopping";
    include 'partials/header.php';
    include 'partials/navbar.php';
?>
<div class="shadow">
    <!--breadcrums start-->
    <div class="bredcrumbs">
        <div>
            <div class="container">
                <div>
                    <h3>Cart</h3>
                </div>
            </div>
            <div class="border-out">
                <div class="border-in">
                    <div class="container">
                        <div class="crurrent-page">
                            <a href="index.php">HOME</a> / <b> CART </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrums ends-->
    <div class="container">
        <div class="product-holder col-md-12 col-sm-12 col-xs-12 padding">
        	<div class="holder-heading col-md-12 col-sm-12 col-xs-12">
        		<div class="col-md-2 col-sm-2 text-center">
        			<b>Image</b>
        		</div>
        		<div class="col-md-2 col-sm-2 text-center">
        			<b>product</b>
        		</div>
        		<div class="col-md-2 col-sm-2 text-center">
        			<b>Price</b>
        		</div>
        		<div class="col-md-2 col-sm-2 text-center">
        			<b>Quantity</b>
        		</div>
                <div class="col-md-2 col-sm-2 text-center">
                    <b>Shipping</b>
                </div>
        		<div class="col-md-2 col-sm-2 text-center">
        			<b>Total</b>
        		</div>
        	</div>
            <?php while($pro=$cart->fetch()): ?>
        	<div class="added-products col-md-12 col-sm-12 col-xs-12">
        		<div class="col-md-2 col-sm-2 text-center">
                    <?php $img=str_replace('../','',$pro['img']);?>
        			<img src="<?php echo $img ?>" class="img-t">
        		</div>
        		<div class="col-md-2 col-sm-2 text-center">
        			<span><?php echo $pro['product'] ?></span>
                    <a href="?action=remove&id=<?php echo $pro['id'] ?>">Remove</a>
        		</div>
        		<div class="col-md-2 col-sm-2 text-center">
        			<span><?php echo $pro['price'] ?></span>
        		</div>
        		<div class="col-md-2 col-sm-2 text-center">
                    <?php
                        $total = $pro['quantity']*($pro['shipping']+$pro['price']);
                    ?>
                    <form method="post" class="count">
                        <input type="hidden" value="<?php echo $pro['id']?>" name="id">
                        <input type="number" value="<?php echo $pro['quantity']?>" name="quantity">
                        <br>
                        <input type="hidden" value="<?php echo $pro['shipping']+$pro['price']?>" name="price">
                        <input type="submit" name="submit" class="btn btn-default btn-xs" value="Update">
                    </form>
        		</div>
                <div class="col-md-2 col-sm-2 text-center">
                    <b><?php $ship = $pro['shipping']*$pro['quantity'];
                            echo $ship;?>
                    </b>
                </div>
        		<div class="col-md-2 col-sm-2 text-center">
        			<span class="total"><b>
                        <?php echo $total?>
                    </b></span>
        		</div>
        	</div>
            <?php endwhile; ?>
        	<div class="col-md-12 col-sm-12 cart-total">
        		<div class="col-md-12 col-sm-12 padding">
    				<div class="col-md-11 col-sm-11 padding total-all">
    					<b>Total:</b>
    				</div>
        			<div class="col-md-1 col-sm-1 padding total-amount">
                        <?php while($t=$cart_total->fetch()){
                                $sum=$sum+$t['total'];
                            }
                         ?>
        				<span><?php echo $sum ?></span>
    				</div>
        		</div>
                <div class="col-md-12 col-sm-12 ">
                    <div class="pull-right">
                    <a href="checkout.php" class="btn btn-primary">Proceed To Checkout</a>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php';?>  