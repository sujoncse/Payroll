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
 $festivals = Configure::read("festivals");
 ?>
<div class="pagetitle">
	<h1><?php if($type == 1) echo "Officer's"; else echo "Staff's";?><span> Festival Bonus for <?php echo $festivals[$fa["FestivalAllowance"]["festival"]]; ?> </span></h1>
</div><!--pagetitle-->
<div class="maincontent">
	<?php if(!empty($fa)){ ?>
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
	          					if(!empty($fa["Employee"]["middle_name"])) 
	          						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["middle_name"]." ".$fa["Employee"]["last_name"];
	          					else
	          						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["last_name"];
	          					echo $name;
	          				?>
	          				</strong>
	          			</td>
              		</tr>
					<tr>
						<td>Designation:</td>
						<td><?php echo $designations[$fa["FestivalAllowance"]["designation_id"]]; if($fa["Salary"]["status"] == 4) echo " (AC)"; elseif($fa["Salary"]["status"] == 5) echo " (CC)";?></td>
					</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $fa["Employee"]["employee_code"];?></td>
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
						<td class="width70"><?php echo $fa["EmployeePersonal"]["bank"]." <strong>[".$fa["EmployeePersonal"]["account"]."]";?></strong></td>
					</tr>
					<tr>
						<td>E-TIN:</td>
						<td> <?php echo $fa["EmployeePersonal"]["etin"]; ?></td>
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
					<td class="right"><?php echo number_format($fa["FestivalAllowance"]["basic"])."/-";?></td>
					<td><?php if(empty($deputation)) echo "CPF - 1 (8.33%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 1 (".$deputation["Deputation"]["percentage"]."%)"; ?></td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Personal Pay</td>
					<td class="right"><?php echo "-";?></td>
					<td><?php if(empty($deputation)) echo "CPF - 2 (2.50%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 1) echo "CPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; elseif(!empty($deputation) AND $deputation["Deputation"]["ctype"] == 2) echo "GPF - 2 (".$deputation["Deputation"]["percentage2"]."%)"; ?></td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Dearness Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>1st CPF Loan</td>
					<?php 
						if(!empty($loans)){
						foreach($loans as $loan){
							if($loan["Loan"]["type"] == 1){
					?>
					<td class="right"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td class="right"><i><?php echo "-";?></i></td>
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
					<td class="right"><?php echo "-"; ?></td>
				</tr>
				<tr>
					<td>House Rent</td>
					<td class="right"><?php echo "-";?></td>
					<td>2nd CPF Loan</td>
					<?php 
						if(!empty($loans)){
						foreach($loans as $loan){
							if($loan["Loan"]["type"] == 2){
					?>
					<td class="right"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td class="right"><i><?php echo "-";?></i></td>
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
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Medical Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>Total CPF Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Charge Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>House Loan</td>
					<?php 
						if(!empty($loans)){
						foreach($loans as $loan){
							if($loan["Loan"]["type"] == 3){
					?>
					<td class="right"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td class="right"><i><?php "-";?></i></td>
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
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Children Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>Vehicle Loan</td>
					<?php 
						if(!empty($loans)){
						foreach($loans as $loan){
							if($loan["Loan"]["type"] == 4){
					?>
					<td class="right"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td style="text-align:center"><i><?php echo "-";?></i></td>
					<td class="right"><i><?php echo "-";?></i></td>
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
					<td class="right"><?php echo "-";?></td>
				</tr>
				
				<tr>
					<td>Deputation Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>House Loan Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Domestic Aid</td>
					<td class="right"><?php echo "-";?></td>
					<td>Vehicle Loan Interest</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Sumptuary</td>
					<td class="right"><?php echo "-";?></td>
					<td>Benevolent Fund</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Washing Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>Group Insurance</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Conveyance Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>House Rent Deduction (<?php if(empty($deputation["Deputation"]["house_rent_deduct"])) echo " 7.5% "; else echo " Fixed ";?>)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Tiffin Allowance</td>
					<td class="right"><?php echo "-";?></td>
					<td>Tranport Bill (Bus Use)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				
				<tr>
					<td>Arrear</td>
					<td class="right"><?php echo "-";?></td>
					<td>Personal Vehicle Used</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Miscellaneous</td>
					<td class="right"><?php echo "-";?></td>
					<td>Water &amp; Swerage</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>Fractional Increment</td>
					<td class="right"><?php echo "-";?></td>
					<td>Gas Cost</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Overdrawn</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Telephone Bill</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Officer's Subscription Fee</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Income TAX (Optional)</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Miscellaneous Deduction</td>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td class="right"><?php echo "-";?></td>
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
						<h3><?php echo "IN WORD: ";?></h3><?php echo strtoupper($fa["FestivalAllowance"]["in_word"]);?>
					</td>
					<td class="right">
						<strong>Gross Allowance</strong> <br />
						<strong>Total Deduction</strong> <br />
					</td>
					<td class="right">
						<strong>
							<?php echo number_format($fa["FestivalAllowance"]["payable"])."/-";?> <br />
							<?php echo "0.00/-";?> <br />
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="amountdue">
			<h1><span>Net Payable:</span> <?php echo number_format($fa["FestivalAllowance"]["payable"])."/-";?></h1> <br />
			<?php $next = $fa["FestivalAllowance"]["id"]+1;?>
			<a href="<?php echo $this->webroot."salaryManagements/detailFaPdf/".$fa["FestivalAllowance"]["id"]."/".str_replace(" ","_",strtoupper($name))."_Festival_Allowance.pdf"; ?>" class="btn btn-primary btn-large">PDF</a>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>
	<?php }else{ ?>
	<!--<div class="contentinner">
		<div class="amountdue">
			<a onclick="history.back()" class="btn btn-primary btn-large">Previous Allowance</a>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>-->
	<?php } ?>
</div>