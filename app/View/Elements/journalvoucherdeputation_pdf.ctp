<?php
/**
 * @Developed By	:	BARC
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables","admin/toword"));
 ?>
<div class="maincontent">
<div class="contentinner">
<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<div class="span12" style="text-align:center">
        				<!--<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3>
        				<h3>Bangladesh</h3>-->
        			</div><br/>
        			
        		</div>
        	</div><!--span6-->
		</div>
<h4 class="widgettitle" style="text-align:center;"><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> JOURNAL VOUCHER of <?php echo date('F, Y', $curdate); ?> Summery Except C.P.F. (DEPUTATION)</h4>		

<table class="table table-bordered" id="salary" border="1" style="border-collapse:collapse" width="100%">
	<thead>
		<tr>
			<th rowspan="2" style="text-align:center;">Head of Accounts</th>
			<th rowspan="2" style="text-align:center;">Ledger folio No.</th>		
			<th >debit</th>
			<th >credit</th>
		</tr>
		<tr>
			<th >Taka</th>
			<th >Taka</th>
		</tr>
				 
	</thead>
	<tbody>
		<tr>
			<td>Pay of <?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> A/C.</td>
			<td>&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['e_j_v_cpf']  . '.00'; ?></td>
			<td style="text-align:right;">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F.&nbsp;(10%)</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F.&nbsp;(2.5%)</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Arrear C.P.F</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F. Advance 1st</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>	
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F. Advance 2nd</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F. Interest</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Vehicle Loan</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['vehicle_loan'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Vehicle Loan Interest</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['v_interest'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To House Loan</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['house_loan'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To House Loan Interest</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['h_interest'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Benevolent Fund</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['benevolent_fund'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To House Rent Deduct</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['house_rent_deduct'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Transport Bill</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['transport_bill'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Personal Vehicle Use</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['personal_vehicle'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Group Insurance</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['group_insurance'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Overdrawn</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['overdrawn'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Phone Bill</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['phone_bill'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Association Subscription</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['association'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Fuel</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['fuel'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Tax</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['tax'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Miscellaneous Deduct</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['miscellaneous_deduct'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;TOTAL</td>
			<td>&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['e_j_v_cpf'] . '.00'; ?></td>
			<td style="text-align:right;"><?php echo $dep_deductions['e_j_v_cpf']  . '.00'; ?></td>
		</tr>
	</tbody>  
				  
	</table>
	
	Narration:-<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Being the amout deducted from the pay bill of<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($type == 1) echo "Officer"; elseif($type == 2) echo "Staff";?> (BARC), forr the month of <?php echo date('F, Y', $curdate); ?>
	<br><br><br><br><br><br>
	<div style="margin-left:400px;">
	--------------------------------------<br>
	Director (Finance)<br>
	BARC<br>
	</div>
	
<pagebreak />
<div class="row-fluid">
    <div class="span12">
        <div class="invoice_logo">
        	<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        	<div class="span12" style="text-align:center">
        		<!--<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3>
        		<h3>Bangladesh</h3>-->
        	</div><br/>
        			
        </div>
    </div><!--span6-->
</div>
<h4 class="widgettitle" style="text-align:center;"><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> JOURNAL VOUCHER of <?php echo date('F, Y', $curdate); ?> Summery C.P.F. (DEPUTATION)</h4>		

<table class="table table-bordered" id="salary" border="1" style="border-collapse:collapse" width="100%">
	<thead>
		<tr>
			<th rowspan="2" style="text-align:center;">Head of Accounts</th>
			<th rowspan="2" style="text-align:center;">Ledger folio No.</th>		
			<th >debit</th>
			<th >credit</th>
		</tr>
		<tr>
			<th >Taka</th>
			<th >Taka</th>
		</tr>
				 
	</thead>
	<tbody>
		<tr>
			<td>Pay of <?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> A/C.</td>
			<td>&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['j_v_cpf'] . '.00'; ?></td>
			<td style="text-align:right;">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F.&nbsp;(10%)</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['cpf1'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F.&nbsp;(2.5%)</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['cpf2'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Arrear C.P.F</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['arrear_cpf'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F. Advance 1st</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['cpf_loan1'] . '.00';?></td>
		</tr>	
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F. Advance 2nd</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['cpf_loan2'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To C.P.F. Interest</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['cpf_interest'] . '.00';?></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Vehicle Loan</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Vehicle Loan Interest</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To House Loan</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To House Loan Interest</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Benevolent Fund</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To House Rent Deduct</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Transport Bill</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Personal Vehicle Use</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Group Insurance</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Overdrawn</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Phone Bill</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Association Subscription</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Fuel</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Tax</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;To Miscellaneous Deduct</td>
			<td>&nbsp;</td>
			<td style="text-align:right;">&nbsp;</td>
			<td style="text-align:right;"></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;TOTAL</td>
			<td>&nbsp;</td>
			<td style="text-align:right;"><?php echo $dep_deductions['j_v_cpf'] . '.00'; ?></td>
			<td style="text-align:right;"><?php echo $dep_deductions['j_v_cpf'] . '.00'; ?></td>
		</tr>
	</tbody>  
				  
	</table>	
	Narration:-<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Being the amout deducted from the pay bill of<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($type == 1) echo "Officer"; elseif($type == 2) echo "Staff";?> (BARC), forr the month of <?php echo date('F, Y', $curdate); ?>
	<br><br><br><br><br><br>
	<div style="margin-left:400px;">
	--------------------------------------<br>
	Director (Finance)<br>
	BARC<br>
	</div>
	
</div>
</div>	