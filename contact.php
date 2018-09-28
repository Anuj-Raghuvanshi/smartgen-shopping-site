<?php
    /**
    *@Database Connection
    *
    */
    require 'db/conection.php';
    /**
    *@Geting data frome contact table
    *
    */
    $query = $ser->prepare("SELECT * FROM contact");
    $query->execute();
    /**
    *@validations
    *
    */
    $fname_err = '';
    $lname_err = '';
    $phone_err = '';
    $mail_err = '';
    $massage_err = '';
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
        if(empty($_POST['massage'])){
            $massage_err='This field is required.';
            $f=1;
        }
    }
    $title="ABOUT | Online Shopping";
    include 'partials/header.php';
    include 'partials/navbar.php';
?>

<div class="shadow">
    <div class="bredcrumbs">
        <div>
            <div class="container">
                <div>
                    <h3>Contact</h3>
                </div>
            </div>
            <div class="border-out">
                <div class="border-in">
                    <div class="container">
                        <div class="crurrent-page">
                            <a href="index.php">HOME</a> / <b> CONTACT </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 padding">
            <div class="col-md-8 col-sm-8 col-xs-12 padding-left">
                <h3 class="contact-head">Online Apointment Form</h3>
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
                        <textarea placeholder="Message" name="massage"></textarea>
                        <span class='error'><b><?php echo $massage_err ?></b></span>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left tow-text">
                        <input type="submit" value="SEND" class="btn-sb pull-right" name="submit">
                    </div>
                </form>
            </div>
            <?php while($result=$query->fetch()):?> 
            <div class="col-md-4 col-sm-4 col-xs-12">
                <h3 class="contact-head">Contact Us</h3>
                <div class="contact-address address">
                    <p class="addr">
                        <i class="fa fa-fw fa-map-marker fa-lg"></i>
                        <span><?php echo $result['address']; ?><span>
                    </p>
                </div>
                <div class="contact-address">
                    <p>
                        <i class="fa fa-fw fa-phone fa-lg"></i>
                        Phone : <span><?php echo $result['phone']; ?></span>
                    </p>
                </div>
                <div class="contact-address">
                    <p>
                        <i class="fa fa-fw fa-envelop fa-lg"></i>
                        Email : <span><a href="#"><?php echo $result['email']; ?></a></span>
                    </p>
                </div>
            </div>
            <?php endwhile;?> 
        </div>
    </div>
</div>

<?php include 'partials/footer.php';?>  