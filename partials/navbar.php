<?php require 'db/conection.php' ?>
<!--header start-->
<header>
	
	<div class="container">
		<div class="navbar navbar-main">
		<!--collapse menu-->
			<div class="navbar-header ">
				<button type="button" class="navbar-toggle togel" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand logo smart" ><span class="smart-1">Smart</span> Generation</a>
			</div>
			<div class="navbar-collapse bs-navbar-collapse collapse padding-right">
				<ul class="nav navbar-nav navbar-right menu-style">
					<?php 
						$m = $ser->prepare("SELECT * FROM menu WHERE is_active=1");
						$m->execute();
						while ($menu = $m->fetch()):
							$p_id = $menu['page_id'];
							$p = $ser->prepare("SELECT page_path FROM page WHERE id=$p_id");
							$p->execute();
							while ($page = $p->fetch()){
								$ph = $page['page_path'];
							}
					?>
						<li><a href="<?php echo $ph ?>"><?php echo $menu['name'] ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</header>
<!--header ends here-->