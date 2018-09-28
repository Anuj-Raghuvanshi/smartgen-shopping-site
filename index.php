<?php
	/**
	*
	*@Database connection
	*/
	// require 'db/conection.php';

	$title="HOME | Online Shopping";
	include 'partials/header.php';
	include 'partials/navbar.php';
?>
<!--slider start here-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!--slide dots-->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
		<!-- <li data-target="#carousel-example-generic" data-slide-to="3"></li> -->
	</ol>
	<!--slide items-->
	<div class="carousel-inner" role="listbox">
	    <div class="item active slider">
	    	<div class="slide-1">
	    		<div>Online Shopping</div>
	    		<div class="here-get">Here You Get Your Need.</div>
	    	</div>
	    </div>
	    <div class="item slider">
	    	<img src="img/slide1.jpg" alt="..." class="img-responsive image">
	    </div>
	   <!-- 	<div class="item slider">
	    	<img src="img/slide2.jpg" alt="..." class="img-responsive image">
	    </div>
    	<div class="item slider">
	    	<img src="img/el5.jpg" alt="..." class="img-responsive image">
	    </div> -->
	</div>
</div>
<!--slider ends here-->
<div class="col-md-12 feature">
	<div class="col-md-12 col-sm-12 col-xs-12 padding">
		<div class="col-md-12 col-sm-12 col-xs-12 headings">WELCOME</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<p>
				We M/s. Online Shopping have the pleasure of introducing ourselves as one of the leading Electronic shoper in and around Pondicherry & Tamilnadu.We are well known in the market for our reputation, dedication, creating bench mark by followings Standards and adapting latest technology.
			</p>
			<p>
				
			</p>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php include 'partials/footer.php';?>	
