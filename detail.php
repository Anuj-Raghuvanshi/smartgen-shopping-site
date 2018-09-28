<?php
    /**
    *
    *@Data base conection
    */
    require 'db/conection.php';

    /**
    *
    *@Data for slider
    */
    $more_product = $ser->prepare("SELECT * FROM Products");
    $more_product->execute();

    /**
    *
    *@Details view
    */
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'view'){
        $id=$_REQUEST['id'];
        $product = $ser->prepare("SELECT * FROM Products WHERE id=$id");
        $product->execute();
    }
    /**
    *
    *@Add to cart
    */
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'add'){
        $id=$_REQUEST['id'];
        $product = $ser->prepare("SELECT * FROM Products WHERE id=$id");
        $product->execute();
        while($result=$product->fetch()){
            $id = $result['id'];
            $name = $result['company'].' '.$result['modal'];
            $price = $result['price'];
            $shiping_cost = $result['shiping_cost'];
            $image = $result['img'];
            $quantity = 1;
        }
        $total= $quantity*($price+$shiping_cost);
        $add = $ser->prepare("INSERT INTO cart(product,price,shipping,quantity,img,total) VALUES(:product,:price,:shipping,:quantity,:img,:total)");
        $add->bindParam('product', $name);
        $add->bindParam('price', $price);
        $add->bindParam('shipping', $shiping_cost);
        $add->bindParam('quantity',$quantity);
        $add->bindParam('img', $image);
        $add->bindParam('total', $total);
        $add->execute();
        header('Location:cart.php');
    }
    $title="PRODUCTS | Online Shopping";
    include 'partials/header.php';
    include 'partials/navbar.php';
?>
<div class="shadow">
    <!--breadcrums start-->
    <div class="bredcrumbs">
        <div>
            <div class="container">
                <div>
                    <h3>Product Details</h3>
                </div>
            </div>
            <div class="border-out">
                <div class="border-in">
                    <div class="container">
                        <div class="crurrent-page">
                            <a href="index.php">HOME</a> / <b> PRODUCT DETAILS </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrums ends-->
    <div class="container">

        <div>
            <!--fetching data from database-->
            <?php while($pro=$product->fetch()): ?>
            <div class="detail">
                <div class="col-md-6 col-sm-6 col-xs-12 padding-left">
                    <?php $img=str_replace('../','',$pro['img']);?>
                    <div class="megnify">
                        <img src="<?php echo $img; ?>" id="img_01" width="auto" height="auto">
                    </div>
                    
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <b>Product</b>
                            <b class="pull-right">:</b>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $pro['company'].' '.$pro['modal']; ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <b>Price</b>
                            <b class="pull-right">:</b>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $pro['price']; ?>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <b>Shiping Price</b>
                            <b class="pull-right">:</b>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $pro['shiping_cost']; ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <b>Total</b>
                            <b class="pull-right">:</b>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $pro['price']+$pro['shiping_cost']; ?>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php 
                            $temp = '<span class="sold">Sold Out</span>';
                            if($pro['is_avilabel'] == '1'){
                                $temp = '<span class="stock">Available</span>';
                            }
                            echo $temp;
                        ?>
                    </div>                
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="?action=add&id=<?php echo $pro['id']; ?>" class="btn btn-primary btn-block">Buy now</a>
                    </div> 
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="clear"></div>
        <!--slick slider start-->
        <div class="panel panel-default slider">
            <div class="panel-heading">
                <h4>More Products</h4>
            </div>
            <div class='slider'>
                <ul class="slick_slider">

                    <!--fetching data from database-->
                    <?php while($more=$more_product->fetch()): ?>
                    <li>
                        <div class="product-view-1">
                            <a href="detail.php?action=view&id=<?php echo $more['id']; ?>">
                                <div class="img-pro">
                                 <?php $img=str_replace('../','',$more['img']);?>
                                 <img src="<?php echo $img ?>" class="img-responsive">
                                </div>
                            </a>
                            <div class="info">
                                <p>
                                    <b><?php echo $more['company'].' ('.$more['modal'].' )'; ?></b>
                                </p>
                                <p>
                                    <b>Rs. </b>
                                    <b class="price"><?php echo $more['price']; ?></b>
                                </p>
                            </div>
                            <div class="pro-action">
                                <a href="cart.php?action=add&id=<?php echo $more['id']; ?>" class="pull-left">
                                    <i class="fa fa-fw fa-shopping-cart"></i><span class="options"> Add to cart</span>
                                </a>
                                <a href="detail.php?action=view&id=<?php echo $more['id']; ?>" class="pull-right">
                                    <i class="fa fa-fw  fa-eye"></i><span class="options"> View Details</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>

                </ul>
            </div>
        </div>
        <!--slick slider end-->

    </div>
</div>
<?php include 'partials/footer.php';?>  