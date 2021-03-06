<div class="maincontent">
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo"><img class="" src="<?php echo $this->webroot;?>img/logo.png" alt="BARC" width="90%"/></div>
        		<div style="text-align:center"><h1><?php if($salary["Employee"]["type"] == 1) echo "Officer's "; else echo "Staff's ";?> Pay Slip</h1></div>
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
						<td><?php echo $designations[$salary["Salary"]["designation_id"]]; if($salary["Salary"]["status"] == 4) echo " (AC)"; elseif($salary["Salary"]["status"] == 5) echo " (CC)";?></td>
						<td>Pay Scale</td>
						<td><strong><?php echo $payScale["scale"]," - ".$payScale["increment"]." X ".$payScale["increment_iteration"]; if($payScale["eb"] > 0) echo " - EB - ".$payScale["eb"]." X ".$payScale["eb_iteration"];?></strong></td>
					</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $salary["Employee"]["employee_code"];?></td>
						<td>Bank A/C #</td>
						<td><strong><?php echo $salary["EmployeePersonal"]["bank"]." <strong>[".$salary["EmployeePersonal"]["account"]."]";?></strong></td>
					</tr>
					<tr>
						<td>Month</td>
						<td><strong> <?php echo date('F, Y',$exTime); ?></strong></td>
						<td>E-TIN:</td>
						<td> <?php echo $salary["EmployeePersonal"]["etin"]; ?></td>
					</tr>
				</table>
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
							<td>Basic Salary</td>
							<td class="right"><?php echo number_format($salary["Salary"]["basic"])."/-";?></td>
							<td>|</td>
							<td><?php if(empty($deputation)) echo "CPF - 1 (8.33%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php echo number_format($salary["Deduction"]["cpf1"])."/-";?></td>
						</tr>
						<tr>
							<td>Personal Pay</td>
							<td class="right"><?php if(!empty($salary["Salary"]["pp"])) echo number_format($salary["Salary"]["pp"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td><?php if(empty($deputation)) echo "CPF - 2 (2.50%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; ?></td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["cpf2"])) echo number_format($salary["Deduction"]["cpf2"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Dearness Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["dearness"])) echo number_format($salary["Salary"]["dearness"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>1st CPF Loan</td>
							<?php 
								if(!empty($loans)){
								foreach($loans as $loan){
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
							<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan1"])) echo number_format($salary["Deduction"]["cpf_loan1"])."/-"; else echo "-"; ?></td>
						</tr>
						<tr>
							<td>House Rent</td>
							<td class="right"><?php echo number_format($salary["Salary"]["house_rent"])."/-";?></td>
							<td>|</td>
							<td>2nd CPF Loan</td>
							<?php 
								if(!empty($loans)){
								foreach($loans as $loan){
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
							<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan2"])) echo number_format($salary["Deduction"]["cpf_loan2"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Medical Allowance</td>
							<td class="right"><?php echo number_format($salary["Salary"]["medical"])."/-";?></td>
							<td>|</td>
							<td>Total CPF Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["cpf_interest"])) echo number_format($salary["Deduction"]["cpf_interest"])."/-"; else echo "-";?></td>
							
						</tr>
						<tr>
							<td>Charge Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["charge"])) echo number_format($salary["Salary"]["charge"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>House Loan</td>
							<?php 
								if(!empty($loans)){
								foreach($loans as $loan){
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
							<td class="right"><?php if(!empty($salary["Deduction"]["house_loan"])) echo number_format($salary["Deduction"]["house_loan"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Children Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["edu"])) echo number_format($salary["Salary"]["edu"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Vehicle Loan</td>
							<?php 
								if(!empty($loans)){
								foreach($loans as $loan){
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
							<td class="right"><?php if(!empty($salary["Deduction"]["vehicle_loan"])) echo number_format($salary["Deduction"]["vehicle_loan"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Deputation Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["deputation"])) echo number_format($salary["Salary"]["deputation"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>House Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["h_interest"])) echo number_format($salary["Deduction"]["h_interest"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Domestic Aid</td>
							<td class="right"><?php if(!empty($salary["Salary"]["aid"])) echo number_format($salary["Salary"]["aid"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Vehicle Loan Interest</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["v_interest"])) echo number_format($salary["Deduction"]["v_interest"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Sumptuary</td>
							<td class="right"><?php if(!empty($salary["Salary"]["sumptuary"])) echo number_format($salary["Salary"]["sumptuary"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Benevolent Fund</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["benevolent_fund"])) echo number_format($salary["Deduction"]["benevolent_fund"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Washing Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["washing"])) echo number_format($salary["Salary"]["washing"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Group Insurance</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["group_insurance"])) echo number_format($salary["Deduction"]["group_insurance"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Conveyance Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["conveyance"])) echo number_format($salary["Salary"]["conveyance"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>House Rent Deduction (<?php if(empty($deputation["Deputation"]["house_rent_deduct"])) echo " 7.5% "; else echo " Fixed ";?>)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["house_rent_deduct"])) echo number_format($salary["Deduction"]["house_rent_deduct"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Tiffin Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["tiffin"])) echo number_format($salary["Salary"]["tiffin"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Tranport Bill (Bus Use)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["transport_bill"])) echo number_format($salary["Deduction"]["transport_bill"])."/-"; else echo "-";?></td>							
						</tr>
						<tr>
							<td>Arrear</td>
							<td class="right"><?php if(!empty($salary["Salary"]["arrear"])) echo number_format($salary["Salary"]["arrear"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Personal Vehicle Used</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["personal_vehicle"])) echo number_format($salary["Deduction"]["personal_vehicle"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Miscellaneous</td>
							<td class="right"><?php if(!empty($salary["Salary"]["miscellaneous"])) echo number_format($salary["Salary"]["miscellaneous"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Water & Swerage</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["w_s"])) echo number_format($salary["Deduction"]["w_s"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Fractional Increment</td>
							<td class="right"><?php if(!empty($salary["Salary"]["fraction_increment"])) echo number_format($salary["Salary"]["fraction_increment"])."/-"; else echo "-";?></td>
							<td>|</td>
							<td>Gas Cost</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["fuel"])) echo number_format($salary["Deduction"]["fuel"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Overdrawn</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["overdrawn"])) echo number_format($salary["Deduction"]["overdrawn"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Telephone Bill</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["phone_bill"])) echo number_format($salary["Deduction"]["phone_bill"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Officer's Subscription Fee</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["association"])) echo number_format($salary["Deduction"]["association"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Income TAX (Optional)</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["tax"])) echo number_format($salary["Deduction"]["tax"])."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td class="right">&nbsp;</td>
							<td>|</td>
							<td>Miscellaneous Deduction</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["miscellaneous_deduct"])) echo number_format($salary["Deduction"]["miscellaneous_deduct"])."/-"; else echo "-";?></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered table-invoice-full">
					<tbody>
						<tr>
							<td class="left width15"><strong>Gross Salary:</strong></td>
							<td class="left width15"><strong><?php echo number_format($salary["Salary"]["total_add"])."/-";?></strong></td>
							<td colspan="2" class="right"><strong>Total Deduction:</strong></td>
							<td class="right width15"><strong><?php echo number_format($salary["Deduction"]["total_sub"])."/-";?></strong></td>
						</tr>
						<tr>
							<td class="msg-invoice" colspan="3"><h4><p><?php echo "IN WORD: ";?><?php echo strtoupper($salary["Salary"]["in_word"]);?></p></h4></td>
							<td class="left width15" style="text-align:right"><strong>Net Payable:</strong></td>
							<td class="left width15"><strong><?php echo number_format($salary["Salary"]["payable"])."/-";?></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-bordered table-invoice-full" style="font-size:13px">
		      		<tr>
		          		<td colspan="5"><strong>Passed for payment &nbsp;<?php echo $salary["Salary"]["payable"]."/-";?></strong></td>
		      		</tr>
		      		<tr>
						<td colspan="2"><strong><?php echo "Tk. ".$salary["Salary"]["in_word"]." only.";?></strong></td>
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