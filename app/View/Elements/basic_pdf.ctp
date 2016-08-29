<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables","admin/toword"));
 ?>

<!--<style>
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, font, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center, ol, ul, li,
    fieldset, form, label, legend,
    /*table, caption, tbody, tfoot, thead, tr, th, td {
        background: transparent;
        border: 0;
        margin: 0;
        padding: 0;
        vertical-align: baseline;
    }*/
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
    /*.table {
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

    .table-bordered th,.table-bordered td { border-left: 1px #000000;border-bottom: 1px #000000; }

    .table-invoice-full { border-color: #000000; }
    .table-invoice-full tr td { border-color: #000000; border: 1px #000000; }
    .table-invoice-full tr td { background: #ffffff; }
    .table-invoice-full th.right, .table-invoice-full td.right { text-align: right; }
*/
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
	/*table {width: 100%;}
	th {height: 50px;}
	table { border-collapse: collapse;}
	table, th, td {border: 1px solid black;}*/
	table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child {
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr {
	text-align: center;
	padding-left:20px;
}
table td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td {
	border-bottom:0;
}
table tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}

</style>-->
<div id="header">
<div class="maincontent">
	<?php if(!empty($salaries)){ ?>
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<!--<div class="span12" style="text-align:center">
        				<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3>
        			</div><br/>-->
        			<div class="span12" style="text-align:center"><h3><?php if($type == 1) echo "Employee (Grade 1-10)"; elseif($type == 2) echo "Employee (Grade 11-20)";?> Basic Salary Information</h3></div>
        		</div>
        	</div><!--span6-->
		</div>
		<table class="table table-bordered table-invoice-full" border="1" style="border-collapse:collapse">
			
			<thead>
				<tr>
					<th class="head0" style="text-align:center">Sl</th>
					<th class="head1" style="text-align:center">PSN</th>
					<th class="head0" style="text-align:left">Name</th>
					<th class="head1" style="text-align:left">Designation</th>
					<th class="head0" style="text-align:center">Basic</th>
					
				</tr>
			</thead>
			<tbody>
				<?php  $i = 1; foreach($salaries as $salary){ ?> 
				<tr>
					<td style="text-align:center"><?php echo $i; ?></td>
					<td style="text-align:center"><?php echo $salary["Employee"]["employee_code"]; ?></td>
					<td style="text-align:left">
					
	          			<?php 
	      					if(!empty($salary["Employee"]["middle_name"])) 
	      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
	      					else
	      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
	      					echo $name;
	      				?>
	      			
					</td>
					<td style="text-align:left"><?php echo $designations[$salary["Employee"]["designation_id"]]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["basic"]; ?></td>
					
				</tr>
				
				<?php $i++; } ?>
			</tbody>
		</table>
	</div>
	<?php } ?>
</div>