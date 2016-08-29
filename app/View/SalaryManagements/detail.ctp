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
	<h1><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?><span> Pay Slip </span></h1>
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
						<td><?php echo $designations[$salary["Salary"]["designation_id"]]; if($salary["Salary"]["status"] == 4) echo " (AC)"; elseif($salary["Salary"]["status"] == 5) echo " (CC)";?></td>
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
					<td class="right"><?php echo number_format($salary["Salary"]["basic"])."/-";?></td>
					<td><?php if(empty($deputation)) echo "CPF - 1 (10%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; ?></td>
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
						//pr($loans);
						if(!empty($loans)){
						$i = 0;
						foreach($loans as $loan){ 
							$p_installment = $loan["Refund"]["paid_interest_installment"];
							if($loan["Loan"]["type"] == 3 ){}
							elseif($loan["Loan"]["type"] == 2 ){}
							elseif($loan["Loan"]["type"] == 4 ){}
							elseif(($loan["Loan"]["type"] == 1 && $loan["Loan"]["status"] == 1) && ($loan["Refund"]["paid_interest_installment"] <= 0) ){ $i++; 
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
						else{ $i++; ?>
					<td class="right">-</td>
					<td style="text-align:center">-2</td>
					<td style="text-align:center">-</td>
					<td class="right">-</td>
					<?php } } }else{ ?>
					<td class="right">-</td>
					<td style="text-align:center">-3</td>
					<td style="text-align:center">-</td>
					<td class="right">-</td>
					<?php } ?>
					<?php 
					if($i==0){
					?>
						<td class="right">-4</td>
						<td style="text-align:center">-</td>
						<td style="text-align:center">-</td>
						<td class="right">-</td>
					<?php	
					}
					?>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan1"]) && $p_installment <=0 ) echo number_format($salary["Deduction"]["cpf_loan1"])."/-"; else echo "-"; ?></td>
				</tr>
				<tr>
					<td>House Rent</td>
					<td class="right"><?php echo number_format($salary["Salary"]["house_rent"])."/-";?></td>
					<td>2nd CPF Loan</td>
					<?php 
						if(!empty($loans)){
						$i = 0;	
						foreach($loans as $loan){
							$p_installment = $loan["Refund"]["paid_interest_installment"];
							if(($loan["Loan"]["type"] == 2 && $loan["Loan"]["status"] == 1) && ($loan["Refund"]["paid_interest_installment"] <= 0)){ $i++;
							?>
							<td class="right"><i><?php echo number_format($loan["Loan"]["total"])."/-";?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Loan"]["total_installment"]);?></i></td>
							<td style="text-align:center"><i><?php echo number_format($loan["Refund"]["paid_installment"]);?></i></td>
							<td class="right"><i><?php echo number_format($loan["Refund"]["balance"])."/-";?></i></td>
							<?php }
							elseif($loan["Loan"]["type"] == 1){}
							elseif($loan["Loan"]["type"] == 3 ){}
							elseif($loan["Loan"]["type"] == 4){}
							
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
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan2"]) && $p_installment <=0) echo number_format($salary["Deduction"]["cpf_loan2"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Medical Allowance</td>
					<td class="right"><?php echo number_format($salary["Salary"]["medical"])."/-";?></td>
					<td>Total CPF Interest</td>
					<?php 
						if(!empty($loans)){ 
							$i = 0;	
							foreach($loans as $loan){
								$p_installment = $loan["Refund"]["paid_interest_installment"];
								if(($loan["Loan"]["type"] == 1) && ($p_installment >= 1) &&($loan["Loan"]["interest_installment"] != $p_installment) ){ $i++;
									?><td class="right"><?php echo $loan["Loan"]["total_interest"] .'-/';?></td><td style="text-align:center"><?php echo $loan["Loan"]["interest_installment"]; ?></td><td style="text-align:center" ><?php echo $loan["Refund"]["paid_interest_installment"];?></td><td class="right"><?php echo $loan["Refund"]["interest_balance"] .'-/';?></td><?php
								}
								elseif(($loan["Loan"]["type"] == 2) && ($p_installment >= 1) &&($loan["Loan"]["interest_installment"] != $p_installment) ){ $i++;
									?><td class="right"><?php echo $loan["Loan"]["total_interest"] .'-/';?></td><td style="text-align:center"><?php echo $loan["Loan"]["interest_installment"]; ?></td><td style="text-align:center" ><?php echo $loan["Refund"]["paid_interest_installment"];?></td><td class="right"><?php echo $loan["Refund"]["interest_balance"] .'-/';?></td><?php
								}
								elseif($loan["Loan"]["type"] == 3){ $i++;
									?><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><?php
								}
								elseif($loan["Loan"]["type"] == 4){ $i++;
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
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan1"]) && ($p_installment >=1)) { echo number_format($salary["Deduction"]["cpf_loan1"])."/-"; }
											elseif(!empty($salary["Deduction"]["cpf_loan2"]) && ($p_installment >=1)) { echo number_format($salary["Deduction"]["cpf_loan2"])."/-"; }
											else{ echo "-"; }?></td>
				</tr>
				<tr>
					<td>Charge Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["charge"])) echo number_format($salary["Salary"]["charge"])."/-"; else echo "-";?></td>
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
					<td class="right"><?php if(!empty($salary["Deduction"]["house_loan"])) echo number_format($salary["Deduction"]["house_loan"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>Children Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["edu"])) echo number_format($salary["Salary"]["edu"])."/-"; else echo "-";?></td>
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
					<!--<td>Domestic Aid</td>
					<td class="right"><?php //if(!empty($salary["Salary"]["aid"])) echo number_format($salary["Salary"]["aid"])."/-"; else echo "-";?></td>-->
					<td>Domestic Aid Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["fraction_increment"])) echo number_format($salary["Salary"]["fraction_increment"])."/-"; else echo "-";?></td>
					
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
					<td>One day Salary</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["w_s"])) echo number_format($salary["Deduction"]["w_s"])."/-"; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Land Use</td>
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
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Arrear CPF </td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["arrear_cpf"])) echo number_format($salary["Deduction"]["arrear_cpf"])."/-"; else echo "-";?></td>
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
			<?php $next = $salary["Salary"]["id"]+1;?>
			<a href="<?php echo $this->webroot."salaryManagements/detail/".$next; ?>" class="btn btn-primary btn-large">Next Pay Slip</a>
			<a href="<?php echo $this->webroot."salaryManagements/editSalary/".$type."/".$salary["Salary"]["id"]; ?>" class="btn btn-primary btn-large">Update</a>
			<a href="<?php echo $this->webroot."salaryManagements/detailPdf/".$salary["Salary"]["id"]."/".str_replace(" ","_",strtoupper($name)).".pdf"; ?>" class="btn btn-primary btn-large">PDF</a>
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