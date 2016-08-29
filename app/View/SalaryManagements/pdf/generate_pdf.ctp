<?php $count = count($salaries); $i = 1; foreach($salaries as $salary){ ?>
<div class="maincontent">
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo"><img class="" src="<?php echo $this->webroot;?>img/logo_t.jpg" alt="BARC" width="20%"/><img class="" src="<?php echo $this->webroot;?>img/logo.png" alt="BARC" width="90%"/></div>
        		<div style="text-align:center"><h1><?php if($salary["Employee"]["type"] == 1) echo "Officer's Salary Bill"; else echo "Staff's Salary Bill";?></h1></div>
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
		      					if(!empty($salary["Employee"]["middle_name"])) 
		      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
		      					else
		      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
		      					echo $name;
		      				?>
		      				</strong>
		      			</td>
		      			<td class="width20">Status:</td>
						<td class="width30"><strong>Revenue - BARC</strong></td>
		      		</tr>
					<tr>
						<td>Designation:</td>
						<td><?php echo $designations[$salary["GeneratedSalary"]["designation_id"]]; if($salary["GeneratedSalary"]["status"] == 4) echo " (AC)"; elseif($salary["GeneratedSalary"]["status"] == 5) echo " (CC)";?></td>
						<td>Pay Scale</td>
						<td><strong><?php echo $salary["PayScale"]["scale"]," - ".$salary["PayScale"]["increment"]." X ".$salary["PayScale"]["increment_iteration"]; if($salary["PayScale"]["eb"] > 0) echo " - EB - ".$salary["PayScale"]["eb"]." X ".$salary["PayScale"]["eb_iteration"];?></strong></td>
					</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $salary["Employee"]["employee_code"];?></td>
						<td>Bank A/C #</td>
						<td><strong><?php echo $salary["EmployeePersonal"]["bank"]." <strong>[".$salary["EmployeePersonal"]["account"]."]";?></strong></td>
					</tr>
					<tr>
						<td>Month:</td>
						<td><strong> <?php echo date('F, Y',$exTime); ?></strong></td>
						<td>E-TIN:</td>
						<td> <?php echo $salary["EmployeePersonal"]["etin"]; ?></td>
					</tr>
				</table>
				<div class="clearfix">&nbsp;<br /></div>
				<table class="table table-bordered table-invoice-full">
					<thead>
						<tr>
							<th class="head0 left" style="width:25%">Payable</th>
							<th class="head1 right" style="width:25%">Amount</th>
							<th style="width:1%">&nbsp;</th>
							<th class="head0 left" style="width:10%">Deduction</th>
							<th class="head1" style="width:10%">Loan</th>
							<th class="head0" style="width:5%">Total<br/> Installment</th>
							<th class="head1" style="width:5%">Paid<br/> Installment</th>
							<th class="head0" style="width:9%">Balance</th>
							<th class="head1 right" style="width:10%">Amount</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width:19%">Basic Salary</td>
							<td class="right"><?php echo number_format($salary["GeneratedSalary"]["basic"])."/-";?></td>
							<td class="width2">|</td>
							<td><?php if(empty($deputations[$i])) echo "CPF - 1 (8.33%)"; elseif(!empty($deputations[$i]) AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputations[$i]["Deputation"]["percentage"]."%)"; elseif(!empty($deputations[$i])  AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputations[$i]["Deputation"]["percentage"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php echo number_format($salary["GeneratedDeduction"]["cpf1"])."/-";?></td>
						</tr>
						<tr>
							<td>Personal Pay</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["pp"])) echo number_format($salary["GeneratedSalary"]["pp"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td><?php if(empty($deputations[$i])) echo "CPF - 2 (2.50%)"; elseif(!empty($deputations[$i])  AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 1) echo "CPF - 2 (".$deputations[$i]["Deputation"]["percentage2"]."%)"; elseif(!empty($deputations[$i])  AND key($deputations[$i]) == $salary["Employee"]["id"] AND $deputations[$i]["Deputation"]["ctype"] == 2) echo "GPF - 2 (".$deputations[$i]["Deputation"]["percentage2"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf2"])) echo number_format($salary["GeneratedDeduction"]["cpf2"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Dearness Allowance</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["dearness"])) echo number_format($salary["GeneratedSalary"]["dearness"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>1st CPF Loan</td>
							<?php 
								if(!empty($salary["Loans"])){
								foreach($salary["Loans"] as $loan){
									if($loan["Loan"]["type"] == 1){
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } } }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } ?>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan1"])) echo number_format($salary["GeneratedDeduction"]["cpf_loan1"])."/-"; else echo "-"; ?></td>
						</tr>
						<tr>
							<td>House Rent</td>
							<td class="right"><?php echo number_format($salary["GeneratedSalary"]["house_rent"])."/-";?></td>
							<td>|</td>
							<td>2nd CPF Loan</td>
							<?php 
								if(!empty($salary["Loans"])){
								foreach($salary["Loans"] as $loan){
									if($loan["Loan"]["type"] == 2){
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } } }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td> 
							<?php } ?>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan2"])) echo number_format($salary["GeneratedDeduction"]["cpf_loan2"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Medical Allowance</td>
							<td class="right"><?php echo number_format($salary["GeneratedSalary"]["medical"])."/-";?></td>
							<td>|</td>
							<td>Total CPF Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_interest"])) echo number_format($salary["GeneratedDeduction"]["cpf_interest"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Charge Allowance</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["charge"])) echo number_format($salary["GeneratedSalary"]["charge"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>House Loan</td>
							<?php 
								if(!empty($salary["Loans"])){
								foreach($salary["Loans"] as $loan){
									if($loan["Loan"]["type"] == 3){
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } } }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } ?>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["house_loan"])) echo number_format($salary["GeneratedDeduction"]["house_loan"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Children Allowance</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["edu"])) echo number_format($salary["GeneratedSalary"]["edu"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Vehicle Loan</td>
							<?php 
								if(!empty($salary["Loans"])){
								foreach($salary["Loans"] as $loan){
									if($loan["Loan"]["type"] == 4){
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
							<?php } } }else{ ?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td> 
							<?php  } ?>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["vehicle_loan"])) echo number_format($salary["GeneratedDeduction"]["vehicle_loan"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Deputation Allowance</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["deputation"])) echo number_format($salary["GeneratedSalary"]["deputation"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>House Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["h_interest"])) echo number_format($salary["GeneratedDeduction"]["h_interest"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Domestic Aid</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["aid"])) echo number_format($salary["GeneratedSalary"]["aid"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Vehicle Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["v_interest"])) echo number_format($salary["GeneratedDeduction"]["v_interest"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Sumptuary</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["sumptuary"])) echo number_format($salary["GeneratedSalary"]["sumptuary"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Benevolent Fund</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["benevolent_fund"])) echo number_format($salary["GeneratedDeduction"]["benevolent_fund"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Washing Allowance</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["washing"])) echo number_format($salary["GeneratedSalary"]["washing"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Group Insurance</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["group_insurance"])) echo number_format($salary["GeneratedDeduction"]["group_insurance"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Conveyance Allowance</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["conveyance"])) echo number_format($salary["GeneratedSalary"]["conveyance"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>House Rent Deduction (<?php if(empty($deputations[$i]["Deputation"]["house_rent_deduct"])) echo " 7.5% "; else echo " Fixed ";?>)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["house_rent_deduct"])) echo number_format($salary["GeneratedDeduction"]["house_rent_deduct"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Tiffin Allowance</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["tiffin"])) echo number_format($salary["GeneratedSalary"]["tiffin"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Transport Bill (Bus Use)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["transport_bill"])) echo number_format($salary["GeneratedDeduction"]["transport_bill"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Arrear</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["arrear"])) echo number_format($salary["GeneratedSalary"]["arrear"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Personal Vehicle Used</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["personal_vehicle"])) echo number_format($salary["GeneratedDeduction"]["personal_vehicle"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Miscellaneous</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["miscellaneous"])) echo number_format($salary["GeneratedSalary"]["miscellaneous"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Water & Swerage</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["w_s"])) echo number_format($salary["GeneratedDeduction"]["w_s"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Fractional Increment</td>
							<td class="right"><?php if(!empty($salary["GeneratedSalary"]["fraction_increment"])) echo number_format($salary["GeneratedSalary"]["fraction_increment"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Gas Cost</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["fuel"])) echo number_format($salary["GeneratedDeduction"]["fuel"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Overdrawn</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["overdrawn"])) echo number_format($salary["GeneratedDeduction"]["overdrawn"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Telephone Bill</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["phone_bill"])) echo number_format($salary["GeneratedDeduction"]["phone_bill"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Officer's Subscription</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["association"])) echo number_format($salary["GeneratedDeduction"]["association"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Income TAX (Optional)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["tax"])) echo number_format($salary["GeneratedDeduction"]["tax"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Miscellaneous Deduction</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["miscellaneous_deduct"])) echo number_format($salary["GeneratedDeduction"]["miscellaneous_deduct"])."/-"; else echo "-";?></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered table-invoice-full">
					<tbody>
						<tr>
							<td class="right width15"><strong>Gross Salary:</strong></td>
							<td class="left width15"><strong><?php echo number_format($salary["GeneratedSalary"]["total_add"])."/-";?></strong></td>
							<td colspan="2" class="right"><strong>Total Deduction:</strong></td>
							<td class="left width15"><strong><?php echo number_format($salary["GeneratedDeduction"]["total_sub"])."/-";?></strong></td>
						</tr>
						<tr>
							<td class="msg-invoice" colspan="3"><h4><p><?php echo "IN WORD: ";?><?php echo strtoupper($salary["GeneratedSalary"]["in_word"]);?></p></h4></td>
							<td class="right width15" style="text-align:right"><strong>Net Payable:</strong></td>
							<td class="left width15"><strong><?php echo number_format($salary["GeneratedSalary"]["payable"])."/-";?></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-bordered table-invoice-full" style="font-size:13px">
		      		<tr>
		          		<td colspan="5"><strong>Passed for payment &nbsp;<?php echo $salary["GeneratedSalary"]["payable"]."/-";?></strong></td>
		      		</tr>
		      		<tr>
						<td colspan="2"><strong><?php echo "Tk. ".$salary["GeneratedSalary"]["in_word"]." only.";?></strong></td>
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
						<td style="width:44%; text-align:center"><strong>----------------------------------------------------------------------------</strong></td>
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
<?php /* if($i < $count){ ?><p style="page-break-before: always">&nbsp;</p> <?php } */?>
<?php $i++;} ?>