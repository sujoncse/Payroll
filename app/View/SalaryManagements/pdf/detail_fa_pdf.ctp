<?php $festivals = Configure::read("festivals"); ?>
<div class="maincontent">
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo"><img class="" src="<?php echo $this->webroot;?>img/logo.png" alt="BARC" width="90%"/></div>
        		<div style="text-align:center"><h1><?php if($type == 1) echo "Officer's"; else echo "Staff's";?><span> Festival Bonus for <?php echo $festivals[$fa["FestivalAllowance"]["festival"]]; ?></h1></div>
        	</div><!--span6-->
        </div>
        <div class="row-fluid">
        	<div class="span12">
		        <table class="table table-bordered table-invoice-full">
		        	<tr>
		          		<td class="width20">Name:</td>
		          		<td class="width30">
		          			<strong>
		          			<?php 
		      					if(!empty($fa["Employee"]["middle_name"])) 
		      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["middle_name"]." ".$fa["Employee"]["last_name"];
		      					else
		      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["last_name"];
		      					echo $name;
		      				?>
		      				</strong>
		      			</td>
		      			<td class="width20">Designation:</td>
						<td class="width30"><strong><td><?php echo $designations[$fa["FestivalAllowance"]["designation_id"]]; if($fa["Salary"]["status"] == 4) echo " (AC)"; elseif($fa["Salary"]["status"] == 5) echo " (CC)";?></td></strong></td>
		      		</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $fa["Employee"]["employee_code"];?></td>
						<td>Month</td>
						<td><strong><?php echo date('F, Y',$exTime); ?></strong></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td>Revenue - BARC</td>
						<td>Pay Scale</td>
						<td><strong><?php echo $payScale["scale"]; if($payScale["increment"]> 0) echo " - ".$payScale["increment"]." X "; echo $payScale["increment_iteration"]; if($payScale["eb"] > 0) echo " - EB - ".$payScale["eb"]." X ".$payScale["eb_iteration"];?></strong></td>
					</tr>
					<tr>
						<td>Bank A/C:</td>
						<td><strong><?php echo $fa["EmployeePersonal"]["bank"]." <strong>[".$fa["EmployeePersonal"]["account"]."]";?></strong></td>
						<td>E-TIN:</td>
						<td><?php echo $fa["EmployeePersonal"]["etin"]; ?></td>
					</tr>
				</table>
				<div class="clearfix">&nbsp;<br /></div>
				<table class="table table-bordered table-invoice-full">
					<thead>
						<tr>
							<th class="head0 left">Payable</th>
							<th class="head1 right">Amount</th>
							<th class="width2">&nbsp;</th>
							<th class="head0 left">Deduction</th>
							<th class="head1">Loan</th>
							<th class="head0">Total<br/> Installment</th>
							<th class="head1">Paid<br/> Installment</th>
							<th class="head0">Balance</th>
							<th class="head1 right">Amount</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width:19%">Basic Salary</td>
							<td class="right"><?php echo number_format($fa["FestivalAllowance"]["basic"])."/-";?></td>
							<td class="width2">|</td>
							<td style="width:19%"><?php if(empty($deputation)) echo "CPF - 1 (8.33%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Personal Pay</td>
							<td class="right">-</td>
							<td>|</td>
							<td><?php if(empty($deputation)) echo "CPF - 2 (2.50%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Dearness Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>1st CPF Loan</td>
							<td class="right">-</td>
							<td style="text-align:center"><i>-</i></td>
							<td style="text-align:center"><i>-</i></td>
							<td class="right"><i>-</i></td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>House Rent</td>
							<td class="right">-</td>
							<td>|</td>
							<td>2nd CPF Loan</td>
							<td class="right">-</td>
							<td style="text-align:center"><i>-</i></td>
							<td style="text-align:center"><i>-</i></td>
							<td class="right">-</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Medical Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Total CPF Interest</td>
							<td class="right"><i>-</i></td>
							<td style="text-align:center"><i>-</i></td>
							<td style="text-align:center"><i>-</i></td>
							<td class="right"><i>-</i></td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Charge Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>House Loan</td>
							<td class="right"><i>-</i></td>
							<td style="text-align:center"><i>-</i></td>
							<td style="text-align:center"><i>-</i></td>
							<td class="right"><i>-</i></td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Children Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Vehicle Loan</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Deputation Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>House Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Domestic Aid</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Vehicle Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Sumptuary</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Benevolent Fund</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Washing Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Group Insurance</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Conveyance Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>House Rent Deduction (<?php if(empty($deputation["Deputation"]["house_rent_deduct"])) echo " 7.5% "; else echo " Fixed ";?>)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Tiffin Allowance</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Tranport Bill (Bus Use)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Arrear</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Personal Vehicle Used</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Miscellaneous</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Water &amp; Swerage</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>Fractional Increment</td>
							<td class="right">-</td>
							<td>|</td>
							<td>Gas Cost</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Overdrawn</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Telephone Bill</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Officer's Subscription Fee</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Income TAX (Optional)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Miscellaneous Deduction</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right">-</td>
						</tr>
					</tbody>
				</table>
				<div class="row-fluid"><div class="span12">&nbsp;</div></div>
				<div class="row-fluid"><div class="span12">&nbsp;</div></div>
				<table class="table table-bordered table-invoice-full">
					<tbody>
						<tr>
							<td colspan="1" class="right width20"><strong>Total Allowance:</strong></td>
							<td colspan = "4" class="left"><strong><?php echo number_format($fa["FestivalAllowance"]["payable"])."/-";?></strong>&nbsp;&nbsp;[For <?php if($fa["FestivalAllowance"]["religion"] == 1) echo "01 "; else echo "02 ";?> Festival: &nbsp;&nbsp;<?php if($fa["FestivalAllowance"]["religion"] == 1) echo "01 "; else echo "02 ";?> X <?php echo number_format($fa["FestivalAllowance"]["basic"])."/-";?>]</td>
						</tr>
						<tr>
							<td class="msg-invoice" colspan="3"><h4><p><?php echo "IN WORD: ";?><?php echo strtoupper($fa["FestivalAllowance"]["in_word"]);?></p></h4></td>
							<td class="right width15" style="text-align:right"><strong>Net Payable:</strong></td>
							<td class="left width15"><strong><?php echo number_format($fa["FestivalAllowance"]["payable"])."/-";?></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row-fluid"><div class="span12">&nbsp;</div></div>
		<div class="row-fluid"><div class="span12">&nbsp;</div></div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-bordered table-invoice-full" style="font-size:13px">
		      		<tr>
		          		<td colspan="5"><strong>Passed for payment Tk.&nbsp;&nbsp;<?php echo $fa["FestivalAllowance"]["payable"]."/-";?></strong></td>
		      		</tr>
		      		<tr>
						<td colspan="2"><strong><?php echo "Tk. ".$fa["FestivalAllowance"]["in_word"]." only.";?></strong></td>
						<td class="width1">&nbsp;</td>
						<td colspan="2" style="align:center"><img class="img" src="<?php echo $this->webroot."img/stamp.jpg"?>" width="50px" height="50px"/></td>
					</tr>
					<tr>
						<td style="width: 20%;"><strong>Cheque No:</strong></td>
						<td style="width: 35%;"><strong>-------------------------------------------------</strong></td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width: 44%; text-align:center">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;"><strong>Date:</strong></td>
						<td style="width: 35%;"><strong>-------------------------------------------------</strong></td>
						<td class="width1">&nbsp;</td>
						<td colspan="2" style="text-align:center"><strong>---------------------------------------------------</strong></td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width:44%; text-align:center"><strong>Signature</strong></td>
					</tr>
					
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr style="text-align:center">
						<td style="width: 20%;"><strong>Checked By:</strong></td>
						<td style="width: 35%;"><strong>-------------------------------------------------</strong></td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td style="width:44%; text-align:center"><strong>---------------------------------------------------------------------------------</strong></td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td class="width1">&nbsp;</td>
						<td colspan="2" style="text-align:center"><strong>Signature of Drawing & Disbursing officer (DDO)</strong></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row-fluid" style="line-height:5px">
			<div class="span12">
				<div class="footer">
					<div class="footerleft">Developed By: <a href="http://mahmudit.com" target="new"><strong>Engr. Rajib Mahmud</strong></a></div>
					<div class="footerleft" style="margin-left: 260px;">Copyright © 2013 <a href="http://www.barc.gov.bd" target="new"><strong>Bangladesh Agricultural Research Council</strong></a></div>
				</div>
			</div>
		</div>				
	</div>
</div>