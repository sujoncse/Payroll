<!DOCTYPE html>
	<head>
		<?php $settingInfo = $_SESSION["SETTING_INFO"]; ?>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php if(!empty($settingInfo["title"])) echo $settingInfo["title"]; else echo "BARC"; ?></title>
		<?php echo $this->Html->css(array("admin/prettify","admin/style"));?>
		<?php echo $this->Html->script(array("admin/prettify","admin/jquery-1.9.1.min","admin/jquery-migrate-1.1.1.min","admin/jquery-ui-1.9.2.min","admin/jquery.flot.min","admin/jquery.flot.resize.min","admin/bootstrap.min","admin/modernizr.min","admin/detectizr.min","admin/jquery.cookie","admin/custom","admin/bootstrap-datepicker")); ?>
		<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo $this->webroot;?>js/admin/excanvas.min.js"></script><![endif]-->
	</head>

	<body>
		<div class="mainwrapper">
			<?php echo $this->element("admin_left"); ?>
		    <!-- START OF RIGHT PANEL -->
		    <div class="rightpanel">
		    	<?php echo $this->element("admin_header"); ?>
		        <div class="maincontent">
		        	<div class="contentinner animate5 fadeInUp">
		            	<?php echo $this->fetch("content"); ?>
		            </div><!--contentinner-->
		        </div><!--maincontent-->
		        
		    </div><!--mainright-->
		    <!-- END OF RIGHT PANEL -->
		    <div class="clearfix"></div>
		    <?php echo $this->element("admin_footer"); ?>
		</div><!--mainwrapper-->
	</body>
</html>