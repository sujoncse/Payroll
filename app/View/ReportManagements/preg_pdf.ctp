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
<div class="maincontent">
	<?php if(!empty($salaries)){ ?>
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<div class="span12" style="text-align:center">
        				<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3>
        				<h3>Bangladesh</h3>
        			</div><br/>
        			<div class="span12" style="text-align:center"><h3>Payroll Register For the Financial Year: <?php echo date("F, Y",$start)." - ".date("F, Y",$end); ?></h3></div>
        		</div>
        	</div><!--span6-->
		</div>
		<table class="table table-bordered table-invoice-full">
			<tbody>
				<tr>
					<td style="text-align:left"><b>Name:</b></td>
					<td style="text-align:left">
					<strong>
	          			<?php 
	      					if(!empty($employee["Employee"]["middle_name"])) 
	      						$name = $employee["Employee"]["first_name"]." ".$employee["Employee"]["middle_name"]." ".$employee["Employee"]["last_name"];
	      					else
	      						$name = $employee["Employee"]["first_name"]." ".$employee["Employee"]["last_name"];
	      					echo $name;
	      				?>
	      				</strong>
					</td>
				</tr>
				<tr>
					<td style="text-align:left">Designaiton:</td>
					<td style="text-align:left"><?php echo $designations[$employee["Employee"]["designation_id"]]; ?></td>
				</tr>
				<tr>
					<td style="text-align:left">Employee Code:</td>
					<td style="text-align:left"><?php echo $employee["Employee"]["employee_code"]; ?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered table-invoice-full">
			<thead>
				<tr>
					<th class="head0" style="text-align:center">Month</th>
					<th class="head1" style="text-align:center">Basic</th>
					<th class="head0" style="text-align:center">Personal<br/>Pay</th>
					<th class="head1" style="text-align:center">House<br/>Rent</th>
					<th class="head1" style="text-align:center">Sumptuary<br/>Allowance</th>
					<th class="head0" style="text-align:center">Dearness<br/>Allowance</th>
					<th class="head1" style="text-align:center">Charge<br/>Allowance</th>
					<th class="head0" style="text-align:center">Arrear</th>
					<th class="head1" style="text-align:center">Domestic<br/>Aid</th>
					<th class="head0" style="text-align:center">Medical<br/>Allowance</th>
					<th class="head1" style="text-align:center">Educational<br/>Allowance</th>
					<th class="head0" style="text-align:center">Conveyance</th>
					<th class="head1" style="text-align:center">Tiffin<br/>Allowance</th>
					<th class="head0" style="text-align:center">Washing<br/>Allowance</th>
					<th class="head1" style="text-align:center">Deputation<br/>Allowance</th>
					<th class="head0" style="text-align:center">Miscellaneous</th>
					<th class="head1" style="text-align:center">Fractional<br/>Increment</th>
					<th class="head0" style="text-align:center">Gross<br/>Salary</th>
					<th class="head0" style="text-align:center">CPF1</th>
					<th class="head0" style="text-align:center">CPF2</th>
					<th class="head0" style="text-align:center">Arrear<br/>CPF</th>
					<th class="head0" style="text-align:center">1st CPF<br/>Loan</th>
					<th class="head0" style="text-align:center">2nd CPF<br/>Loan</th>
					<th class="head0" style="text-align:center">CPF Loan<br/>Interest</th>
					<th class="head0" style="text-align:center">House<br/>Loan</th>
					<th class="head0" style="text-align:center">Vehicle<br/>Loan</th>
					<th class="head0" style="text-align:center">House Loan Interest</th>
					<th class="head0" style="text-align:center">Vehicle Loan Interest</th>
					<th class="head0" style="text-align:center">Benevolent<br/>Fund</th>
					<th class="head0" style="text-align:center">House Rent<br/>Deduct</th>
					<th class="head0" style="text-align:center">Bus<br/>Use</th>
					<th class="head0" style="text-align:center">Personal<br/>Vehicle Use</th>
					<th class="head0" style="text-align:center">Group<br/>Insurance</th>
					<th class="head0" style="text-align:center">Water &<br/>Sewerage</th>
					<th class="head0" style="text-align:center">Fuel<br/>Cost</th>
					<th class="head0" style="text-align:center">Overdrawn</th>
					<th class="head0" style="text-align:center">Phone<br/>Bill</th>
					<th class="head0" style="text-align:center">Tax</th>
					<th class="head0" style="text-align:center">Miscellaneous<br/>Deduct</th>
					<th class="head0" style="text-align:center">Total<br/>Deduction</th>
					<th class="head0" style="text-align:center">Net<br/>Payable</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($salaries as $salary){ ?>
				<tr>
					<td style="text-align:center"><strong><?php echo date("F, Y",$salary["GeneratedSalary"]["updated"]);?></strong></td>
					<td style="text-align:center"><strong><?php echo $salary["GeneratedSalary"]["basic"]; ?></strong></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["pp"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["house_rent"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["sumptuary"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["dearness"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["charge"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["arrear"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["aid"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["medical"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["edu"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["conveyance"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["tiffin"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["washing"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["deputation"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["miscellaneous"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["fraction_increment"]; ?></td>
					<td style="text-align:center"><strong><?php echo $salary["GeneratedSalary"]["total_add"]; ?></strong></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["cpf1"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["cpf2"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["arrear_cpf"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["cpf_loan1"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["cpf_loan2"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["cpf_interest"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["house_loan"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["vehicle_loan"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["h_interest"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["v_interest"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["benevolent_fund"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["house_rent_deduct"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["transport_bill"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["personal_vehicle"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["group_insurance"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["w_s"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["fuel"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["overdrawn"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["phone_bill"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["tax"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["miscellaneous_deduct"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["total_sub"]; ?></td>
					<td style="text-align:center"><strong><?php echo $salary["GeneratedSalary"]["payable"]; ?></strong></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php } ?>
</div>