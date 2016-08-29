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
				border: 1px;
				margin: 0;
				padding: 0;
				vertical-align: baseline;
			}
			body { background: #ffffff; font-family: 'HelveticaNeue', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 2px; color: #fff; }
			sub,sup {
			  position: relative;
			  font-size: 75%;
			  line-height: 0;
			}
			sup { top: -0.5em; }
			sub { bottom: -0.25em;} 
			h1,h2,h3,h4 { color: #000; font-weight: normal; }
			h1 { font-size: 28px; line-height: 38px; }
			h2 { font-size: 24px; line-height: 30px; }
			h3 { font-size: 18px; line-height: 28px; }
			h4 { font-size: 16px; line-height: 26px; }
			.mainwrapper { 
				width: 1280px; margin-top:5px; margin-bottom:5px; margin-right:10px; margin-left:10px; background: #ffffff repeat-y 0 0; position: relative; 
				overflow: hidden; -moz-box-shadow: 0 0 5px rgba(0,0,0,0); 
				-webkit-box-shadow: 0 0 5px rgba(0,0,0,0); box-shadow: 0 0 5px rgba(0,0,0,0); padding-bottom: 1px; 
			}
			.fullwrapper { width: 1280px; border: 0; }
			.pagetitle { padding: 9px 12px; border-bottom: 1px solid #bbb; }
			.pagetitle h1 { display: inline-block; font-size: 18px; vertical-align: middle; }
			.pagetitle span { display: inline-block; margin-left: 10px; font-size: 11px; font-style: italic; color: #999; }
			.maincontent { position: relative; padding-right: 1px; }
			.contentinner { padding: 1px; min-height: 1250px; float: left; width: 100%; }
			.contentinner p { margin: 1px 0; }
			.contentinner p:first-child { margin-top: 0; }
			.contnetinner p:last-child { margin-bottom: 0; }
			.invoice_logo { margin-top: 1px; margin-bottom: 1px; }
			.table-invoice, .table-invoice-full { border-color: #000; }
			.table-invoice tr td, .table-invoice-full tr td { border-color: #000; }
			.table-invoice tr td:first-child { background: #fff; font-weight: bold; }
			.table-invoice tr td:last-child { background: #fff; }
			.table-invoice-full tr td { background: #fff; }
			.table-invoice-full th.right, .table-invoice-full td.right { text-align: right; }
			.invoice-table { width: 100%; border: 1px; margin-top: 1px; }
			.invoice-table tr td { line-height: 3px; border: 1px; }
			.invoice-table td.right { text-align: right; }
			.footer { position: absolute; bottom: 0; left: 0; font-size: 11px; background: #333; color: #999; width: 100%; }
			.footer a { color: #bbb; }
			.footer .footerleft { padding: 10px 15px; width: 230px; float: left; background: #222; min-height: 20px; border-right: 1px solid #3c3c3c; }
			.footer .footerright { padding: 10px 15px; margin-left: 260px; text-align: right; }
			.table-bordered, pre, .btn, .sortlist > li div.label, .popover-title,
			.table-invoice tr td { 
				-moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0; 
			}
			.margin1020 { margin: 10px 20px; }
			.nomargin { margin: 0; }
			.marginleft20 { margin-left: 20px; }
			.marginleft15 { margin-left: 15px; }
			.marginleft10 { margin-left: 10px; }
			.marginleft5 { margin-left: 5px; }
			.width1 { width: 1%; }
			.width4 { width: 4%; }
			.width5 { width: 5%; }
			.width9 { width: 9%; }
			.width10 { width: 10%; }
			.width15 { width: 15%; }
			.width20 { width: 20%; }
			.width25 { width: 25%; }
			.width30 { width: 30%; }
			.width35 { width: 35%; }
			.width45 { width: 45%; }
			.width60 { width: 60%; }
			.width63 { width: 63%; }
			.width70 { width: 70%; }
			.zindex100 { z-index: 100; }
			.clearall { clear: both; }
			.aligncenter { text-align: center; }
			.one_half{ width:48.5%; }
			.one_third{ width:31.16%; }
			.two_third{ width:65.83%; }
			.one_fourth{ width:22.5%; }
			.three_fourth{ width:74.5%; }
			.one_fifth{ width:17.3%; }
			.two_fifth{ width:38.1%; }
			.three_fifth{ width:58.9%; }
			.four_fifth{ width:67.7%; }
			.one_sixth{ width:13.83%; }
			.five_sixth{ width:83.17%; }
			.one_half,.one_third,.two_third,.three_fourth,.one_fourth,.one_fifth,
			.two_fifth,.three_fifth,.four_fifth,.one_sixth,.five_sixth{ position:relative; margin-right:3%; float:left; }
			.last{ margin-right:0 !important; clear:right; }
			.clearfix { *zoom: 1; } 
			.clearfix:before,
			.clearfix:after {
				display: table;
			  	line-height: 0;
			  	content: "";
			}
			.clearfix:after { clear: both; }
			img {
				max-width: 100%;
			  	margin-left: 25%;
				margin-right: 25%;
			  	vertical-align: middle;
			  	border: 0;
			  	-ms-interpolation-mode: bicubic;
			}
			body {
			 	margin: 0;
			  	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			  	font-size: 14px;
			  	line-height: 20px;
			  	color: #333333;
			  	background-color: #ffffff;
			}
			.row { margin-left: -20px; *zoom: 1; }
			.row:before,
			.row:after {
			  	display: table;
			  	line-height: 0;
			  	content: "";
			}
			.row:after { clear: both; }
			[class*="span"] {
			  	float: left;
			  	min-height: 1px;
			  	margin-left: 20px;
			}
			.container { width: 940px; }
			.span12 { width: 940px; }
			.span11 { width: 860px; }
			.span10 { width: 780px; }
			.span9 { width: 700px; }
			.span8 { width: 620px; }
			.span7 { width: 540px; }
			.span6 { width: 460px; }
			.span5 { width: 380px; }
			.span4 { width: 300px; }
			.span3 { width: 220px; }
			.span2 { width: 140px; }
			.span1 { width: 60px; }
			.row-fluid { width: 100%; *zoom: 1; }
			.row-fluid:before,
			.row-fluid:after {
		  		display: table;
		  		line-height: 0;
		  		content: "";
			}
			.row-fluid:after { clear: both; }
			.row-fluid [class*="span"] {
			  	display: block;
			  	float: left;
			  	width: 100%;
			  	min-height: 30px;
			  	margin-left: 2.127659574468085%;
			  	*margin-left: 2.074468085106383%;
			  	-webkit-box-sizing: border-box;
			    -moz-box-sizing: border-box;
			    box-sizing: border-box;
			}
			.row-fluid [class*="span"]:first-child { margin-left: 0; }
			.row-fluid .controls-row [class*="span"] + [class*="span"] { margin-left: 2.127659574468085%; }
			.row-fluid .span12 { width: 100%; *width: 99.94680851063829%; }
			.row-fluid .span11 { width: 91.48936170212765%; *width: 91.43617021276594%; }
			.row-fluid .span10 { width: 82.97872340425532%; *width: 82.92553191489361%; }
			.row-fluid .span9 { width: 74.46808510638297%; *width: 74.41489361702126%; }
			.row-fluid .span8 { width: 65.95744680851064%; *width: 65.90425531914893%; }
			.row-fluid .span7 { width: 57.44680851063829%; *width: 57.39361702127659%; }
			.row-fluid .span6 { width: 48.93617021276595%; *width: 48.88297872340425%; }
			.row-fluid .span5 { width: 40.42553191489362%; *width: 40.37234042553192%; }
			.row-fluid .span4 { width: 31.914893617021278%; *width: 31.861702127659576%; }
			.row-fluid .span3 { width: 23.404255319148934%; *width: 23.351063829787233%; }
			.row-fluid .span2 { width: 14.893617021276595%; *width: 14.840425531914894%; }
			.row-fluid .span1 { width: 6.382978723404255%; *width: 6.329787234042553%; }
			[class*="span"].hide, .row-fluid [class*="span"].hide { display: none; }
			[class*="span"].pull-right, .row-fluid [class*="span"].pull-right { float: right; }
			.container {
		  		margin-right: auto;
		  		margin-left: auto;
		  		*zoom: 1;
			}
			.container:before,
			.container:after {
		  		display: table;
		  		line-height: 0;
		  		content: "";
			}
		.container:after {
		  clear: both;
		}
		
		.container-fluid {
		  padding-right: 10px;
		  padding-left: 10px;
		  *zoom: 1;
		}
		
		.container-fluid:before,
		.container-fluid:after {
		  display: table;
		  line-height: 0;
		  content: "";
		}
		
		.container-fluid:after {
		  clear: both;
		}
		
		p {
		  margin: 0 0 10px;
		}
		
		.lead {
		  margin-bottom: 20px;
		  font-size: 21px;
		  font-weight: 200;
		  line-height: 30px;
		}
		
		small {
		  font-size: 85%;
		}
		
		strong {
		  font-weight: bold;
		}
		
		em {
		  font-style: italic;
		}
		
		cite {
		  font-style: normal;
		}
		
		.text-left {
		  text-align: left;
		}
		
		.text-right {
		  text-align: right;
		}
		
		.text-center {
		  text-align: center;
		}
		
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
		  margin: 10px 0;
		  font-family: inherit;
		  font-weight: bold;
		  line-height: 20px;
		  color: inherit;
		  text-rendering: optimizelegibility;
		}
		
		h1 small,
		h2 small,
		h3 small,
		h4 small,
		h5 small,
		h6 small {
		  font-weight: normal;
		  line-height: 1;
		  color: #999999;
		}
		
		h1,
		h2,
		h3 {
		  line-height: 40px;
		}
		
		h1 {
		  font-size: 38.5px;
		}
		
		h2 {
		  font-size: 31.5px;
		}
		
		h3 {
		  font-size: 24.5px;
		}
		
		h4 {
		  font-size: 17.5px;
		}
		
		h5 {
		  font-size: 14px;
		}
		
		h6 {
		  font-size: 11.9px;
		}
		
		h1 small {
		  font-size: 24.5px;
		}
		
		h2 small {
		  font-size: 17.5px;
		}
		
		h3 small {
		  font-size: 14px;
		}
		
		h4 small {
		  font-size: 14px;
		}
		
		.page-header {
		  padding-bottom: 1px;
		  margin: 10px 0 10px;
		  border-bottom: 1px solid #eeeeee;
		}
		
		hr {
		  margin: 20px 0;
		  border: 0;
		  border-top: 1px solid #eeeeee;
		  border-bottom: 1px solid #ffffff;
		}
		
		address {
		  display: block;
		  margin-bottom: 20px;
		  font-style: normal;
		  line-height: 20px;
		}
		
		form {
		  margin: 0 0 20px;
		}
		
		table {
		  max-width: 100%;
		  background-color: transparent;
		  border-collapse: collapse;
		  border-spacing: 0;
		}
		
		.table {
		  width: 100%;
		  margin-bottom: 5px;
		}
		
		.table th,
		.table td {
		  padding: 2px;
		  line-height: 5px;
		  text-align: left;
		  vertical-align: top;
		  border-top: 1px solid #000000;
		}
		
		.table th {
		  font-weight: bold;
		}
		
		.table thead th {
		  vertical-align: bottom;
		}
		
		.table caption + thead tr:first-child th,
		.table caption + thead tr:first-child td,
		.table colgroup + thead tr:first-child th,
		.table colgroup + thead tr:first-child td,
		.table thead:first-child tr:first-child th,
		.table thead:first-child tr:first-child td {
		  border-top: 0;
		}
		
		.table tbody + tbody {
		  border-top: 2px solid #000000;
		}
		
		.table .table {
		  background-color: #ffffff;
		}
		
		.table-condensed th,
		.table-condensed td {
		  padding: 2px 2px;
		}
		
		.table-bordered {
		  border: 1px solid #000000;
		  border-collapse: separate;
		  *border-collapse: collapse;
		  border-left: 0;
		  -webkit-border-radius: 4px;
		     -moz-border-radius: 4px;
		          border-radius: 4px;
		}
		
		.table-bordered th,
		.table-bordered td {
		  border-left: 1px solid #000000;
		}
		
		.table-bordered caption + thead tr:first-child th,
		.table-bordered caption + tbody tr:first-child th,
		.table-bordered caption + tbody tr:first-child td,
		.table-bordered colgroup + thead tr:first-child th,
		.table-bordered colgroup + tbody tr:first-child th,
		.table-bordered colgroup + tbody tr:first-child td,
		.table-bordered thead:first-child tr:first-child th,
		.table-bordered tbody:first-child tr:first-child th,
		.table-bordered tbody:first-child tr:first-child td {
		  border-top: 0;
		}
		
		.table-bordered thead:first-child tr:first-child > th:first-child,
		.table-bordered tbody:first-child tr:first-child > td:first-child,
		.table-bordered tbody:first-child tr:first-child > th:first-child {
		  -webkit-border-top-left-radius: 4px;
		          border-top-left-radius: 4px;
		  -moz-border-radius-topleft: 4px;
		}
		
		.table-bordered thead:first-child tr:first-child > th:last-child,
		.table-bordered tbody:first-child tr:first-child > td:last-child,
		.table-bordered tbody:first-child tr:first-child > th:last-child {
		  -webkit-border-top-right-radius: 4px;
		          border-top-right-radius: 4px;
		  -moz-border-radius-topright: 4px;
		}
		
		.table-bordered thead:last-child tr:last-child > th:first-child,
		.table-bordered tbody:last-child tr:last-child > td:first-child,
		.table-bordered tbody:last-child tr:last-child > th:first-child,
		.table-bordered tfoot:last-child tr:last-child > td:first-child,
		.table-bordered tfoot:last-child tr:last-child > th:first-child {
		  -webkit-border-bottom-left-radius: 4px;
		          border-bottom-left-radius: 4px;
		  -moz-border-radius-bottomleft: 4px;
		}
		
		.table-bordered thead:last-child tr:last-child > th:last-child,
		.table-bordered tbody:last-child tr:last-child > td:last-child,
		.table-bordered tbody:last-child tr:last-child > th:last-child,
		.table-bordered tfoot:last-child tr:last-child > td:last-child,
		.table-bordered tfoot:last-child tr:last-child > th:last-child {
		  -webkit-border-bottom-right-radius: 4px;
		          border-bottom-right-radius: 4px;
		  -moz-border-radius-bottomright: 4px;
		}
		
		.table-bordered tfoot + tbody:last-child tr:last-child td:first-child {
		  -webkit-border-bottom-left-radius: 0;
		          border-bottom-left-radius: 0;
		  -moz-border-radius-bottomleft: 0;
		}
		
		.table-bordered tfoot + tbody:last-child tr:last-child td:last-child {
		  -webkit-border-bottom-right-radius: 0;
		          border-bottom-right-radius: 0;
		  -moz-border-radius-bottomright: 0;
		}
		
		.table-bordered caption + thead tr:first-child th:first-child,
		.table-bordered caption + tbody tr:first-child td:first-child,
		.table-bordered colgroup + thead tr:first-child th:first-child,
		.table-bordered colgroup + tbody tr:first-child td:first-child {
		  -webkit-border-top-left-radius: 4px;
		          border-top-left-radius: 4px;
		  -moz-border-radius-topleft: 4px;
		}
		
		.table-bordered caption + thead tr:first-child th:last-child,
		.table-bordered caption + tbody tr:first-child td:last-child,
		.table-bordered colgroup + thead tr:first-child th:last-child,
		.table-bordered colgroup + tbody tr:first-child td:last-child {
		  -webkit-border-top-right-radius: 4px;
		          border-top-right-radius: 4px;
		  -moz-border-radius-topright: 4px;
		}
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
		  background-color: #f9f9f9;
		}
		
		.table-hover tbody tr:hover > td,
		.table-hover tbody tr:hover > th {
		  background-color: #f5f5f5;
		}
		
		table td[class*="span"],
		table th[class*="span"],
		.row-fluid table td[class*="span"],
		.row-fluid table th[class*="span"] {
		  display: table-cell;
		  float: none;
		  margin-left: 0;
		}
		
		.table td.span12,
		.table th.span12 {
		  float: none;
		  width: 1024px;
		  margin-left: 0;
		}
		
		.table tbody tr.success > td {
		  background-color: #dff0d8;
		}
		
		.table tbody tr.error > td {
		  background-color: #f2dede;
		}
		
		.table tbody tr.warning > td {
		  background-color: #fcf8e3;
		}
		
		.table tbody tr.info > td {
		  background-color: #d9edf7;
		}
		
		.table-hover tbody tr.success:hover > td {
		  background-color: #d0e9c6;
		}
		
		.table-hover tbody tr.error:hover > td {
		  background-color: #ebcccc;
		}
		
		.table-hover tbody tr.warning:hover > td {
		  background-color: #faf2cc;
		}
		
		.table-hover tbody tr.info:hover > td {
		  background-color: #c4e3f3;
		}
		
		.amountdue { text-align: right; }
		.amountdue h1 { 
			text-align: center; line-height: normal; border: 1px solid #ddd; background: #fcfcfc; 
			display: inline-block; padding: 10px 30px; width: 200px;
		}
		.amountdue h1 span { display: block; font-size: 12px; text-transform: uppercase; color: #666; }
		.amountdue .btn { margin-top: 15px; width: 222px; }
		
		@font-face {
		  font-family: "FontAwesome";
		  src: 	url('<?php echo $this->webroot; ?>css/admin/fonts/fontawesome-webfont.eot');
		  src: 	url('<?php echo $this->webroot; ?>css/admin/fonts/fontawesome-webfont.eot?#iefix') format('eot'), 
		  		url('<?php echo $this->webroot; ?>css/admin/fonts/fontawesome-webfont.woff') format('woff'), 
		  		url('<?php echo $this->webroot; ?>css/admin/fonts/fontawesome-webfont.ttf') format('truetype'), 
		  		url('<?php echo $this->webroot; ?>css/admin/fonts/fontawesome-webfont.svg#FontAwesome') format('svg');
		  font-weight: normal;
		  font-style: normal;
		}
		 </style>
	</head>
	<body>
		<?php echo $this->fetch("content"); ?>
	</body>
</html>