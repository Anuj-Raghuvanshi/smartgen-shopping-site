<?php
    /**
    *@Database Connection
    *
    */
    require 'db/conection.php';
    $fname_err = '';
    $lname_err = '';
    $uresname = '';
    $pass_err ='';
    $con_err ='';
    $phone_err ='';
    $mail_err = '';
    $f=0;
    /**
    *@validations
    *
    */
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
            $lname_err='Only latters and white space alowed.';
            $f=1;
        }
        if(empty($_POST['password'])){
            $pass_err='This field is required.';
            $f=1;
        }
        if(empty($_POST['conferm'])){
            $con_err='This field is required.';
            $f=1;
        }
        if(empty($_POST['mail'])){
            $mail_err='This field is required.';
            $f=1;
        }
        if(!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
            $mail_err='Enter a valid E-mail.';
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
        if($f!=1){
            /**
            *@Insertion Query
            *
            */
            $role = 'user';
            $rt= $ser->prepare("INSERT INTO users(fname,lname,password,email,phone,role) VALUES(:fname,:lname,:password,:email,:phone,:role)" );
            $rt->bindParam('fname', $_POST['fname']);
            $rt->bindParam('lname', $_POST['lname']);
            $rt->bindParam('password', $_POST['password']);
            $rt->bindParam('email', $_POST['mail']);
            $rt->bindParam('phone', $_POST['phone']);
            $rt->bindParam('role', $role);
            $rt->execute();
        }
    }
    $title="SIGNUP | Online Shopping";
    include 'partials/header.php';
    include 'partials/navbar.php';
?>

<div class="shadow">
    <div class="bredcrumbs">
        <div>
            <div class="container">
                <div>
                    <h3>Signup</h3>
                </div>
            </div>
            <div class="border-out">
                <div class="border-in">
                    <div class="container">
                        <div class="crurrent-page">
                            <a href="index.php">HOME</a> / <b> SIGN UP </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="form-heading">
            <h3>Signup Form</h3>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 padding signup">
            <div class="complaint ">
                <!--estimation form-->
                <form class="contact-form " method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-right">
                            <input type="text" placeholder="First Name" name="fname">
                            <span class='error'><b><?php echo $fname_err ?></b></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-left">
                            <input type="text" placeholder="Last name" name="lname">
                            <span class='error'><b><?php echo $lname_err ?></b></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left tow-text">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-right">
                            <input type="password" placeholder="Password" name="password">
                            <span class='error'><b><?php echo $pass_err ?></b></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding in-left">
                            <input type="password" placeholder="Conferm Password" name="conferm">
                            <span class='error'><b><?php echo $con_err ?></b></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left">
                        <div class="col-md-12 col-sm-12 col-xs-12 padding">
                            <input type="text" placeholder="E-mail" name="mail">
                            <span class='error'><b><?php echo $mail_err ?></b></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left tow-text">
                        <div class="col-md-12 col-sm-12 col-xs-12 padding">
                            <input type="text" placeholder="Phone" name="phone">
                            <span class='error'><b><?php echo $phone_err ?></b></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-left">
                        <input type="submit" value="Signup" class="btn-sb pull-right" name="submit">
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<?php include 'partials/footer.php';?>  