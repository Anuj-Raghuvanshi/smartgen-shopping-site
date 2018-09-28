<?php
    require 'db/conection.php';

    /**
    *
    *@Fetching categorys
    */
    $query = $ser->prepare("SELECT * FROM category WHERE is_active=1");
    $query->execute();

    // printf($query);

    /**
    *
    *@Fetching products
    */
    if(isset($_GET['category'])){
      $category=$_GET['category'];

      /*Pegination*/
      if(isset($_GET['page'])){
        $page=$_GET['page'];
      }
      if(!isset($_GET['page'])){
        $page='';
      }
      if($page==''|| $page=='1'){
        $page1=0;
      }else{
        $page1=($page*6)-6;
      }
      /*Data with Pegination*/
      $product = $ser->prepare("SELECT * FROM Products WHERE category='$category' ORDER BY id DESC limit $page1,6");
      $product->execute();
      $count=$product->rowCount();
    }
    if(!isset($_GET['category'])){
      
      
    //   /*Pegination*/
      if(isset($_GET['page'])){
        $page=$_GET['page'];
      }
      if(!isset($_GET['page'])){
        $page='';
      }
      if($page==''|| $page=='1'){
        $page1=0;
      }else{
      $page1=($page*6)-6;
      }

      /*Data with Pegination*/
      $product = $ser->prepare("SELECT * FROM   Products ORDER BY id DESC limit $page1,6");
      $product->execute();
    }
    
    /**
    *
    *@Add to cart
    */
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'add'){
        $id=$_REQUEST['id'];
        $product = $ser->prepare("SELECT * FROM  Products WHERE id=$id");
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
    $title="PRODUCT | Online Shopping";

    /**
    *
    *@Including files
    */
    include 'partials/header.php';
    include 'partials/navbar.php';
?>
<div class="shadow">

    <!--Breadcrums-->

    <div class="bredcrumbs">
      <div>
        <div class="container">
          <div>
            <h3>Products</h3>
          </div>
        </div>
        <div class="border-out">
          <div class="border-in">
            <div class="container">
              <div class="crurrent-page">
                <a href="index.php">HOME</a> / <b> PRODUCTS </b>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Breadcrums ends-->

    <div class="container">
       <div class="row padding">
       		<div class="col-md-2 col-sm-2 col-xs-12 padding-left">
            
            <!--fetching categorys from data base-->
       			
            <ul class="categories">
       				<li class=""><h5>Category</h5></li>
              <?php while($result=$query->fetch()): ?>
                <li>
                  <a href="?category=<?php echo $result['name'] ?>"><i class="fa fa-fw fa-arrow-right"></i><?php echo $result['name'] ?></a>
                </li>
              <?php endwhile; ?>
       			</ul>

            <!--fetching end-->
       		
          </div>

          <!--fetching products from data base-->

       		<div class="col-md-10 col-sm-10 col-xs-12">
            <?php while($pro=$product->fetch()): ?>
            <div class="product-view">
              <a href="detail.php?action=view&id=<?php echo $pro['id']; ?>">
                <div class="img-pro">
                  <?php $img=str_replace('../','',$pro['img']);?>
                  <img src="<?php echo $img ?>" class="img-responsive">
                </div>
              </a>
              <div class="info">
                <p>
                  <b><?php echo $pro['company']; ?> </b>
                  <b>( <?php echo $pro['modal']; ?> )</b>
                </p>
                <p>
                  <b>Rs. </b>
                  <b class="price"><?php echo $pro['price']; ?></b>
                </p>
              </div>
              <div class="pro-action">
                <a href="?category=<?php echo $pro['category']?>&action=add&id=<?php echo $pro['id']; ?>" class="pull-left">
                  <i class="fa fa-fw fa-shopping-cart"></i><span class="options"> Add to cart</span>
                </a>
                <a href="detail.php?action=view&id=<?php echo $pro['id']; ?>" class="pull-right">
                  <i class="fa fa-fw  fa-eye"></i><span class="options"> View Details</span>
                </a>
              </div>
            </div>
            <?php endwhile; ?>
            <div class="clear"></div>
            <!--pagination-->
            <div class="pagination">
              <div class="paginate">
              <?php

                if(isset($_GET['category'])){
                  $c=$_GET['category'];
                  $temp = $ser->prepare("SELECT * FROM product WHERE category='$category'");
                  $temp->execute();
                  $count=$temp->rowCount();
                  $n=ceil($count/6);
                  for($i=1;$i<=$n;$i++){
                  echo "<a href='?category=$c&page=$i'>". $i ."</a>";
                  }
                }else{
                  $temp = $ser->prepare("SELECT * FROM product");
                  $temp->execute();
                  $count=$temp->rowCount();
                  $n=$count/6;
                  for($i=1;$i<=$n;$i++){
                  echo "<a href='?page=$i'>". $i ."</a>";
                  }
               }
              ?>
              </div>
            </div>
          </div>
          <!--fetching compet-->
       </div>
    </div>
</div>
<?php include 'partials/footer.php';?>  