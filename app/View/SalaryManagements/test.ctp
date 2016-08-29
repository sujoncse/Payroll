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
<div class="pagetitle">
	<h1>Officer's  <span> Pay Slip </span></h1>
</div><!--pagetitle-->

<div class="maincontent">
	<?php if(!empty($salary)){ ?>
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo"><img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
        	</div><!--span6-->
    		<div class="span6">
				<table class="table table-bordered table-invoice">
              		<tr>
                  		<td class="width30">Pay Sleep For:</td>
                  		<td class="width70">
                  			<strong>
                  			<?php 
	          					if(!empty($salary["Employee"]["middle_name"])) 
	          						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
	          					else
	          						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
	          				?>
	          				</strong>
	          			</td>
              		</tr>
					<tr>
						<td>Designation:</td>
						<td><?php echo $designations[$salary["Salary"]["designation_id"]];?></td>
					</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $salary["Employee"]["employee_code"];?></td>
					</tr>
					<tr>
						<td>For the month of:</td>
						<td> <?php echo date('F, Y', strtotime(date('Y-m')." -1 month")); ?></td>
					</tr>
				</table>
			</div>
			<div class="span5">
				<table class="table table-bordered table-invoice">
					<tr>
						<td class="width30">From:</td>
						<td class="width70"><strong>New Airport Road, Farmgate, Dhaka - 1215</strong></td>
					</tr>
					<tr>
						<td class="width30">Pay Slip #</td>
						<td class="width70"><strong><?php echo $salary["Salary"]["id"];?></strong></td>
					</tr>
					<tr>
						<td class="width30">Pay Scale</td>
						<td class="width70"><strong><?php echo $payScale["scale"]," - ".$payScale["increment"]." X ".$payScale["increment_iteration"]; if($payScale["eb"] > 0) echo " - EB - ".$payScale["eb"]." X ".$payScale["eb_iteration"];?></strong></td>
					</tr>
					<tr>
						<td>Issue Date:</td>
						<td> <?php echo date('d F, Y'); ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="clearfix"><br /></div>
		<table class="table table-bordered table-invoice-full">
			<colgroup>
				<col class="con0 width25" />
				<col class="con1 width25" />
				<col class="con0 width25" />
				<col class="con1 width25" />
			</colgroup>
			<thead>
				<tr>
					<th class="head0">Payable</th>
					<th class="head1">Amount</th>
					<th class="head0 right">Deduction</th>
					<th class="head1 right">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Basic Salary</td>
					<td class="right"><?php echo $salary["Salary"]["basic"];?></td>
					<td>CPF Contribution</td>
					<td class="right"><?php echo $salary["Deduction"]["cpf1"];?></td>
				</tr>
				<tr>
					<td>House Rent</td>
					<td class="right"><?php echo $salary["Salary"]["house_rent"];?></td>
					<td>Aditional CPF Contribution</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf2"])) echo $salary["Deduction"]["cpf2"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Medical Allowance</td>
					<td class="right"><?php echo $salary["Salary"]["medical"];?></td>
					<td>1st CPF Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan1"])) echo $salary["Deduction"]["cpf_loan1"]; else echo "-"; ?></td>
				</tr>
				<tr>
					<td>Personal Pay</td>
					<td class="right"><?php if(!empty($salary["Salary"]["pp"])) echo $salary["Salary"]["pp"]; else echo "-";?></td>
					<td>2nd CPF Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan2"])) echo $salary["Deduction"]["cpf_loan2"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Educational Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["edu"])) echo $salary["Salary"]["edu"]; else echo "-";?></td>
					<td>House Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["house_loan"])) echo $salary["Deduction"]["house_loan"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Charge Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["charge"])) echo $salary["Salary"]["charge"]; else echo "-";?></td>
					<td>Vehicle Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["vehicle_loan"])) echo $salary["Deduction"]["vehicle_loan"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Dearness Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["dearness"])) echo $salary["Salary"]["dearness"]; else echo "-";?></td>
					<td>Total CPF Interest</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_interest"])) echo $salary["Deduction"]["cpf_interest"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Conveyance Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["conveyance"])) echo $salary["Salary"]["conveyance"]; else echo "-";?></td>
					<td>Total House & Vehicle Loan Interest</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["hv_interest"])) echo $salary["Deduction"]["hv_interest"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Tiffin Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["tiffin"])) echo $salary["Salary"]["tiffin"]; else echo "-";?></td>
					<td>Benevolent Fund</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["benevolent_fund"])) echo $salary["Deduction"]["benevolent_fund"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>House Rent Deduct</td>
					<td class="right"><?php if(!empty($salary["Salary"]["washing"])) echo $salary["Salary"]["washing"]; else echo "-";?></td>
					<td>CPF Contribution</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["house_rent_deduct"])) echo $salary["Deduction"]["house_rent_deduct"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Deputation Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["deputation"])) echo $salary["Salary"]["deputation"]; else echo "-";?></td>
					<td>Tranport Bill</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["transport_bill"])) echo $salary["Deduction"]["transport_bill"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Domestic Aid</td>
					<td class="right"><?php if(!empty($salary["Salary"]["aid"])) echo $salary["Salary"]["aid"]; else echo "-";?></td>
					<td>Personal Vehicle Used</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["personal_vehicle"])) echo $salary["Deduction"]["personal_vehicle"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Sumptuary</td>
					<td class="right"><?php if(!empty($salary["Salary"]["sumptuary"])) echo $salary["Salary"]["sumptuary"]; else echo "-";?></td>
					<td>Group Insurance</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["group_insurance"])) echo $salary["Deduction"]["group_insurance"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Arrear</td>
					<td class="right"><?php if(!empty($salary["Salary"]["arrear"])) echo $salary["Salary"]["arrear"]; else echo "-";?></td>
					<td>Water & Swerage</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["w_s"])) echo $salary["Deduction"]["w_s"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Miscellaneous</td>
					<td class="right"><?php if(!empty($salary["Salary"]["miscellaneous"])) echo $salary["Salary"]["miscellaneous"]; else echo "-";?></td>
					<td>Fuel Cost</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["fuel"])) echo $salary["Deduction"]["fuel"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Fractional Increment</td>
					<td class="right"><?php if(!empty($salary["Salary"]["fraction_increment"])) echo $salary["Salary"]["fraction_increment"]; else echo "-";?></td>
					<td>Overdrawn</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["overdrawn"])) echo $salary["Deduction"]["overdrawn"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Telephone Bill</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["phone_bill"])) echo $salary["Deduction"]["phone_bill"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Income TAX</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["association"])) echo $salary["Deduction"]["association"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Income TAX</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["tax"])) echo $salary["Deduction"]["tax"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Miscellaneous</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["miscellaneous_deduct"])) echo $salary["Deduction"]["miscellaneous_deduct"]; else echo "-";?></td>
				</tr>
			</tbody>
		</table>
		<table class="table invoice-table">
			<colgroup>
				<col class="con0 width60" />
				<col class="con0 width20" />
				<col class="con1 width20" />
			</colgroup>
			<tbody>
				<tr>
					<td class="msg-invoice">
						<h3><?php echo "IN WORD: ";?></h3><?php echo strtoupper($salary["Salary"]["in_word"]);?>
					</td>
					<td class="right">
						<strong>Gross Salary</strong> <br />
						<strong>Total Deduction</strong> <br />
					</td>
					<td class="right">
						<strong>
							<?php echo $salary["Salary"]["total_add"];?> <br />
							<?php echo $salary["Deduction"]["total_sub"];?> <br />
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="amountdue">
			<h1><span>Net Payable:</span> <?php echo $salary["Salary"]["payable"];?></h1> <br />
			<?php $next = $salary["Salary"]["id"]+1;?>
			<a href="<?php echo $this->webroot."salaryManagements/detail/".$next; ?>" class="btn btn-primary btn-large">Next Pay Slip</a>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>
	<?php }else{ ?>
	<div class="contentinner">
		<div class="amountdue">
			<a onclick="history.back()" class="btn btn-primary btn-large">Previous Pay Slip</a>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>
	<?php } ?>
</div>