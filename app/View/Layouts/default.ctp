<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	01st Sep 2013
 * @Last Update		:	09th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council. (http://www.barc.gov.bd)
 **/
 ?> 
<!DOCTYPE html>
<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths desktop windows windows7 chrome chrome29 webkit java acrobat flash">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php $settingInfo = $this->Session->read("SETTING_INFO"); ?>
		<title><?php if(!empty($settingInfo["title"])) echo $settingInfo["title"]; else echo "BARC"; ?></title>
		<?php echo $this->Html->css(array("admin/style"));?>
	    <?php echo $this->Html->script(array("admin/jquery-1.9.1.min","admin/jquery-migrate-1.1.1.min"));?>
	    <link rel="shortcut icon" href="<?php echo $this->webroot; ?>favicon.ico" />
		<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo $this->webroot."admin/excanvas.min.js"?>"></script><![endif]-->
		<!--<SCRIPT TYPE="text/javascript"> 
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
		</SCRIPT> -->
	</head>
	<body class="loginbody">
		<div class="loginwrapper">
			<?php echo $this->fetch("content"); ?>
			<div class="clearfix"></div>
		</div><!--mainwrapper-->
	</body>
</html>