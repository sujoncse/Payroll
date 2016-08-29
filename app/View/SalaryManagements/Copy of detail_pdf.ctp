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
	};
	strong { font-weight: bold; };
	body { background: #ffffff; font-family: HelveticaNeue, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15px; color: #ffffff; };
	.mainwrapper { 
		width: auto; margin: 980px; background: #ffffff repeat-y 0 0; position: relative; 
		overflow: hidden; -moz-box-shadow: 0 0 5px rgba(0,0,0,0); 
		-webkit-box-shadow: 0 0 5px rgba(0,0,0,0); box-shadow: 0 0 5px rgba(0,0,0,0); padding-bottom: 5px; 
	};
	.maincontent { position: relative; padding-right: 10px; }
	.contentinner { padding: 15px; min-height: 650px; float: left; width: 100%; }
		
	.span12 { width: 940px; };
	.span11 { width: 860px; };
	.span10 { width: 780px; };
	.span9 { width: 700px; };
	.span8 { width: 620px; };
	.span7 { width: 540px; };
	.span6 { width: 460px; };
	.span5 { width: 380px; };
	.span4 { width: 300px; };
	.span3 { width: 220px; };
	.span2 { width: 140px; };
	.span1 { width: 60px; };	
	.width4 { width: 4%; };
	.width5 { width: 5%; };
	.width10 { width: 10%; };
	.width15 { width: 15%; };
	.width20 { width: 20%; };
	.width30 { width: 30%; };
	.width45 { width: 45%; };
	.width55 { width: 55%; };
	.width60 { width: 60%; };
	.width63 { width: 63%; };
	.width70 { width: 70%; };
	.width80 { width: 80%; };
 	.row-fluid {
		width: 100%;
	  	*zoom: 1;
	};	
	.row-fluid:before,
	.row-fluid:after {
	  	display: table;
	  	line-height: 0;
	  	content: "";
	};
	.row-fluid:after { clear: both; };
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
	};
	.row-fluid [class*="span"]:first-child { margin-left: 0; };
	.row-fluid .controls-row [class*="span"] + [class*="span"] { margin-left: 2.127659574468085%; };
	.row-fluid .span12 {
	  	width: 100%;
	  	*width: 99.94680851063829%;
	};
	.row-fluid .span11 {
	  	width: 91.48936170212765%;
	  	*width: 91.43617021276594%;
	};	
	.row-fluid .span10 {
	  	width: 82.97872340425532%;
	  	*width: 82.92553191489361%;
	};	
	.row-fluid .span9 {
	  	width: 74.46808510638297%;
	  	*width: 74.41489361702126%;
	};	
	.row-fluid .span8 {
	  	width: 65.95744680851064%;
	  	*width: 65.90425531914893%;
	};	
	.row-fluid .span7 {
	  	width: 57.44680851063829%;
	  	*width: 57.39361702127659%;
	};	
	.row-fluid .span6 {
	  	width: 48.93617021276595%;
	  	*width: 48.88297872340425%;
	};	
	.row-fluid .span5 {
	  	width: 40.42553191489362%;
	  	*width: 40.37234042553192%;
	};	
	.row-fluid .span4 {
	  	width: 31.914893617021278%;
	  	*width: 31.861702127659576%;
	};	
	.row-fluid .span3 {
	  	width: 23.404255319148934%;
	  	*width: 23.351063829787233%;
	};	
	.row-fluid .span2 {
	  	width: 14.893617021276595%;
	  	*width: 14.840425531914894%;
	};	
	.row-fluid .span1 {
	  	width: 6.382978723404255%;
	  	*width: 6.329787234042553%;
	};
	.row-fluid .offset12 {
	  	margin-left: 104.25531914893617%;
	  	*margin-left: 104.14893617021275%;
	};
	.widgetcontent { margin-bottom: 30px; position: relative; };
	.table { margin-bottom: 0; };
 </style>
