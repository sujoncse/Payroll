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
	<h1><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?><span> Net Salary Information</span></h1>
</div><!--pagetitle-->

<div class="maincontent">
	<?php if(!empty($salary)){ ?>
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo"><img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
        	</div><!--span6-->
		</div>
    	<div class="clearfix"><br /></div>
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
					<td>Basic Salary</td>
					<td class="right"><?php echo number_format($salary["Salary"]["basic"])."/-";?></td>
					<td><?php if(empty($deputation)) echo "CPF - 1 (8.33%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; ?></td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo number_format($salary["Deduction"]["cpf1"])."/-";?></td>
				</tr>
				<tr>
					<td>Personal Pay</td>
					<td class="right"><?php if(!empty($salary["Salary"]["pp"])) echo number_format($salary["Salary"]["pp"])."/-"; else echo "-";?></td>
					<td><?php if(empty($deputation)) echo "CPF - 2 (2.50%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; ?></td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf2"])) echo number_format($salary["Deduction"]["cpf2"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Dearness Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["dearness"])) echo number_format($salary["Salary"]["dearness"])."/-"; else echo "-";?></td>
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
					<td>Total CPF Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_interest"])) echo number_format($salary["Deduction"]["cpf_interest"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Charge Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["charge"])) echo number_format($salary["Salary"]["charge"])."/-"; else echo "-";?></td>
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
					<td>House Loan Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["h_interest"])) echo number_format($salary["Deduction"]["h_interest"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Domestic Aid</td>
					<td class="right"><?php if(!empty($salary["Salary"]["aid"])) echo number_format($salary["Salary"]["aid"])."/-"; else echo "-";?></td>
					<td>Vehicle Loan Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["v_interest"])) echo number_format($salary["Deduction"]["v_interest"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Sumptuary</td>
					<td class="right"><?php if(!empty($salary["Salary"]["sumptuary"])) echo number_format($salary["Salary"]["sumptuary"])."/-"; else echo "-";?></td>
					<td>Benevolent Fund</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["benevolent_fund"])) echo number_format($salary["Deduction"]["benevolent_fund"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Washing Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["washing"])) echo number_format($salary["Salary"]["washing"])."/-"; else echo "-";?></td>
					<td>Group Insurance</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["group_insurance"])) echo number_format($salary["Deduction"]["group_insurance"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Conveyance Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["conveyance"])) echo number_format($salary["Salary"]["conveyance"])."/-"; else echo "-";?></td>
					<td>House Rent Deduction (<?php if(empty($deputation["Deputation"]["house_rent_deduct"])) echo " 7.5% "; else echo " Fixed ";?>)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["house_rent_deduct"]) AND empty($deputation["Deputation"]["house_rent_deduct"])) echo number_format($salary["Deduction"]["house_rent_deduct"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Tiffin Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["tiffin"])) echo number_format($salary["Salary"]["tiffin"])."/-"; else echo "-";?></td>
					<td>Tranport Bill (Bus Use)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["transport_bill"])) echo number_format($salary["Deduction"]["transport_bill"])."/-"; else echo "-";?></td>
				</tr>
				
				<tr>
					<td>Arrear</td>
					<td class="right"><?php if(!empty($salary["Salary"]["arrear"])) echo number_format($salary["Salary"]["arrear"])."/-"; else echo "-";?></td>
					<td>Personal Vehicle Used</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["personal_vehicle"])) echo number_format($salary["Deduction"]["personal_vehicle"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Miscellaneous</td>
					<td class="right"><?php if(!empty($salary["Salary"]["miscellaneous"])) echo number_format($salary["Salary"]["miscellaneous"])."/-"; else echo "-";?></td>
					<td>Water &amp; Swerage</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["w_s"])) echo number_format($salary["Deduction"]["w_s"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Fractional Increment</td>
					<td class="right"><?php if(!empty($salary["Salary"]["fraction_increment"])) echo number_format($salary["Salary"]["fraction_increment"])."/-"; else echo "-";?></td>
					<td>Gas Cost</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["fuel"])) echo number_format($salary["Deduction"]["fuel"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Overdrawn</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["overdrawn"])) echo number_format($salary["Deduction"]["overdrawn"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Telephone Bill</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["phone_bill"])) echo number_format($salary["Deduction"]["phone_bill"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Officer's Subscription Fee</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["association"])) echo number_format($salary["Deduction"]["association"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Income TAX (Optional)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["tax"])) echo number_format($salary["Deduction"]["tax"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Miscellaneous Deduction</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["miscellaneous_deduct"])) echo number_format($salary["Deduction"]["miscellaneous_deduct"])."/-"; else echo "-";?></td>
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
							<?php echo number_format($salary["Salary"]["total_add"])."/-";?> <br />
							<?php echo number_format($salary["Deduction"]["total_sub"])."/-";?> <br />
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="amountdue">
			<h1><span>Net Payable:</span> <?php echo number_format($salary["Salary"]["payable"])."/-";?></h1> <br />
			<a href="<?php echo $this->webroot."reportManagements/payablePdf/".$type."/Payable_".date('F, Y').".pdf"; ?>" class="btn btn-primary btn-large">PDF</a>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>
	<?php } ?>
</div>