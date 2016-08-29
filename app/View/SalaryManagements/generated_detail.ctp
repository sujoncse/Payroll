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
 
 $i = 1;
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
                  		<td class="width30">Name:</td>
                  		<td class="width70">
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
              		</tr>
					<tr>
						<td>Designation:</td>
						<td><?php echo $designations[$salary["GeneratedSalary"]["designation_id"]]; if($salary["GeneratedSalary"]["status"] == 4) echo " (AC)"; elseif($salary["GeneratedSalary"]["status"] == 5) echo " (CC)";?></td>
					</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $salary["Employee"]["employee_code"];?></td>
					</tr>
					<tr>
						<td>Month:</td>
						<td> <?php echo date('F, Y',$exTime); ?></td>
					</tr>
				</table>
			</div>
			<div class="span5">
				<table class="table table-bordered table-invoice">
					<tr>
						<td class="width30">Status:</td>
						<td class="width70"><strong>Revenue - BARC</strong></td>
					</tr>
					<tr>
						<td class="width30">Pay Scale</td>
						<?php $scales= explode('-',$payScale["scale"]);?>
						<td class="width70"><strong><?php echo $scales[0] .'-'. $scales[count($scales) -1]; ?></strong></td>
					</tr>
					<tr>
						<td class="width30">Bank A/C</td>
						<td class="width70"><?php echo $salary["EmployeePersonal"]["bank"]." <strong>[".$salary["EmployeePersonal"]["account"]."]";?></strong></td>
					</tr>
					<tr>
						<td>E-TIN:</td>
						<td> <?php echo $salary["EmployeePersonal"]["etin"]; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="clearfix"><br /></div>
		<table class="table table-bordered table-invoice-full">
			<colgroup>
				<col class="con0 width25" />
				<col class="con1 width25" />
				<col class="con0 width10" />
				<col class="con1 width10" />
				<col class="con0 width5" />
				<col class="con1 width5" />
				<col class="con0 width10" />
				<col class="con1 width10" />
			</colgroup>
			<thead>
				<tr>
					<th class="head0" style="text-align:center">Payable</th>
					<th class="head1" style="text-align:center">Amount</th>
					<th class="head0" style="text-align:center">Deduction</th>
					<th class="head1" style="text-align:center">Loan</th>
					<th class="head0" style="text-align:center">Total Installment</th>
					<th class="head1" style="text-align:center">Paid Installment</th>
					<th class="head0" style="text-align:center">Balance</th>
					<th class="head1" style="text-align:center">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Basic Salary</td>
					<td class="right"><?php echo number_format($salary["GeneratedSalary"]["basic"])."/-";?></td>
					<td><?php if(empty($deputation)) echo "CPF - 1 (10%)"; elseif(!empty($deputation) AND $deputatoin["Deputation"]["ctype"] == 1) echo "CPF - 1 ".$deputation["Deputation"]["percentage"]."%"; elseif(!empty($deputation) AND $deputatoin["Deputation"]["ctype"] == 2) echo "GPF - 1 ".$deputation["Deputation"]["percentage"]."%"; ?></td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo number_format($salary["GeneratedDeduction"]["cpf1"])."/-";?></td>
				</tr>
				<tr>
					<td>Personal Pay</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["pp"])) echo number_format($salary["GeneratedSalary"]["pp"])."/-"; else echo "-";?></td>
					<td><?php if(empty($deputation)) echo "CPF - 2 (2.50%)"; elseif(!empty($deputation) AND $deputatoin["Deputation"]["ctype"] == 1) echo "CPF - 2 ".$deputation["Deputation"]["percentage2"]."%"; elseif(!empty($deputation) AND $deputatoin["Deputation"]["ctype"] == 2) echo "GPF - 2 ".$deputation["Deputation"]["percentage2"]."%"; ?></td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf2"])) echo number_format($salary["GeneratedDeduction"]["cpf2"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Dearness Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["dearness"])) echo number_format($salary["GeneratedSalary"]["dearness"])."/-"; else echo "-";?></td>
					<td>CPF Loan - 1</td>
					<?php 
						if(!empty($loans)){
						$i = 0;
						foreach($loans as $loan){
							$p_installment = $loan["Refund"]["paid_interest_installment"];
							if($loan["Loan"]["type"] == 3){}
							elseif($loan["Loan"]["type"] == 2){}
							elseif($loan["Loan"]["type"] == 4){}
							elseif( ($loan["Loan"]["type"] == 1 && $loan["Loan"]["status"] == 1) && ($loan["Refund"]["paid_interest_installment"] <= 0)){ $i++;
					?>
					<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
					<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
					<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
					<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
					<?php }
						elseif($loan["Loan"]["type"] == 1){ $i++;
						?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
						<?php	
						}
						else{ ?>
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
					<?php 
					if($i==0){
					?>
						<td class="right">-</td>
						<td style="text-align:center">-</td>
						<td style="text-align:center">-</td>
						<td class="right">-</td>
					<?php	
					}
					?>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan1"]) && $p_installment <=0) echo number_format($salary["GeneratedDeduction"]["cpf_loan1"])."/-"; else echo "-"; ?></td>	
				</tr>
				<tr>
					<td>House Rent</td>
					<td class="right"><?php echo number_format($salary["GeneratedSalary"]["house_rent"])."/-";?></td>
					<td>CPF Loan - 2</td>
					<?php 
						if(!empty($loans)){
						$i = 0;	
						foreach($loans as $loan){
							$p_installment = $loan["Refund"]["paid_interest_installment"];
							if($loan["Loan"]["type"] == 1){}
							elseif($loan["Loan"]["type"] == 3){}
							elseif($loan["Loan"]["type"] == 4){}
							elseif(($loan["Loan"]["type"] == 2 && $loan["Loan"]["status"] == 1) && ($loan["Refund"]["paid_interest_installment"] <= 0)){ $i++;
					?>
					<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
					<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
					<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
					<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
					<?php }
						elseif($loan["Loan"]["type"] == 2){ $i++;
						?>
							<td class="right">-</td>
							<td style="text-align:center">-</td>
							<td style="text-align:center">-</td>
							<td class="right">-</td>
						<?php	
						}
						else{ ?>
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
					<?php
					if($i==0){
					?>
						<td class="right">-</td>
						<td style="text-align:center">-</td>
						<td style="text-align:center">-</td>
						<td class="right">-</td>
					<?php	
					}
					?>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan2"]) && $p_installment <=0) echo number_format($salary["GeneratedDeduction"]["cpf_loan2"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Medical Allowance</td>
					<td class="right"><?php echo number_format($salary["GeneratedSalary"]["medical"])."/-";?></td>
					<td>Total CPF Interest</td>
					<?php 
						if(!empty($loans)){ 
							$i = 0;	
							foreach($loans as $loan){
								$p_installment = $loan["Refund"]["paid_interest_installment"];
								if(($loan["Loan"]["type"] == 1) && ($p_installment >= 1) &&($loan["Loan"]["interest_installment"] != $p_installment) && ($loan["Loan"]["status"] == 1)){ $i++;
									?><td class="right"><?php echo $loan["Loan"]["total_interest"] .'-/';?></td><td style="text-align:center"><?php echo $loan["Loan"]["interest_installment"]; ?></td><td style="text-align:center" ><?php echo $loan["Refund"]["paid_interest_installment"];?></td><td class="right"><?php echo $loan["Refund"]["interest_balance"] .'-/';?></td><?php
								}
								elseif(($loan["Loan"]["type"] == 2) && ($p_installment >= 1) &&($loan["Loan"]["interest_installment"] != $p_installment ) && ($loan["Loan"]["status"] == 1)){ $i++;
									?><td class="right"><?php echo $loan["Loan"]["total_interest"] .'-/';?></td><td style="text-align:center"><?php echo $loan["Loan"]["interest_installment"]; ?></td><td style="text-align:center" ><?php echo $loan["Refund"]["paid_interest_installment"];?></td><td class="right"><?php echo $loan["Refund"]["interest_balance"] .'-/';?></td><?php
								}
								elseif(($loan["Loan"]["type"] == 3) && ($loan["Loan"]["status"] == 1) ){ $i++;
									?><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><?php
								}
								elseif(($loan["Loan"]["type"] == 4) && ($loan["Loan"]["status"] == 1)) { $i++;
									?><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><?php
								}
								else{
									
								}
							}
						}	
					?>
					<?php
					if($i==0){
						?><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><?php
					}
					?>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan1"]) && ($p_installment >=1)) { echo number_format($salary["GeneratedDeduction"]["cpf_loan1"])."/-"; }
											elseif(!empty($salary["GeneratedDeduction"]["cpf_loan2"]) && ($p_installment >=1)) { echo number_format($salary["GeneratedDeduction"]["cpf_loan2"])."/-"; }
											else{ echo "-"; }?></td>
				</tr>
				<tr>
					<td>Charge Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["charge"])) echo number_format($salary["GeneratedSalary"]["charge"])."/-"; else echo "-";?></td>
					<td>House Loan</td>
					<?php //pr($loans);
						if(!empty($loans)){
						$i = 0;	
						foreach($loans as $loan){
							if($loan["Loan"]["type"] == 1){}
							elseif($loan["Loan"]["type"] == 2){}
							elseif($loan["Loan"]["type"] == 4){}
							elseif($loan["Loan"]["type"] == 3){ $i++;
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
					<?php
					if($i==0){
					?>
						<td class="right">-</td>
						<td style="text-align:center">-</td>
						<td style="text-align:center">-</td>
						<td class="right">-</td>
					<?php	
					}
					?>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["house_loan"])) echo number_format($salary["GeneratedDeduction"]["house_loan"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Children Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["edu"])) echo number_format($salary["GeneratedSalary"]["edu"])."/-"; else echo "-";?></td>
					<td>Vehicle Loan</td>
					<?php 
						if(!empty($loans)){
							$i=0;
						foreach($loans as $loan){
							if($loan["Loan"]["type"] == 1){}
							elseif($loan["Loan"]["type"] == 2){}
							elseif($loan["Loan"]["type"] == 3){}
							elseif($loan["Loan"]["type"] == 4){ $i++;
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
					<?php
					if($i==0){
					?>
						<td class="right">-</td>
						<td style="text-align:center">-</td>
						<td style="text-align:center">-</td>
						<td class="right">-</td>
					<?php	
					}
					?>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["vehicle_loan"])) echo number_format($salary["GeneratedDeduction"]["vehicle_loan"])."/-"; else echo "-";?></td>
				</tr>
				
				<tr>
					<td>Deputation Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["deputation"])) echo number_format($salary["GeneratedSalary"]["deputation"])."/-"; else echo "-";?></td>
					<td>House Loan Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["h_interest"])) echo number_format($salary["GeneratedDeduction"]["h_interest"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<!--<td>Domestic Aid</td>
					<td class="right"><?php //if(!empty($salary["GeneratedSalary"]["aid"])) echo number_format($salary["GeneratedSalary"]["aid"])."/-"; else echo "-";?></td>-->
					<td>Domestic Aid Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["fraction_increment"])) echo number_format($salary["GeneratedSalary"]["fraction_increment"])."/-"; else echo "-";?></td>
					
					<td>Vehicle Loan Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["v_interest"])) echo number_format($salary["GeneratedDeduction"]["v_interest"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Sumptuary</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["sumptuary"])) echo number_format($salary["GeneratedSalary"]["sumptuary"])."/-"; else echo "-";?></td>
					<td>Benevolent Fund</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["benevolent_fund"])) echo number_format($salary["GeneratedDeduction"]["benevolent_fund"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Washing Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["washing"])) echo number_format($salary["GeneratedSalary"]["washing"])."/-"; else echo "-";?></td>
					<td>Group Insurance</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["group_insurance"])) echo number_format($salary["GeneratedDeduction"]["group_insurance"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Conveyance Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["conveyance"])) echo number_format($salary["GeneratedSalary"]["conveyance"])."/-"; else echo "-";?></td>
					<td>House Rent Deduction</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["house_rent_deduct"])) echo number_format($salary["GeneratedDeduction"]["house_rent_deduct"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Tiffin Allowance</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["tiffin"])) echo number_format($salary["GeneratedSalary"]["tiffin"])."/-"; else echo "-";?></td>
					<td>Tranport Bill (Bus Use)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["transport_bill"])) echo number_format($salary["GeneratedDeduction"]["transport_bill"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Arrear</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["arrear"])) echo number_format($salary["GeneratedSalary"]["arrear"])."/-"; else echo "-";?></td>
					<td>Personal Vehicle Used</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["personal_vehicle"])) echo number_format($salary["GeneratedDeduction"]["personal_vehicle"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Miscellaneous</td>
					<td class="right"><?php if(!empty($salary["GeneratedSalary"]["miscellaneous"])) echo number_format($salary["GeneratedSalary"]["miscellaneous"])."/-"; else echo "-";?></td>
					<td>One day Salary</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["w_s"])) echo number_format($salary["GeneratedDeduction"]["w_s"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Land Use</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["fuel"])) echo number_format($salary["GeneratedDeduction"]["fuel"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Overdrawn</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["overdrawn"])) echo number_format($salary["GeneratedDeduction"]["overdrawn"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Telephone Bill</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["phone_bill"])) echo number_format($salary["GeneratedDeduction"]["phone_bill"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Officer's Subscription Fee</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["association"])) echo number_format($salary["GeneratedDeduction"]["association"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Income TAX (Optional)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["tax"])) echo number_format($salary["GeneratedDeduction"]["tax"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Miscellaneous Deduction</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["miscellaneous_deduct"])) echo number_format($salary["GeneratedDeduction"]["miscellaneous_deduct"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Arrear CPF </td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["GeneratedDeduction"]["arrear_cpf"])) echo number_format($salary["GeneratedDeduction"]["arrear_cpf"])."/-"; else echo "-";?></td>
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
						<h3><?php echo "IN WORD: ";?></h3><?php echo strtoupper($salary["GeneratedSalary"]["in_word"]);?>
					</td>
					<td class="right">
						<strong>Gross Salary</strong> <br />
						<strong>Total Deduction</strong> <br />
					</td>
					<td class="right">
						<strong>
							<?php echo number_format($salary["GeneratedSalary"]["total_add"])."/-";?> <br />
							<?php echo number_format($salary["GeneratedDeduction"]["total_sub"])."/-";?> <br />
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="amountdue">
			<h1><span>Net Payable:</span> <?php echo number_format($salary["GeneratedSalary"]["payable"])."/-";?></h1> <br />
			<?php $next = $salary["GeneratedSalary"]["id"]+1;?>
			<a onclick="history.back()" class="btn btn-primary btn-large">Back</a>
			<a href="<?php echo $this->webroot."salaryManagements/generatedDetail/".$next; ?>" class="btn btn-primary btn-large">Next Pay Slip</a>
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