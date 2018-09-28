<?php
    /**
    *@Database Connection
    *
    */
    require 'db/conection.php';
    
    /**
    *@Geting data frome cart table
    *
    */
    $shipping_cost = 0;
    $total = 0;
    $cart_data = $ser->prepare("SELECT * FROM cart");
    $cart_data->execute();
    $row = $cart_data->rowCount();
        
    
    /*
    *@validations then send data to checkouts
    *
    */
    $fname_err = '';
    $lname_err = '';
    $phone_err = '';
    $mail_err = '';
    $address_err = '';
    $post_err = '';
    $city_err = '';
    $f;
    if(isset($_POST['submit'])){
        if(empty($_POST['fname'])){
            $fname_err='This field is required.';
            $f=1;
        }
        if(!preg_match('/^[a-zA-Z]*$/', $_POST['fname'])){
            $fname_err='Only latters and white space alowed.';
            $f=1;
        }
        if(!preg_match('/^[a-zA-Z]*$/', $_POST['lname'])){
            $fname_err='Only latters and white space alowed.';
            $f=1;
        }
        if(empty($_POST['phone'])){
            $phone_err='This field is required.';
            $f=1;
        }
        if(!preg_match('/^[0-9]*$/',$_POST['phone'])){
            $phone_err='Only numbers are required.';
            $f=1;
        }
        if(strlen($_POST['phone']) !=10 ){
            $phone_err='Enter a valid phone number.';
            $f=1;
        }
        if(empty($_POST['email'])){
            $mail_err='This field is required.';
            $f=1;
        }
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $mail_err='Enter a valid E-mail.';
            $f=1;
        }
        if(empty($_POST['address'])){
            $address_err='This field is required.';
            $f=1;
        }
        if(empty($_POST['post_code'])){
            $post_err='This field is required.';
            $f=1;
        }
        if(!preg_match('/^[0-9]*$/',$_POST['post_code'])){
            $post_err='Only numbers are required.';
            $f=1;
        }
        if(empty($_POST['city'])){
            $city_err='This field is required.';
            $f=1;
        }
        if(!preg_match('/^[a-zA-Z]*$/', $_POST['city'])){
            $city_err='Only latters and white space alowed.';
            $f=1;
        }
        if($f!=1){
            while($data = $cart_data->fetch()){
                //$shipping_cost = ($shipping_cost + $data['shipping']) * $data['quantity'];
                //$total = $total + $data['total'];
                $rt= $ser->prepare("INSERT INTO checkout(first_name,last_name,phone,email,address,post_code,shipping_cost,total,product,price,quantity) VALUES(:first_name,:last_name,:phone,:email,:address,:post_code,:shipping_cost,:total,:product,:price,:quantity)" );
                $rt->bindParam('first_name', $_POST['fname']);
                $rt->bindParam('last_name', $_POST['lname']);
                $rt->bindParam('phone', $_POST['phone']);
                $rt->bindParam('email', $_POST['email']);
                $rt->bindParam('address', $_POST['address']);
                $rt->bindParam('post_code', $_POST['post_code']);
                $rt->bindParam('product', $data['product']);
                $rt->bindParam('price', $data['price']);
                $rt->bindParam('quantity', $data['quantity']);
                $rt->bindParam('shipping_cost', $data['shipping']);
                $rt->bindParam('total', $data['total']);
                $rt->execute();
                $s='ok';
            }
            header('Location:bill.php');
        }
    }
    $title="CHECKOUT | Online Shopping";
    include 'partials/header.php';
    include 'partials/navbar.php';
?>

<div class="shadow">

	<!--breadcrums start-->

    <div class="bredcrumbs">
        <div>
            <div class="container">
                <div>
                    <h3>Checkout</h3>
                </div>
            </div>
            <div class="border-out">
                <div class="border-in">
                    <div class="container">
                        <div class="crurrent-page">
                            <a href="index.php">HOME</a> / <a href="cart.php">CART</a> / <b> CHECKOUT </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--breadcrums end-->

    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 padding">
            <div class="col-md-8 col-sm-8 col-xs-12 padding-left">

                <h3 class="contact-head">Billing Address</h3>

                <!--checkout form-->

                <form class="contact-form" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-right">
                            <input type="text" placeholder="First Name" name="fname">
                            <span class='error'><b><?php echo $fname_err ?></b></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-left">
                            <input type="text" placeholder="Last Name" name="lname">
                            <span class='error'><b><?php echo $lname_err ?></b></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left tow-text">
                        <input type="text" placeholder="Address" name="address">
                        <span class='error'><b><?php echo $address_err ?></b></span>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-right">
                            <input type="text" placeholder="Town/city" name="city">
                            <span class='error'><b><?php echo $city_err ?></b></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-left">
                            <input type="text" placeholder="Post Code" name="post_code">
                            <span class='error'><b><?php echo $post_err ?></b></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left tow-text">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-right">
                            <input type="text" placeholder="Contact No." name="phone">
                            <span class='error'><b><?php echo $phone_err ?></b></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-left">
                            <input type="text" placeholder="E-mail" name="email">
                            <span class='error'><b><?php echo $mail_err ?></b></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left">
                        <input type="submit" value="NEXT" class="btn-sb pull-right" name="submit">
                    </div>
                </form>

                <!--checkout form end-->

            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                
                

            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php';?>  