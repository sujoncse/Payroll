<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
echo $this->Html->script(array("admin/jquery.dataTables"));
?>
<style type="text/css">
#wrap {
   width:950px;
   margin:0 auto;
   font-size: 10px;
   line-height: 9px;
}
#left_col {
   float:left;
   width:50px;
}
#left_col1 {
   float:left;
   width:600px;
} 
#left_col20{
   float:left;
   width:900px;
}
#left_col30{
   float:right;
   width:500px;
}
#left_col2 {
   float:left;
   width:200px;
}
#left_col3 {
   float:left;
   width:150px;
   text-align:right;
}
#left_col4 {
   float:left;
   width:250px;
   text-align:right;
}
#right_col {
   float:right;
   width:300px;
   text-align:right;
}
hr.style-one {
    border-top: 1px solid #8c8b8b;
}
</style>

<div class="maincontent">
<div class="contentinner">
<div class="row-fluid">
    <div class="span12" style="text-align:center;">
        <div class="invoice_logo"><img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
    </div><!--span6-->
	<div class="span12" style="text-align:center;">
	<?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> Gross and Net salary Calculation for <?php echo $startdate .' To '. $enddate; ?>
	</div>
</div>	
<?php if(!empty($total_net_salary)){ $i=1;
?>
<table class="table table-bordered" border="1" id="salary1" style="border-collapse: collapse">
    <thead>
        <tr>
          	<th class="head0">SL. No.</th>
			<th class="head0">Employee</th>
            <th class="head1">Basic</th>
			<th class="head2">House Rent</th>
            <th class="head0">Medical</th>
            <th class="head0">PP</th>
            <th class="head0">Edu</th>
            <th class="head0">Charge</th>
            <th class="head0">Dearness</th>
            <th class="head0">Conveyance</th>
            <th class="head0">Tiffin</th>
            <th class="head0">Washing</th>
            <th class="head0">Aid</th>
            <th class="head0">Sumptuary</th>
            <th class="head0">Arrear</th>
            <th class="head0">Miscellaneous</th>
            <th class="head0">Fraction Increment</th>
            <th class="head0">Total Add</th>
            <th class="head0">CPF1</th>
            <th class="head0">CPF2</th>
            <th class="head0">Arrear CPF</th>
            <th class="head0">CPF Loan1</th>
            <th class="head0">CPF Loan2</th>
            <th class="head0">House Loan</th>
            <th class="head0">Vehicle Loan</th>
            <th class="head0">CPF Interest</th>
            <th class="head0">h_interest</th>
            <th class="head0">v_interest</th>
            <th class="head0">Benevolent Fund</th>
            <th class="head0">House Rent Deduct</th>
            <th class="head0">Transport Bill</th>
            <th class="head0">Personal Vehicle</th>
            <th class="head0">Group Insurance</th>
            <th class="head0">w_s</th>
            <th class="head0">Fuel</th>
            <th class="head0">Overdrawn</th>
            <th class="head0">Phone Bill</th>
            <th class="head0">Association</th>
            <th class="head0">Tax</th>
            <th class="head0">Miscellaneous Deduct</th>
            <th class="head0">Total Sub</th>
            <th class="head0">Total</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i = 1;
    		if(!empty($total_net_salary)){
    			foreach($total_net_salary as $net_salary){ 
        ?>
        <tr class="gradeA">
			<td><?php echo $i; ?></td>
          	<td><?php echo $net_salary["e_name"]; ?></td>
          	<td style="text-align: right;"><?php echo $net_salary["basic"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["house_rent"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["medical"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["pp"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["edu"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["charge"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["dearness"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["conveyance"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["tiffin"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["washing"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["aid"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["sumptuary"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["arrear"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["miscellaneous"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["fraction_increment"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["total_add"] . '/-'; ?></td>
          	<td style="text-align: right;"><?php echo $net_salary["cpf1"] . '/-'; ?></td>
          	<td style="text-align: right;"><?php echo $net_salary["cpf2"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["arrear_cpf"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["cpf_loan1"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["cpf_loan2"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["house_loan"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["vehicle_loan"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["cpf_interest"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["h_interest"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["v_interest"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["benevolent_fund"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["house_rent_deduct"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["transport_bill"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["personal_vehicle"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["group_insurance"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["w_s"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["fuel"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["overdrawn"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["phone_bill"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["association"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["tax"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["miscellaneous_deduct"] . '/-'; ?></td>
			<td style="text-align: right;"><?php echo $net_salary["total_sub"] . '/-'; ?></td>
			
          	<td style="text-align: right;"><?php echo $net_salary["total_add"] - $net_salary["total_sub"] . '/-'; ?></td>
        </tr>
        <?php $i++; } } ?>
    </tbody>
</table>
<?php	
} ?>		
<!--<div id="wrap">
	<hr>
    <div id="left_col">01.</div>
	<div id="left_col1">Basic Salary</div>
    <div id="right_col"><?php //echo $net_salaries['basic'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">02.</div>
	<div id="left_col1">House Rent</div>
    <div id="right_col"><?php //echo $net_salaries['house_rent'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">03.</div>
	<div id="left_col1">Medical Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['medical'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">04.</div>
	<div id="left_col1">Personal Pay</div>
    <div id="right_col"><?php //echo $net_salaries['pp'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">05.</div>
	<div id="left_col1">Education Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['edu'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">06.</div>
	<div id="left_col1">Change Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['charge'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">07.</div>
	<div id="left_col1">Dearness Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['dearness'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">08.</div>
	<div id="left_col1">Arrear Salary</div>
    <div id="right_col"><?php //echo $net_salaries['arrear'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">09.</div>
	<div id="left_col1">Sumptuary Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['sumptuary'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">10.</div>
	<div id="left_col1">Domestic Aid Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['aid'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">11.</div>
	<div id="left_col1">Miscellaneous</div>
    <div id="right_col"><?php //echo $net_salaries['miscellaneous'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">12.</div>
	<div id="left_col1">Fraction Increment</div>
    <div id="right_col"><?php //echo $net_salaries['fraction_increment'] . '.00';?></div>
</div>	
<div id="wrap">
    <div id="left_col">13.</div>
	<div id="left_col1">Conveyance Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['conveyance'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">14.</div>
	<div id="left_col1">Tiffin Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['tiffin'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">15.</div>
	<div id="left_col1">Washing Allowance</div>
    <div id="right_col"><?php //echo $net_salaries['washing'] . '.00';?></div>
</div>	
<div id="wrap">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col1"><b>Total Gross Salary</b></div>
    <div id="right_col"><b><?php //echo $net_salaries['total_add'] . '.00';?></b></div>
</div>	
<div id="wrap">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2">Deduction</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col">&nbsp;</div>
</div>
<div id="wrap">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">01.</div>
	<div id="left_col2">C.P.F.&nbsp;(10%)</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['cpf1'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">02.</div>
	<div id="left_col2">C.P.F.&nbsp;(2.5%)</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['cpf2'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">03.</div>
	<div id="left_col2">Arrear C.P.F</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['arrear_cpf'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">04.</div>
	<div id="left_col2">C.P.F. Loan-1</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['cpf_loan1'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">05.</div>
	<div id="left_col2">C.P.F. Loan-2</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['cpf_loan2'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">06.</div>
	<div id="left_col2">C.P.F. Interest</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['cpf_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">07.</div>
	<div id="left_col2">Vehicle Loan</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['vehicle_loan'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">08.</div>
	<div id="left_col2">Vehicle Loan Interest</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['v_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">09.</div>
	<div id="left_col2">House Loan</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['house_loan'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">10.</div>
	<div id="left_col2">House Loan Interest</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['h_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">11.</div>
	<div id="left_col2">Benevolent Fund</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['benevolent_fund'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">12.</div>
	<div id="left_col2">House Rent Deduct</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['house_rent_deduct'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">13.</div>
	<div id="left_col2">Transport Bill</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['transport_bill'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">14.</div>
	<div id="left_col2">Personal Vehicle Use</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['personal_vehicle'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">15.</div>
	<div id="left_col2">Group Insurance</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['group_insurance'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">16.</div>
	<div id="left_col2">Overdrawn</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['overdrawn'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">17.</div>
	<div id="left_col2">Phone Bill</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['phone_bill'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">18.</div>
	<div id="left_col2">Association Subscription</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['association'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">19.</div>
	<div id="left_col2">Fuel</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['fuel'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">20.</div>
	<div id="left_col2">Tax</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['tax'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">21.</div>
	<div id="left_col2">Miscellaneous Deduct</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php //echo $net_deductions['miscellaneous_deduct'] . '.00';?></div>
</div>
<div id="wrap">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2"><b>Total Deduction</b></div>
	<div id="left_col3"><b>&nbsp;</b></div>
	<div id="left_col3"><b>&nbsp;</b></div>
    <div id="right_col"><b><?php //echo $net_deductions['total_sub'] . '.00';?></b></div>
</div>
<div id="wrap">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2"><b>Total Net Salary</b></div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><b><?php //echo $net_salaries['total_add'] - $net_deductions['total_sub'] . '.00';?></b></div>
</div>
<br><br>
<div id="wrap" >
	<div id="left_col">&nbsp;</div>
	<div id="left_col2">-------------------------------------</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col2">-------------------------------------</div>
    <div id="right_col">&nbsp;</div>
</div>
<div id="wrap" >
	<div id="left_col">&nbsp;</div>
	<div id="left_col2">Prepared By</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col2">Director Finance</div>
    <div id="right_col">&nbsp;</div>
</div>
<div id="wrap" >
	<div id="left_col">&nbsp;</div>
	<div id="left_col2">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col2">BARC</div>
    <div id="right_col">&nbsp;</div>
</div>-->
</div>
</div>