<?php if(!empty($_SESSION["ADMIN_INFO"])) $adminInfo = $_SESSION["ADMIN_INFO"]; ?>
<!-- START OF LEFT PANEL -->
<div class="leftpanel" style="margin-left: 0px;">
	
	<div class="logopanel animate0 fadeInUp">
		<h1><a href="<?php echo $this->webroot."admins";?>"><img src="<?php echo $this->webroot."img/logo_t.png"?>"/></a></h1>
	</div><!--logopanel-->
	
	<div class="datewidget animate1 fadeInUp">Today is <?php echo date("j'S F Y, H:i:s");?></div>

	<div class="searchwidget animate2 fadeInUp">
		<form action="#" method="post">
			<div class="input-append">
				<input type="text" class="span2 search-query" placeholder="Search here...">
				<button type="submit" class="btn"><span class="icon-search"></span></button>
			</div>
		</form>
	</div><!--searchwidget-->
	<!--
	<div class="plainwidget animate3 fadeInUp">
		<small>Using 16.8 GB of your 51.7 GB </small>
		<div class="progress progress-info">
			<div class="bar" style="width: 20%"></div>
		</div>
		<small><strong>38% full</strong></small>
	</div><!--plainwidget-->
	
	<?php if(!empty($adminInfo) AND $adminInfo["id"] == 1) echo $this->element("admin_left_menu"); ?>
	
</div><!--mainleft-->
<!-- END OF LEFT PANEL -->