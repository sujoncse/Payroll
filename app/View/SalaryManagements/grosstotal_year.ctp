<?php
/**
 * @Developed By	:	BARC
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->css(array("admin/datepicker"));
 echo $this->Html->script(array("admin/jquery.dataTables")); 
 ?>
 <style type="text/css">
#wrap {
   width:950px;
   margin:0 auto;
}
#left_col {
   float:left;
   width:50px;
}
#left_col1 {
   float:left;
   width:600px;
}
#left_col2 {
   float:left;
   width:300px;
}
#left_col3 {
   float:left;
   width:150px;
   text-align:right;
}
#left_col4 {
   float:left;
   width:150px;
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
 <?php $msg = $this->Session->read("Message"); if(!empty($msg["flash"]["message"])){ ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	<button data-dismiss="alert" class="close" type="button">×</button>
  	<strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<!-- <div class="loaders"><img alt="" src="<?php echo $this->webroot."img/admin/loaders/loader6.gif"; ?>"></div><br/><br/><br/> -->
<h4 class="widgettitle">Gross Salary Calculation for <?php if(isset($startdate) AND isset($enddate)) echo $startdate .' To '. $enddate; ?></h4>

<div style="float:left">
    <?php 
		echo $this->Form->create('GeneratedSalary',array('url'=>array('controller'=>'salaryManagements','action'=>'grosstotalYear',$type),"class"=>"stdform stdform2",'id'=>'previoussalaryUsers'));
		echo $this->Form->hidden('id');
	?>
	<?php echo $this->Form->input('start',array("id"=>"start","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"Start Date",'label'=>false,'div'=>false, "tabindex"=>"1","readonly"=>"true"));?>
	<?php echo $this->Form->input('end',array("id"=>"end","data-date-format"=>"dd-mm-yyyy","data-date-viewmode"=>"years", 'error' => false,"type"=>"text","class"=>"input-xlarge","placeholder"=>"End Date",'label'=>false,'div'=>false, "tabindex"=>"2","readonly"=>"true"));?>
	<button class="btn btn-primary">Search</button>
	<?php echo $this->Form->end();?>
</div>

<div class="divider15"></div>

<?php /*if(isset($net_salaries) AND !empty($net_salaries)){ ?>
<div class="maincontent">
<div class="contentinner">

<div class="row-fluid">
	<div class="span6"></div>
	<div class="span5"><a style="float:right;margin-bottom: 20px;margin-right: -46px;" class="btn btn-primary" href="<?php echo $this->webroot."salaryManagements/grosstotalyearPdf/".$type ."/". $startdate ."/". $enddate ."/gross_and_net_salary_". $startdate ."_To_". $enddate;?>">Generate Report</a></div><br>
</div>	


<div id="wrap">
	<hr>
    <div id="left_col">01.</div>
	<div id="left_col1">Basic Salary</div>
    <div id="right_col"><?php echo $net_salaries['basic'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">02.</div>
	<div id="left_col1">House Rent</div>
    <div id="right_col"><?php echo $net_salaries['house_rent'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">03.</div>
	<div id="left_col1">Medical Allowance</div>
    <div id="right_col"><?php echo $net_salaries['medical'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">04.</div>
	<div id="left_col1">Personal Pay</div>
    <div id="right_col"><?php echo $net_salaries['pp'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">05.</div>
	<div id="left_col1">Education Allowance</div>
    <div id="right_col"><?php echo $net_salaries['edu'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">06.</div>
	<div id="left_col1">Change Allowance</div>
    <div id="right_col"><?php echo $net_salaries['charge'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">07.</div>
	<div id="left_col1">Dearness Allowance</div>
    <div id="right_col"><?php echo $net_salaries['dearness'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">08.</div>
	<div id="left_col1">Arrear Salary</div>
    <div id="right_col"><?php echo $net_salaries['arrear'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">09.</div>
	<div id="left_col1">Sumptuary Allowance</div>
    <div id="right_col"><?php echo $net_salaries['sumptuary'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">10.</div>
	<div id="left_col1">Domestic Aid Allowance</div>
    <div id="right_col"><?php echo $net_salaries['aid'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">11.</div>
	<div id="left_col1">Miscellaneous</div>
    <div id="right_col"><?php echo $net_salaries['miscellaneous'] . '.00';?></div>
</div>
<div id="wrap">
    <div id="left_col">12.</div>
	<div id="left_col1">Fraction Increment</div>
    <div id="right_col"><?php echo $net_salaries['fraction_increment'] . '.00';?></div>
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
<div id="wrap" >
    <div id="left_col">15.</div>
	<div id="left_col1">Washing Allowance</div>
    <div id="right_col"><?php echo $net_salaries['washing'] . '.00';?></div>
</div>	
<div id="wrap">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col1"><b>Total Gross Salary</b></div>
    <div id="right_col"><b><?php echo $net_salaries['total_add'] . '.00';?></b></div>
</div>	
<div id="wrap">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2">Deduction</div>
    <div id="right_col">&nbsp;</div>
</div>
<div id="wrap">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">01.</div>
	<div id="left_col2">C.P.F.&nbsp;(10%)</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['cpf1'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">02.</div>
	<div id="left_col2">C.P.F.&nbsp;(2.5%)</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['cpf2'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">03.</div>
	<div id="left_col2">Arrear C.P.F</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['arrear_cpf'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">04.</div>
	<div id="left_col2">C.P.F. Loan-1</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['cpf_loan1'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">05.</div>
	<div id="left_col2">C.P.F. Loan-2</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['cpf_loan2'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">06.</div>
	<div id="left_col2">C.P.F. Interest</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['cpf_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">07.</div>
	<div id="left_col2">Vehicle Loan</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['vehicle_loan'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">08.</div>
	<div id="left_col2">Vehicle Loan Interest</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['v_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">09.</div>
	<div id="left_col2">House Loan</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['house_loan'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">10.</div>
	<div id="left_col2">House Loan Interest</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['h_interest'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">11.</div>
	<div id="left_col2">Benevolent Fund</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['benevolent_fund'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">12.</div>
	<div id="left_col2">House Rent Deduct</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['house_rent_deduct'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">13.</div>
	<div id="left_col2">Transport Bill</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['transport_bill'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">14.</div>
	<div id="left_col2">Personal Vehicle Use</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['personal_vehicle'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">15.</div>
	<div id="left_col2">Group Insurance</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['group_insurance'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">16.</div>
	<div id="left_col2">Overdrawn</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['overdrawn'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">17.</div>
	<div id="left_col2">Phone Bill</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['phone_bill'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">18.</div>
	<div id="left_col2">Association Subscription</div>
	<div id="left_col3">&nbsp;></div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['association'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">19.</div>
	<div id="left_col2">Fuel</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['fuel'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">20.</div>
	<div id="left_col2">Tax</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['tax'] . '.00';?></div>
</div>
<div id="wrap" >
    <div id="left_col">21.</div>
	<div id="left_col2">Miscellaneous Deduct</div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><?php echo $net_deductions['miscellaneous_deduct'] . '.00';?></div>
</div>
<div id="wrap">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2"><b>Total Deduction</b></div>
	<div id="left_col3"><b>&nbsp;</b></div>
	<div id="left_col3"><b>&nbsp;</b></div>
    <div id="right_col"><b><?php echo $net_deductions['total_sub'] . '.00';?></b></div>
</div>
<div id="wrap">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
<div id="wrap" >
    <div id="left_col">&nbsp;</div>
	<div id="left_col2"><b>Total Net Salary</b></div>
	<div id="left_col3">&nbsp;</div>
	<div id="left_col3">&nbsp;</div>
    <div id="right_col"><b><?php echo $net_salaries['total_add'] - $net_deductions['total_sub'] . '.00';?></b></div>
</div>
</div>
</div>
<?php } */?>
<script>
$('#start').datepicker();
$('#end').datepicker();
</script>
<?php
if(!empty($total_net_salary)){
?>
<div class="row-fluid">
	<div class="span6"></div>
	<div class="span5"><a style="float:right;margin-bottom: 20px;margin-right: -46px;" class="btn btn-primary" href="<?php echo $this->webroot."salaryManagements/grosstotalyearPdf/".$type ."/". $startdate ."/". $enddate ."/gross_and_net_salary_". $startdate ."_To_". $enddate;?>">Generate Report</a></div><br>
</div>	
<?php	
}
?>

<table class="table table-bordered" id="salary1">
    <thead>
        <tr>
          	<th class="head0">SL. No.</th>
			<th class="head0">Employee</th>
            <th class="head1">Total Gross Salary</th>
			<th class="head2">Total Deduction</th>
            <th class="head0">Total Net Salary</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i = 1;
    		if(!empty($total_net_salary)){ 
    			foreach($total_net_salary as $net_salary){ 
        ?>
        <tr class="gradeA">
			<td><?php echo $i; ?></td>
          	<td>
          		<?php echo $net_salary["e_name"]; ?>
          	</td>
          	<td><?php echo $net_salary["total_add"]; ?></td>
          	<td><?php echo $net_salary["total_sub"]; ?></td>
          	<td><?php echo $net_salary["total_add"] - $net_salary["total_sub"]; ?></td>
        </tr>
        <?php $i++; } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
<?php if(!empty($total_net_salary)){ ?>
$(document).ready(function() {
    $('#salary1').dataTable( {
    	"sPaginationType": "full_numbers",
        "aaSorting": [[0 , "asc" ]]
    } );
} );
<?php } ?>
</script>