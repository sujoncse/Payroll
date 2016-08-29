<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>BARC</title>
		<style>
		html, body, div, span, applet, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		a, abbr, acronym, address, big, cite, code,
		del, dfn, em, font, img, ins, kbd, q, s, samp,
		small, strike, strong, sub, sup, tt, var,
		b, u, i, center, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td {
			background: transparent;
			border: 0;
			margin: 0;
			padding: 0;
			vertical-align: baseline;
		}
		body { 
				background: #ffffff; 
				font-family: 'HelveticaNeue', Arial, Helvetica, sans-serif; 
				font-size: 12px; 
				line-height: 13px; 
				color: #000000; 
		}
		img {
			display: block;
			max-width: 95%;
		  	margin-left: 15%;
			margin-right: 15%;
		  	vertical-align: middle;
		  	border: 0;
		}
		.img {
			display: block;
			max-width: 95%;
		  	margin-left: 25%;
			margin-right: 25%;
		  	vertical-align: middle;
		  	border: 0;
		}
		h1,h2,h3,h4 { color: #000; font-weight: normal; }
		h1 { font-size: 15px; line-height: 20px; }
		h2 { font-size: 14px; line-height: 15px; }
		h3 { font-size: 13px; line-height: 12px; }
		h4 { font-size: 12px; line-height: 11px; }
		.maincontent { position: relative; padding: 1px; }
		.contentinner { padding: 1px; float: left; width: 100%; }
		.container {
		  	margin-right: auto;
		  	margin-left: auto;
		  	*zoom: 1;
		}
		.row-fluid { width: 100%; *zoom: 1; }
		.row-fluid .span12 {
		  	width: 100%;
		  	*width: 99.94680851063829%;
		}
		
		.row-fluid .span11 {
		  	width: 91.48936170212765%;
		  	*width: 91.43617021276594%;
		}
		
		.row-fluid .span10 {
		  	width: 82.97872340425532%;
		  	*width: 82.92553191489361%;
		}
		
		.row-fluid .span9 {
		  	width: 74.46808510638297%;
		  	*width: 74.41489361702126%;
		}
		
		.row-fluid .span8 {
		  	width: 65.95744680851064%;
		  	*width: 65.90425531914893%;
		}
		
		.row-fluid .span7 {
		  	width: 57.44680851063829%;
		  	*width: 57.39361702127659%;
		}
		
		.row-fluid .span6 {
		  	width: 48.93617021276595%;
		  	*width: 48.88297872340425%;
		}
		
		.row-fluid .span5 {
		  	width: 40.42553191489362%;
		  	*width: 40.37234042553192%;
		}
		
		.row-fluid .span4 {
		  	width: 31.914893617021278%;
		  	*width: 31.861702127659576%;
		}
		
		.row-fluid .span3 {
		  	width: 23.404255319148934%;
		  	*width: 23.351063829787233%;
		}
		
		.row-fluid .span2 {
		  	width: 14.893617021276595%;
		  	*width: 14.840425531914894%;
		}
		
		.row-fluid .span1 {
		  	width: 6.382978723404255%;
		  	*width: 6.329787234042553%;
		}

		h1,h2,h3,h4,h5,h6 { margin: 1px 0; font-family: inherit; font-weight: bold; line-height: 12px; color: inherit; text-rendering: optimizelegibility; }
		.width1 { width: 1%; }
		.width2 { width: 2%; }
		.width4 { width: 4%; }
		.width5 { width: 5%; }
		.width10 { width: 10%; }
		.width15 { width: 15%; }
		.width20 { width: 20%; }
		.width25 { width: 25%; }
		.width30 { width: 30%; }
		.width35 { width: 35%; }
		.width40 { width: 40%; }
		.width45 { width: 45%; }
		.width50 { width: 50%; }
		.width55 { width: 55%; }
		.width60 { width: 60%; }
		.width63 { width: 63%; }
		.width70 { width: 70%; }
		.width80 { width: 80%; }
		
		.span12 { width: 98%; }
		.span11 { width: 90%; }
		.span10 { width: 80%; }
		.span9 { width: 70%; }
		.span8 { width: 60%; }
		.span7 { width: 50%; }
		.span6 { width: 40%; }
		.span5 { width: 35%; }
		.span4 { width: 30%; }
		.span3 { width: 20%; }
		.span2 { width: 15%; }
		.span1 { width: 5%; }
		
		.img-polaroid {
		  	padding: 1px;
		  	background-color: #ffffff;
		}
		.table {
		  	width: 100%;
		 	 margin: 1px;
		}
		.table .table { background-color: #ffffff; }
		.table th,.table td {
		  	padding: 1px;
		  	line-height: 12px;
		  	text-align: left;
		  	vertical-align: top;
		  	border: 1px #000000;
		}
		.table th { font-weight: bold; }
		.table thead th { vertical-align: middle; text-align:center; }
		th { background: #fcfcfc;}
		thead { border-bottom: 1px solid #000000;}
		.table tfoot tr { border-bottom: 1px solid #000000; }
		.table-bordered {
		  	border: 1px solid #000000;
		  	-webkit-border-radius: 4px;
		    -moz-border-radius: 4px;
		    border-radius: 4px;
		}
		
		.table-bordered th,.table-bordered td { border-left: 1px #000000; }
		
		.table-invoice-full { border-color: #000000; }
		.table-invoice-full tr td { border-color: #000000; border: 1px #000000; }
		.table-invoice-full tr td { background: #ffffff; }
		.table-invoice-full th.right, .table-invoice-full td.right { text-align: right; }
		
		.msg-invoice { padding: 0 !important; }
		.msg-invoice h4 { font-size: 12px; text-transform: uppercase; font-weight: bold; }
		.msg-invoice p { font-size: 12px; line-height: 13px; }
		.amountdue { text-align: center; margin-left:70%}
		.amountdue h4 { 
			text-align: center; line-height: normal; border: 1px solid #000000; background: #ffffff; 
			display: inline-block; padding: 10px 10px; width: 175px;
		}
		.amountdue h4 span { display: block; font-size: 12px; text-transform: uppercase; color: #000000; }
		.footer { position: absolute; bottom: 0; left: 0; font-size: 5px; background: #ffffff; color: #000000; width: 100%; }
		.footer a { color: #f7f7f7; }
		.footer .footerleft { width: 230px; float: left; background: #ffffff; }
		.footer .footerright { margin-left: 260px; text-align: right; }
				
		</style>
	</head>
	<body>
        <h1>This is page</h1>
		<?php //echo $this->fetch("content"); ?>
	</body>
</html>