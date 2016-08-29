<div class="maincontent nomargin">
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
				<table class="table table-invoice-full">
              		<tr><td colspan="5"><div class="invoice_logo"><img src="<?php echo $this->webroot."img/logo.png";?>" alt="" class="img-polaroid" width="480px" height="200px"/></div></td></tr>
              		<tr><td colspan="5" style="text-align:center; font-size:12px"><strong>New Airport Road, Farmgate, Dhaka</strong></td></tr>
              		<tr><td colspan="5" style="text-align:center; font-size:12px"><strong>www.barc.gov.bd</strong></td></tr>
              		<tr><td colspan="5" style="text-align:center; font-size:12px"><strong><?php if($salary["Salary"]["grade"] < 11){ echo "Officer's Salary Bill"; }elseif($salary["Salary"]["grade"] > 10){ echo "Staff's Salary Bill"; } ?></strong></td></tr>
              		<tr>
                  		<td class="width20">Pay Sleep For:</td>
                  		<td class="width35">
                  			<strong>
                  			<?php 
	          					if(!empty($salary["Employee"]["middle_name"])) 
	          						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
	          					else
	          						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
	          				?>
	          				</strong>
	          			</td>
	          			<td class="width1">&nbsp;</td>
	          			<td class="width20">Pay Slip #</td>
						<td class="width25"><?php echo $salary["Salary"]["id"];?></td>
              		</tr>
              		<tr>
						<td class="width20">Designation:</td>
						<td class="width35"><strong><?php echo $designations[$salary["Salary"]["designation_id"]];?></strong></td>
						<td class="width1">&nbsp;</td>
						<td class="width20">Pay Scale:</td>
						<td class="width25"><strong><?php echo $payScale["scale"]," - ".$payScale["increment"]." X ".$payScale["increment_iteration"]; if($payScale["eb"] > 0) echo " - EB - ".$payScale["eb"]." X ".$payScale["eb_iteration"];?></strong></td>
					</tr>
					<tr>
						<td class="width20">For the month of:</td>
						<td class="width35"><strong><?php echo date('F, Y', strtotime(date('Y-m')." -1 month")); ?></strong></td>
						<td class="width1">&nbsp;</td>
						<td class="width20">Issue Date:</td>
						<td class="width25"><strong><?php echo date('d F, Y'); ?></strong></td>
					</tr>
					<tr>
						<td class="width20">Personal Number:</td>
						<td class="width35"><?php echo $salary["Employee"]["employee_code"];?></td>
						<td class="width1">&nbsp;</td>
						<td class="width20">Bank A/C:</td>
						<td class="width25"><strong><?php echo $salary["EmployeePersonal"]["account"];?></strong></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row-fluid"><div class="span12">==============================================================</div></div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-invoice-full">
					<thead>
						<tr>
							<th class="head0">Payable</th>
							<th class="head1 right">Amount</th>
						</tr>
					</thead>
					<tbody>
						<tr><td colspan="2">--------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>
						<tr>
							<td><strong>Basic Salary</strong></td>
							<td class="right"><strong><?php echo $salary["Salary"]["basic"]."/-";?></strong></td>
						</tr>
						<?php //if(!empty($salary["Salary"]["pp"]) AND $salary["Salary"]["pp"] != 0){ ?>
						<tr>
							<td>Personal Pay</td>
							<td class="right"><?php echo $salary["Salary"]["pp"]."/-";?></td>
						</tr>
						<?php //} ?>
						<tr>
							<td>House Rent</td>
							<td class="right"><?php echo $salary["Salary"]["house_rent"]."/-";?></td>
						</tr>
						<tr>
							<td>Medical Allowance</td>
							<td class="right"><?php echo $salary["Salary"]["medical"]."/-";?></td>
						</tr>
						<?php //if(!empty($salary["Salary"]["edu"]) AND $salary["Salary"]["edu"] != 0){ ?>
						<tr>
							<td>Children Allowance</td>
							<td class="right"><?php echo $salary["Salary"]["edu"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Salary"]["charge"]) AND $salary["Salary"]["charge"] != 0){ ?>
						<tr>
							<td>Charge Allowance</td>
							<td class="right"><?php echo $salary["Salary"]["charge"]."/-";?></td>
						</tr>
						<?php //} ?>
						<tr>
							<td>Dearness Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["dearness"])) echo $salary["Salary"]["dearness"]."/-";?></td>
						</tr>
						<?php //if($salary["Salary"]["grade"] < 4) { ?>
						<tr>
							<td>Sumptuary</td>
							<td class="right"><?php echo $salary["Salary"]["sumptuary"]."/-";?></td>
						</tr>
						<?php //} if($salary["Salary"]["grade"] > 10) { ?>
						<tr>
							<td>Conveyance Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["conveyance"])) echo $salary["Salary"]["conveyance"]."/-"; else echo "-";?></td>
						</tr>
						<tr>
							<td>Tiffin Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["tiffin"])) echo $salary["Salary"]["tiffin"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if(!empty($salary["Salary"]["washing"]) AND $salary["Salary"]["washing"] != 0) {  ?>
						<tr>
							<td>Washing Allowance</td>
							<td class="right"><?php echo $salary["Salary"]["washing"]."/-";?></td>
						</tr>
						<?php //} if($salary["Salary"]["grade"]  == 1) { ?>
						<tr>
							<td>Domestic Aid</td>
							<td class="right"><?php echo $salary["Salary"]["aid"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Salary"]["deputation"]) AND $salary["Salary"]["deputation"] != 0){?>
						<tr>
							<td>Deputation Allowance</td>
							<td class="right"><?php if(!empty($salary["Salary"]["deputation"])) echo $salary["Salary"]["deputation"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} ?>
						<tr>
							<td>Arrear</td>
							<td class="right"><?php if(!empty($salary["Salary"]["arrear"])) echo $salary["Salary"]["arrear"]."/-"; else echo "-";?></td>
						</tr>
						<?php //if(!empty($salary["Salary"]["miscellaneous"]) AND $salary["Salary"]["miscellaneous"] != 0){?>
						<tr>
							<td>Miscellaneous</td>
							<td class="right"><?php echo $salary["Salary"]["miscellaneous"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Salary"]["fraction_increment"]) AND $salary["Salary"]["fraction_increment"] != 0){?>
						<tr>
							<td>Fractional Increment</td>
							<td class="right"><?php echo $salary["Salary"]["fraction_increment"]."/-";?></td>
						</tr>
						<?php //} ?>
						<tr>
							<td><strong><i>Total Salary</i></strong></td>
							<td class="right"><strong><i><?php echo $salary["Salary"]["total_add"]."/-";?></i></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-invoice-full">
					<thead>
						<tr><td colspan="2">--------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>
						<tr>
							<th class="head0">Deduction</th>
							<th class="head1 right">Amount</th>
						</tr>
						<tr><td colspan="2">--------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>
					</thead>
					<tbody>
						<tr>
							<td>CPF Contribution</td>
							<td class="right"><?php echo $salary["Deduction"]["cpf1"]."/-";?></td>
						</tr>
						<?php //if($salary["Salary"]["grade"] < 11){ ?>
						<tr>
							<td>Aditional CPF Contribution</td>
							<td class="right"><?php echo $salary["Deduction"]["cpf2"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["arrear_cpf"]) AND $salary["Deduction"]["arrear_cpf"] != 0){ ?>
						<tr>
							<td>Arrear of CPF</td>
							<td class="right"><?php echo $salary["Deduction"]["arrear_cpf"]."/-";?></td>
						</tr>
						<?php //} if($salary["Salary"]["grade"] == 1){ ?>
						<tr>
							<td>House Rent Deduct</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["house_rent_deduct"])) echo $salary["Deduction"]["house_rent_deduct"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["cpf_loan1"]) AND $salary["Deduction"]["cpf_loan1"] != 0){ ?>
						<tr>
							<td>1st CPF Loan</td>
							<td class="right"><?php echo $salary["Deduction"]["cpf_loan1"]."/-"; ?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["cpf_loan2"]) AND $salary["Deduction"]["cpf_loan2"] != 0){ ?>
						<tr>
							<td>2nd CPF Loan</td>
							<td class="right"><?php echo $salary["Deduction"]["cpf_loan2"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["cpf_interest"]) AND $salary["Deduction"]["cpf_interest"] != 0){ ?>
						<tr>
							<td>Total CPF Interest</td>
							<td class="right"><?php echo $salary["Deduction"]["cpf_interest"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["house_loan"]) AND $salary["Deduction"]["house_loan"] != 0){ ?>
						<tr>
							<td>House Loan</td>
							<td class="right"><?php echo $salary["Deduction"]["house_loan"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["vehicle_loan"]) AND $salary["Deduction"]["vehicle_loan"] != 0){ ?>
						<tr>
							<td>Vehicle Loan</td>
							<td class="right"><?php echo $salary["Deduction"]["vehicle_loan"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["hv_interest"]) AND $salary["Deduction"]["hv_interest"] != 0){ ?>
						<tr>
							<td>Total House & Vehicle Loan Interest</td>
							<td class="right"><?php echo $salary["Deduction"]["hv_interest"]."/-";?></td>
						</tr>
						<?php //} ?>
						<tr>
							<td>Benevolent Fund</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["benevolent_fund"])) echo $salary["Deduction"]["benevolent_fund"]."/-"; else echo "-";?></td>
						</tr>
						<?php //if(!empty($salary["Deduction"]["transport_bill"]) AND $salary["Deduction"]["transport_bill"] != 0){ ?>
						<tr>
							<td>Tranport Bill</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["transport_bill"])) echo $salary["Deduction"]["transport_bill"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["personal_vehicle"]) AND $salary["Deduction"]["personal_vehicle"] != 0){ ?>
						<tr>
							<td>Personal Vehicle Used</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["personal_vehicle"])) echo $salary["Deduction"]["personal_vehicle"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} ?>
						<tr>
							<td>Group Insurance</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["group_insurance"])) echo $salary["Deduction"]["group_insurance"]."/-"; else echo "-";?></td>
						</tr>
						<?php //if(!empty($salary["Deduction"]["w_s"]) AND $salary["Deduction"]["w_s"] != 0){ ?>
						<tr>
							<td>Water & Swerage</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["w_s"])) echo $salary["Deduction"]["w_s"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["fuel"]) AND $salary["Deduction"]["fuel"] != 0){ ?>
						<tr>
							<td>Fuel Cost</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["fuel"])) echo $salary["Deduction"]["fuel"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["phone_bill"]) AND $salary["Deduction"]["phone_bill"] != 0){ ?>
						<tr>
							<td>Telephone Bill</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["phone_bill"])) echo $salary["Deduction"]["phone_bill"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["overdrawn"]) AND $salary["Deduction"]["overdrawn"] != 0){ ?>
						<tr>
							<td>Overdrawn</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["overdrawn"])) echo $salary["Deduction"]["overdrawn"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if($salary["Salary"]["grade"] < 11){ ?>
						<tr>
							<td>Association Subscription</td>
							<td class="right"><?php if(!empty($salary["Deduction"]["association"])) echo $salary["Deduction"]["association"]."/-"; else echo "-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["tax"]) AND $salary["Deduction"]["tax"] != 0){ ?>
						<tr>
							<td>Income TAX</td>
							<td class="right"><?php echo $salary["Deduction"]["tax"]."/-";?></td>
						</tr>
						<?php //} if(!empty($salary["Deduction"]["miscellaneous_deduct"]) AND $salary["Deduction"]["miscellaneous_deduct"] != 0){ ?>
						<tr>
							<td>Miscellaneous</td>
							<td class="right"><?php echo $salary["Deduction"]["miscellaneous_deduct"]."/-";?></td>
						</tr>
						<?php //} ?>
						<tr>
							<td><strong><i>Total Deduction</i></strong></td>
							<td class="right"><strong><i><?php echo $salary["Deduction"]["total_sub"]."/-";?></strong></i></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row-fluid"><div class="span12">==============================================================</div></div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-invoice-full">
					<tbody>
						<tr>
							<td class="left" style="text-align:left; font-size:12px"><strong><?php echo "IN WORD: ".strtoupper($salary["Salary"]["in_word"])." only.";?></strong></td>
							<td class="right" style="text-align:right; font-size:12px">
								<strong>Gross Salary</strong> <br />
								<strong>Total Deduction</strong> <br />
							</td>
							<td class="right" style="text-align:right; font-size:12px">
								<strong>
									<?php echo $salary["Salary"]["total_add"]."/-";?> <br />
									<?php echo $salary["Deduction"]["total_sub"]."/-";?>
								</strong>
							</td>
						</tr>
						<tr>
							<td class="left">&nbsp;</td>
							<td class="right" style="text-align:right; font-size:12px"><strong>Net Payable:</strong></td>
							<td class="right" style="text-align:right; font-size:12px"><strong><?php echo $salary["Salary"]["payable"]."/-";?></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row-fluid"><div class="span12">==============================================================</div></div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-invoice-full">
		      		<tr>
		          		<td colspan="2"><strong>Passed for payment Tk.&nbsp;&nbsp;<?php echo $salary["Salary"]["payable"]."/-";?></strong></td>
		      		</tr>
		      		<tr>
						<td colspan="2"><strong><?php echo "Tk. ".$salary["Salary"]["in_word"]." only.";?></strong></td>
						<td style="width: 1%;">&nbsp;</td>
						<td colspan="2" style="align:center"><img src="<?php echo $this->webroot."img/stamp.jpg"?>"/></td>
					</tr>
					<tr>
						<td style="width: 20%;"><strong>Cheque No:</strong></td>
						<td style="width: 35%;"><strong>-------------------------------------------------</strong></td>
						<td style="width: 1%;">&nbsp;</td>
						<td style="width: 44%; text-align:center">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;"><strong>Date:</strong></td>
						<td style="width: 35%;"><strong>-------------------------------------------------</strong></td>
						<td style="width: 1%;">&nbsp;</td>
						<td colspan="2" style="text-align:center"><strong>---------------------------------------------------</strong></td>
					</tr>
					<tr style="text-align:center">
						<td style="width: 20%;"><strong>Checked By:</strong></td>
						<td style="width: 35%;"><strong>-------------------------------------------------</strong></td>
						<td style="width: 1%;">&nbsp;</td>
						<td style="width:44%; text-align:center"><strong>Signature</strong></td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td style="width: 1%;">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td style="width: 1%;">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td style="width: 1%;">&nbsp;</td>
						<td style="width:44%;">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td style="width: 1%;">&nbsp;</td>
						<td style="width:44%; text-align:center"><strong>---------------------------------------------------------------------------------</strong></td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td style="width: 35%;">&nbsp;</td>
						<td style="width: 1%;">&nbsp;</td>
						<td colspan="2" style="text-align:center"><strong>Signature of Drawing & Disbursing officer (DDO)</strong></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>