<div class="span7" style="text-align:center; font-size:14px">
	<div class="span7"><img src="<?php echo $this->webroot;?>img/logo.png" width="540px"/></div>
	<div class="span7" style="text-align:center; font-size:14px"><b>New Airport Road, Farmgate, Dhaka<br/>www.barc.gov.bd</b></div>
	<div class="span7" style="text-align:center; font-size:14px"><b><?php if($salary["Salary"]["grade"] < 11){ echo "Officer's Salary Bill"; }elseif($salary["Salary"]["grade"] > 10){ echo "Staff's Salary Bill"; } ?></b></div>
	<div class="span7">&nbsp;</div>
	<div class="row-fluid span11">
		<div class="span3"><div class="widgetcontent" style="text-align:left">Pay Sleep For:</div></div>
		<div class="span3">
			<div class="widgetcontent" style="text-align:left">
				<strong><?php 
  					if(!empty($salary["Employee"]["middle_name"])) 
  						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
  					else
  						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
  				?></strong>
  			</div>
		</div>
		<div class="span3"><div class="widgetcontent" style="text-align:right">Pay Slip #</div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:left"><?php echo $salary["Salary"]["id"];?></div></div>
	</div>
	<div class="row-fluid span11">
		<div class="span3"><div class="widgetcontent" style="text-align:left">Designation:</div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:left"><strong><?php echo $designations[$salary["Salary"]["designation_id"]];?></strong></div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:right">Pay Scale:</div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:left"><strong><?php echo $payScale["scale"]," - ".$payScale["increment"]." X ".$payScale["increment_iteration"]; if($payScale["eb"] > 0) echo " - EB - ".$payScale["eb"]." X ".$payScale["eb_iteration"];?></div></div>
	</div>
	<div class="row-fluid span11">
		<div class="span3"><div class="widgetcontent" style="text-align:left">For the month of:</div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:left"><strong><?php echo date('F, Y', strtotime(date('Y-m')." -1 month")); ?></strong></div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:right">Issue Date:</div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:left"><strong><?php echo date('d F, Y'); ?></strong></div></div>
	</div>
	<div class="row-fluid span11">
		<div class="span3"><div class="widgetcontent" style="text-align:left">Personal Number:</div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:left"><?php echo $salary["Employee"]["employee_code"];?></div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:right">Bank A/C:</div></div>
		<div class="span3"><div class="widgetcontent" style="text-align:left"><?php echo $salary["EmployeePersonal"]["account"];?></div></div>
	</div>
	<div class="row-fluid span11" style="text-align:left">=====================================================================================================================</div>
	<div class="row-fluid span11" style="text-align:left">
		<div class="span3"><div class="widgetcontent"><strong>Payable</strong></div></div>
		<div class="span8"><div class="widgetcontent" style="text-align:right"><strong>Tk.</strong></div></div>
	</div>
	<div class="row-fluid span11" style="text-align:left">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left"><strong>Basic Salary</strong></div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><strong><?php echo $salary["Salary"]["basic"]."/-";?></strong></div></div>
	</div>
	<?php if(!empty($salary["Salary"]["pp"]) AND $salary["Salary"]["pp"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Personal Pay</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["pp"]."/-";?></div></div>
	</div>
	<?php } ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">House Rent</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["house_rent"]."/-";?></div></div>
	</div>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Medical</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["medical"]."/-";?></div></div>
	</div>
	<?php if(!empty($salary["Salary"]["edu"]) AND $salary["Salary"]["edu"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Children Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["edu"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Salary"]["charge"]) AND $salary["Salary"]["charge"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Charge Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["charge"]."/-";?></div></div>
	</div>
	<?php } ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Dearness Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php if(!empty($salary["Salary"]["dearness"]) AND $salary["Salary"]["dearness"] != 0) echo $salary["Salary"]["dearness"]."/-"; else echo "-";?></div></div>
	</div>
	<?php if($salary["Salary"]["grade"] < 4) { ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Sumptuary Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["sumptuary"]."/-";?></div></div>
	</div>
	<?php } if($salary["Salary"]["grade"] > 10) { ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Conveyance Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["conveyance"]."/-";?></div></div>
	</div>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Tiffin Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["tiffin"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Salary"]["washing"]) AND $salary["Salary"]["washing"] != 0) {  ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Washing Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["washing"]."/-";?></div></div>
	</div>
	<?php } if($salary["Salary"]["grade"]  == 1) { ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Domestic Aid</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["aid"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Salary"]["deputation"]) AND $salary["Salary"]["deputation"] != 0){?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Deputation Allowance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["deputation"]."/-";?></div></div>
	</div>
	<?php } ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Arrear</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php if(!empty($salary["Salary"]["arrear"]) AND $salary["Salary"]["arrear"]!= 0) echo $salary["Salary"]["arrear"]."/-"; else echo "-";?></div></div>
	</div>
	<?php if(!empty($salary["Salary"]["miscellaneous"]) AND $salary["Salary"]["miscellaneous"] != 0){?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Miscellaneous</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["miscellaneous"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Salary"]["fraction_increment"]) AND $salary["Salary"]["fraction_increment"] != 0){?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Fractional Increment</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Salary"]["fraction_increment"]."/-";?></div></div>
	</div>
	<?php } ?>
	<div class="row-fluid span11" style="text-align:left">=====================================================================================================================</div>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">&nbsp;</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left"><strong>Total Salary</strong></div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><strong><?php echo $salary["Salary"]["total_add"]."/-";?></strong></div></div>
	</div>
	<div class="row-fluid span11" style="text-align:left">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
	<div class="row-fluid span11" style="text-align:left"><strong>
		<div class="span4"><div class="widgetcontent">Deduciton</div></div>
		<div class="span1"><div class="widgetcontent">Loan</div></div>
		<div class="span2"><div class="widgetcontent">Total Installment</div></div>
		<div class="span2"><div class="widgetcontent">Paid Installment</div></div>
		<div class="span1"><div class="widgetcontent">Balance</div></div>
		<div class="span1"><div class="widgetcontent">Tk.</div></div></strong>
	</div>
	<div class="row-fluid span11" style="text-align:left">=====================================================================================================================</div>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left"><strong>CPF Contribution</strong></div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><strong><?php echo $salary["Deduction"]["cpf1"]."/-";?></strong></div></div>
	</div>
	<?php if($salary["Salary"]["grade"] < 11){?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left"><strong>Aditional CPF Contribution</strong></div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><strong><?php echo $salary["Deduction"]["cpf2"]."/-";?></strong></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["arrear_cpf"]) AND $salary["Deduction"]["arrear_cpf"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left"><strong>Arrear CPF</strong></div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><strong><?php echo $salary["Deduction"]["arrear_cpf"]."/-";?></strong></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["cpf_loan1"]) AND $salary["Deduction"]["cpf_loan1"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">1st CPF Loan</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["cpf_loan1"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["cpf_loan2"]) AND $salary["Deduction"]["cpf_loan2"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">2nd CPF Loan</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["cpf_loan2"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["cpf_interest"]) AND $salary["Deduction"]["cpf_interest"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">CPF Interest</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["cpf_interest"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["house_loan"]) AND $salary["Deduction"]["house_loan"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">House Loan</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["house_loan"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["vehicle_loan"]) AND $salary["Deduction"]["vehicle_loan"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Vehicle Loan</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["vehicle_loan"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["hv_interest"]) AND $salary["Deduction"]["hv_interest"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">House/Vehicle Loan Interest</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["hv_interest"]."/-";?></div></div>
	</div>
	<?php } ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Benevolent Fund</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["benevolent_fund"]."/-";?></div></div>
	</div>
	<?php if($salary["Salary"]["grade"] == 1){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">House Rent Deduction</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["house_rent_deduct"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["transport_bill"]) AND $salary["Deduction"]["transport_bill"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Transport Bill</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["transport_bill"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["personal_vehicle"]) AND $salary["Deduction"]["personal_vehicle"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Personal Vehicle Use</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["personal_vehicle"]."/-";?></div></div>
	</div>
	<?php } ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Group Insurance</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["group_insurance"]."/-";?></div></div>
	</div>
	<?php if(!empty($salary["Deduction"]["w_s"]) AND $salary["Deduction"]["w_s"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Water & Swerage</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["w_s"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["fuel"]) AND $salary["Deduction"]["fuel"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Fuel Use</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["fuel"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["phone_bill"]) AND $salary["Deduction"]["phone_bill"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Telephone Bill</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["phone_bill"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["overdrawn"]) AND $salary["Deduction"]["overdrawn"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Overdrawn</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["overdrawn"]."/-";?></div></div>
	</div>
	<?php } if($salary["Salary"]["grade"] < 11){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Association Subscription</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["association"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["tax"]) AND $salary["Deduction"]["tax"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Tax</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["tax"]."/-";?></div></div>
	</div>
	<?php } if(!empty($salary["Deduction"]["miscellaneous_deduct"]) AND $salary["Deduction"]["miscellaneous_deduct"] != 0){ ?>
	<div class="row-fluid span11">
		<div class="span1"><div class="widgetcontent" style="text-align:left">#</div></div>
		<div class="span5"><div class="widgetcontent" style="text-align:left">Miscellaneous Deduction</div></div>
		<div class="span1"><div class="widgetcontent">:</div></div>
		<div class="span4"><div class="widgetcontent" style="text-align:right"><?php echo $salary["Deduction"]["miscellaneous_deduct"]."/-";?></div></div>
	</div>
	<?php } ?>
	<div class="row-fluid span11" style="text-align:left">=====================================================================================================================</div>
	<div class="row-fluid span11" style="text-align:left">
		<div class="span3"><div class="widgetcontent"><strong>Total Deduction</strong></div></div>
		<div class="span8"><div class="widgetcontent" style="text-align:right"><strong><?php echo $salary["Deduction"]["total_sub"]."/-";?></strong></div></div>
	</div>
	<div class="row-fluid span11" style="text-align:left">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
	<div class="row-fluid span11" style="text-align:left">
		<div class="span3"><div class="widgetcontent"><strong>Net Payable</strong></div></div>
		<div class="span8"><div class="widgetcontent" style="text-align:right"><strong><?php echo $salary["Salary"]["payable"]."/-";?></strong></div></div>
	</div>
	<div class="row-fluid span11" style="text-align:left">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
	<div class="row-fluid span11" style="text-align:left">
		<div class="span3"><div class="widgetcontent"><strong>In Word:</strong></div></div>
		<div class="span8"><div class="widgetcontent" style="text-align:left"><strong><?php echo $salary["Salary"]["in_word"];?></strong></div></div>
	</div>
	<div class="row-fluid span11" style="text-align:left">=====================================================================================================================</div>
</div>
<div class="row-fluid span12" style="text-align:left; font-size:14px">
	<div class="span5">
		<table class="table">
      		<tr><td colspan="2" style="width:100%" style="text-align:left"><strong>Passed for payment Tk.&nbsp;&nbsp;<?php echo $salary["Salary"]["payable"]."/-";?></strong></td></tr>
      		<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2" style="width:100%" style="text-align:left"><strong><?php echo $salary["Salary"]["in_word"]." only.";?></strong></td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td class="">Cheque No: </td><td class="" style="text-align:left">------------------------------------------</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td class="">Date: </td><td  class="" style="text-align:left">------------------------------------------</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td class="">Checked By: </td><td class="" style="text-align:left">------------------------------------------</td></tr>
		</table>
	</div>
	<div class="span5">
		<table class="table">
      		<tr><td style="width:30%">&nbsp;</td><td style="text-align:left; width:70%"><img src="<?php echo $this->webroot."img/stamp.jpg"?>"/></td></tr>
      		<tr><td colspan="2" style="text-align:center; width:100%">-----------------------------------------------------------------------------</td></tr>
			<tr><td colspan="2" style="text-align:center; width:100%"><strong>Signature</strong></td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2" style="text-align:center; width:100%">-----------------------------------------------------------------------------</td></tr>
			<tr><td colspan="2" style="text-align:center; width:100%"><strong>Signature of Drawing & Disbursing officer (DDO)</strong></td></tr>
		</table>
	</div>
</div>