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
   font-size: 9px;
   line-height: 8px;
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
    <div class="span12">
        <div class="invoice_logo"><img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
    </div><!--span6-->
	<div class="span12" style="text-align:center;font-size:12px;">
	<?php if($type == 1) echo "Employee (Grade 1-10)"; elseif($type == 2) echo "Employee (Grade 11-20)";?> Gross and Net salary for the month of <?php echo date('F, Y', $curdate); ?>
	</div>
</div>			
<div id="wrap">
	<hr>
    <div id="left_col">01.</div>
	<div id="left_col1">Basic Salary</div>
    <div id="right_col"><?php echo $net_salaries['basic'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">02.</div>
	<div id="left_col1">Personal Pay</div>
    <div id="right_col"><?php echo $net_salaries['pp'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">03.</div>
	<div id="left_col1">Festival Bonus</div>
    <div id="right_col"><?php echo '0.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">04.</div>
	<div id="left_col1">Dearness Allowance</div>
    <div id="right_col"><?php echo $net_salaries['dearness'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">05.</div>
	<div id="left_col1">House Rent</div>
    <div id="right_col"><?php echo $net_salaries['house_rent'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">06.</div>
	<div id="left_col1">Medical Allowance</div>
    <div id="right_col"><?php echo $net_salaries['medical'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">07.</div>
	<div id="left_col1">Charge Allowance</div>
    <div id="right_col"><?php echo $net_salaries['charge'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">08.</div>
	<div id="left_col1">Children Allowance</div>
    <div id="right_col"><?php echo $net_salaries['edu'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">09.</div>
	<div id="left_col1">Deputation Allowance</div>
    <div id="right_col"><?php echo $net_salaries['deputation'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">10.</div>
	<div id="left_col1">Domestic Aid</div>
    <div id="right_col"><?php echo $net_salaries['fraction_increment'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">11.</div>
	<div id="left_col1">Sumptuary</div>
    <div id="right_col"><?php echo $net_salaries['sumptuary'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">12.</div>
	<div id="left_col1">Washing Allowance</div>
    <div id="right_col"><?php echo $net_salaries['washing'] . '.00';?></div>
</div>	
<div id="wrap">
    <div id="left_col">13.</div>
	<div id="left_col1">Conveyance Allowance</div>
    <div id="right_col"><?php echo $net_salaries['conveyance'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">14.</div>
	<div id="left_col1">Tiffin Allowance</div>
    <div id="right_col"><?php echo $net_salaries['tiffin'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">15.</div>
	<div id="left_col1">Arrear Salary</div>
    <div id="right_col"><?php echo $net_salaries['arrear'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">16.</div>
	<div id="left_col1">Miscellaneous</div>
    <div id="right_col"><?php echo $net_salaries['miscellaneous'] . '.00';?></div>
</div>
	

<div id="wrap">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col1"><b>Total Gross Salary</b></div>
    <div id="right_col"><b><?php echo $net_salaries['total_add'] . '.00';?></b></div>
</div>	
<div id="wrap">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2">Deduction</div>
	<div id="left_col3">Deputation</div>
	<div id="left_col3">Regular</div>
    <div id="right_col">&nbsp;</div>
</div>
<div id="wrap">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">01.</div>
	<div id="left_col2">C.P.F.&nbsp;(10%)</div>
	<div id="left_col3"><?php echo $dep_deductions['cpf1'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['cpf1'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['cpf1'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">02.</div>
	<div id="left_col2">C.P.F.&nbsp;(2.5%)</div>
	<div id="left_col3"><?php echo $dep_deductions['cpf2'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['cpf2'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['cpf2'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">03.</div>
	<div id="left_col2">Arrear C.P.F</div>
	<div id="left_col3"><?php echo $dep_deductions['arrear_cpf'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['arrear_cpf'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['arrear_cpf'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">04.</div>
	<div id="left_col2">C.P.F. Loan-1</div>
	<div id="left_col3"><?php echo $dep_deductions['cpf_loan1'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['cpf_loan1'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['cpf_loan1'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">05.</div>
	<div id="left_col2">C.P.F. Loan-2</div>
	<div id="left_col3"><?php echo $dep_deductions['cpf_loan2'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['cpf_loan2'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['cpf_loan2'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">06.</div>
	<div id="left_col2">C.P.F. Interest</div>
	<div id="left_col3"><?php echo $dep_deductions['cpf_interest'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['cpf_interest'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['cpf_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">07.</div>
	<div id="left_col2">Benevolent Fund</div>
	<div id="left_col3"><?php echo $dep_deductions['benevolent_fund'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['benevolent_fund'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['benevolent_fund'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">08.</div>
	<div id="left_col2">Group Insurance</div>
	<div id="left_col3"><?php echo $dep_deductions['group_insurance'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['group_insurance'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['group_insurance'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">09.</div>
	<div id="left_col2">House Rent</div>
	<div id="left_col3"><?php echo $dep_deductions['house_rent_deduct'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['house_rent_deduct'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['house_rent_deduct'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">10.</div>
	<div id="left_col2">Land Use</div>
	<div id="left_col3"><?php echo $dep_deductions['fuel'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['fuel'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['fuel'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">11.</div>
	<div id="left_col2">Transport Used</div>
	<div id="left_col3"><?php echo $dep_deductions['transport_bill'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['transport_bill'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['transport_bill'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">12.</div>
	<div id="left_col2">Telephone Used</div>
	<div id="left_col3"><?php echo $dep_deductions['phone_bill'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['phone_bill'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['phone_bill'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">13.</div>
	<div id="left_col2">Personal Vehicle Use</div>
	<div id="left_col3"><?php echo $dep_deductions['personal_vehicle'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['personal_vehicle'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['personal_vehicle'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">14.</div>
	<div id="left_col2">One day Salary</div>
	<div id="left_col3"><?php echo $dep_deductions['w_s'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['w_s'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['w_s'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">15.</div>
	<div id="left_col2">Overdrawn</div>
	<div id="left_col3"><?php echo $dep_deductions['overdrawn'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['overdrawn'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['overdrawn'] . '.00';?></div>
</div>

<div id="wrap" >
    <div id="left_col">16.</div>
	<div id="left_col2">Association Subscription</div>
	<div id="left_col3"><?php echo $dep_deductions['association'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['association'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['association'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">17.</div>
	<div id="left_col2">Tax</div>
	<div id="left_col3"><?php echo $dep_deductions['tax'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['tax'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['tax'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">18.</div>
	<div id="left_col2">House Loan</div>
	<div id="left_col3"><?php echo $dep_deductions['house_loan'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['house_loan'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['house_loan'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">19.</div>
	<div id="left_col2">House Loan Interest</div>
	<div id="left_col3"><?php echo $dep_deductions['h_interest'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['h_interest'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['h_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">20.</div>
	<div id="left_col2">Vehicle Loan</div>
	<div id="left_col3"><?php echo $dep_deductions['vehicle_loan'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['vehicle_loan'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['vehicle_loan'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">21.</div>
	<div id="left_col2">Vehicle Loan Interest</div>
	<div id="left_col3"><?php echo $dep_deductions['v_interest'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['v_interest'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['v_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">22.</div>
	<div id="left_col2">Miscellaneous</div>
	<div id="left_col3"><?php echo $dep_deductions['miscellaneous_deduct'] . '.00';?></div>
	<div id="left_col3"><?php echo $reg_deductions['miscellaneous_deduct'] . '.00';?></div>
    <div id="right_col"><?php echo $net_deductions['miscellaneous_deduct'] . '.00';?></div>
</div>
<div id="wrap">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2"><b>Total Deduction</b></div>
	<div id="left_col3"><b><?php echo $dep_deductions['total_sub'] . '.00';?></b></div>
	<div id="left_col3"><b><?php echo $reg_deductions['total_sub'] . '.00';?></b></div>
    <div id="right_col"><b><?php echo $net_deductions['total_sub'] . '.00';?></b></div>
</div>
<div id="wrap">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2"><b>Total Net Salary</b></div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><b><?php echo $net_salaries['total_add'] - $net_deductions['total_sub'] . '.00';?></b></div>
</div>
<br><div id="wrap" ><b>In Word: <?php echo $intotal; ?> taka </b></div>
<br><br><br><br>
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
</div>
</div>
</div>