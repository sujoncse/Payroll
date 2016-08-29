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
 <style>
 .dataTables_filter { right: -28px;top: -18px;}
 </style>
 <?php $msg = $this->Session->read("Message"); if(!empty($msg["flash"]["message"])){ ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	<button data-dismiss="alert" class="close" type="button">×</button>
  	<strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<!-- <div class="loaders"><img alt="" src="<?php echo $this->webroot."img/admin/loaders/loader6.gif"; ?>"></div><br/><br/><br/> -->
<?php 
	echo $this->Form->create('Fixation',array('url'=>array('controller'=>'salaryManagements','action'=>'fixation',$type),"class"=>"stdform stdform2",'id'=>'fixation'));
 	echo $this->Form->hidden('id');
?>

<h4 class="widgettitle">Salary Calculation for the month of <?php echo date('F, Y', strtotime(date('Y-m',$currentTime)."+0 month")); ?></h4>
<?php //pr($salaries); ?>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
        	<th class="head1">PNo</th>
          	<th class="head0">Employee</th>
            <th class="head1">Designation</th>
            <th class="head0">Basic</th>
            <th class="head1">Gross Salary</th>
            <th class="head0">Total Deduction</th>
            <th class="head1">Net Payable</th>
            <th class="head0">Date</th>
            <th class="head1 right">Action</th>
        </tr>
        <tr>
    	 	<th colspan="9">
    	 		<div style="float:right">
					<!--<a href="<?php echo $this->webroot."salaryManagements/previousSalaries/".$type;?>" class="btn btn-primary">Previous Salary</a> -->   	 		
    	 			<?php if(empty($salaries)){ ?>
    	 				<a href="<?php echo $this->webroot."salaryManagements/generatedSalaries/".$type."/1";?>" class="btn btn-primary">Generate Salary</a>
    	 			<?php }elseif(!empty($salaries)){ ?>
    	 				<a href="<?php echo $this->webroot."salaryManagements/generatedSalaries/".$type."/1";?>" class="btn btn-primary">Generate Salary</a>
    	 			<?php } ?>
    	 			<?php if(!empty($salaries)){ if($type == 1){ ?>
    	 				<a href="<?php echo $this->webroot."salaryManagements/generatePdf/".$type."/Officers_Salary_Sheet_".str_replace(" ","_",strtoupper(date('F Y', strtotime(date('Y-m',$currentTime)."+0 month")))).".pdf";?>" class="btn btn-primary">Salary Sheet</a>
    	 			<?php }else{ ?>
    	 				<a href="<?php echo $this->webroot."salaryManagements/generatePdf/".$type."/Staffs_Salary_Sheet_".str_replace(" ","_",strtoupper(date('F Y', strtotime(date('Y-m',$currentTime)."+0 month")))).".pdf";?>" class="btn btn-primary">Salary Sheet</a>
    	 			<?php } } ?>
    	 			<?php if(!empty($salaries)){ ?>
	            	<!--<a href="<?php echo $this->webroot."salaryManagements/monthClose/".$type;?>" class="btn btn-primary">Month Close</a>-->
	            	<?php } ?>
	            </div>
    	 	</th>
    	</tr>
    </thead>
    <tbody>
    	<?php 
    		if(!empty($salaries)){
    			foreach($salaries as $salary){
        ?>
        <tr class="gradeA">
        	<td><?php echo $salary["Employee"]["employee_code"]; ?></td>
          	<td>
          		<?php 
          			if(!empty($salary["Employee"]["middle_name"])) 
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
          			else
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo $designations[$salary["GeneratedSalary"]["designation_id"]]; if($salary["GeneratedSalary"]["status"] == 4) echo " (AC)"; elseif($salary["GeneratedSalary"]["status"] == 5) echo " (CC)";?></td>
          	<td><?php echo $salary["GeneratedSalary"]["basic"];?></td>
          	<td><?php echo $salary["GeneratedSalary"]["total_add"];?></td>
          	<td><?php echo $salary["GeneratedDeduction"]["total_sub"];?></td>
          	<td><?php echo $salary["GeneratedSalary"]["payable"];?></td>
          	<td><?php echo date("M, Y",$salary["GeneratedSalary"]["execution_date"]);?></td>
          	<td><a href="<?php echo $this->webroot."salaryManagements/generatedDetail/".$salary["GeneratedSalary"]["id"];?>" class="btn btn-primary"><i class="wicon-eye-open"></i>Detail</a></td>
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script><?php if(!empty($salaries)){?>$(document).ready(function(){$('#salary').dataTable({"sPaginationType": "full_numbers"});});<?php } ?></script>