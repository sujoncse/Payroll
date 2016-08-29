<?php
/**
 * @ Developed By   :  Mahmud IT Limited
 * @ Developed Date :  1st February, 2013
 * @ Copyright      :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @ Link           :  http://mahmudit.com
 * @ Since          :  July 2012
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
        <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
        <title><?php echo $_SESSION["SETTING_INFO"]["site_title"];?></title>
		<meta name="description" content="BARC">
        <meta name="keywords" content="BARC">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?php echo $this->webroot;?>favicon.ico" type="image/x-icon"/>
		<?php 
			echo $this->Html->css(array("bootstrap.min","font-awesome.min","animate.min","flexslider.min","fonts.min","style.min"));
			echo $this->Html->script(array('vendor/modernizr-2.6.1-respond-1.1.0.min','msg',"vendor/jquery-1.8.3.min"));
		?>  
		<link rel="stylesheet" href="<?php echo $this->webroot;?>css/prettyphoto.html">		
		<!--[if IE 8]>
            <link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->webroot;?>css/ie8.css" />    
        <![endif]--> 
        <SCRIPT TYPE="text/javascript"> 
			var message="Sorry, right-click is not allowed."; 
			function clickIE() {if (document.all) {(message);return false;}} 
			function clickNS(e) {
				if(document.layers||(document.getElementById&&!document.all)) { 
					if (e.which==2||e.which==3) {(message);return false;}}
				} 
				if (document.layers){document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 
				else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 
				document.oncontextmenu=new Function("return false") 
				function Disable_Control_C() {
					var keystroke = String.fromCharCode(event.keyCode).toLowerCase();
					if (event.ctrlKey && (keystroke == 'c' || keystroke == 'v' || keystroke == 's' || keystroke == 'a' || keystroke == 'C' || keystroke == 'V' || keystroke == 'S' || keystroke == 'A')) {
					alert("Sorry, not allowed.");
					event.returnValue = false; // disable Ctrl+C
					}
				}
				window.addEventListener("keyup",kPress,false);
				function kPress(e){ 
					var c=e.keyCode||e.charCode; 
					if (c==44) alert("Sorry, not allowed.");
				}
		</SCRIPT>  
    </head>
    <body onkeydown="javascript:Disable_Control_C()">
		<div id="wrapper" class="boxed"> <!-- Page Wrapper: Boxed class for boxed layout - Fullwidth class for fullwidth page --> 
            <?php echo $this->element("header"); ?>
			<div class="page">
				<!-- Page -->
				<?php //echo $this->element("breadscrumbs"); ?>
				<div class="main fullwidth">
					<section class="content">                        
        				<div class="container">
							<div class="row-fluid">
								<br/>
								<?php echo $this->fetch("content"); ?>		
							</div>
						</div>
					</section> 
				</div>		
				<?php echo $this->element("footer"); ?>
			</div> <!-- Close Page -->
		</div> <!-- Close wrapper -->
   		<!-- Load all Javascript Files -->
		<?php echo $this->Html->script(array("vendor/bootstrap.min","jquery.hoverdir","superfish","supersubs","jquery.tweet","jquery.flexslider","jquery.prettyPhoto","jquery.isotope.min","retina","custom"));?>
		  	
		<script type="text/javascript">
			var _gaq = _gaq || [];
		  	_gaq.push(['_setAccount', 'UA-17423158-8']);
		  	_gaq.push(['_setDomainName', 'mahmudit.com']);
		  	_gaq.push(['_setAllowLinker', true]);
		  	_gaq.push(['_trackPageview']);
		  	(function() {
		    	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    	ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		    	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  	})();
		</script>
    </body>
</html>