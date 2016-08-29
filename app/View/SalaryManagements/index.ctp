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
 <?php $msg = $this->Session->read("Message");  if(!empty($msg["flash"]["message"])){ ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	<button data-dismiss="alert" class="close" type="button">×</button>
  	<strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<h4 class="widgettitle">Salary Calculation for the month of <?php echo date('F, Y', $currentTime); ?></h4>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
        	<th class="head1 width2">PNO</th>
          	<th class="head0 width20">Employee</th>
            <th class="head1 width15">Designation</th>
            <th class="head0 width10">Basic</th>
            <th class="head1 width10">Gross Salary</th>
            <th class="head0 width10">Total Deduction</th>
            <th class="head1 width10">Net Payable</th>
            <th class="head0 width10">Date</th>
            <th class="head1">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($salaries)){ //pr($salaries[0]);
        		foreach($salaries as $salary){ 
        ?>
        <tr class="gradeA">
        	<td><?php echo $salary["Employee"]["employee_code"];?></td>
          	<td>
          		<?php 
          			if(!empty($salary["Employee"]["middle_name"])) 
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
          			else
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
          		?>
          	</td>
          	<td>	
          		<?php 
          			echo $designations[$salary["Salary"]["designation_id"]]; 
          			if($salary["Charge"]["type"] == 1) echo " (AC)"; elseif($salary["Charge"]["type"] == 5) echo " (CC)"; elseif($salary["Salary"]["status"] == 9) echo " (Deupt.)"; elseif($salary["Employee"]["status"] == 5) echo " (Lien)"; elseif($salary["Employee"]["status"] == 6) echo " (PRL)";
          		?>
          	</td>
          	<td><?php echo $salary["Salary"]["basic"];?></td>
          	<td><?php echo $salary["Salary"]["total_add"];?></td>
          	<td><?php echo $salary["Deduction"]["total_sub"];?></td>
          	<td><?php echo $salary["Salary"]["payable"];?></td>
          	<td><?php echo date("M, Y",$salary["Salary"]["updated"]);?></td>
          	<td>
          		<a href="<?php echo $this->webroot."salaryManagements/editSalary/".$type."/".$salary["Salary"]["id"];?>" class="btn btn-primary"><i class="wicon-pencil"></i></a>
          	 	<a href="<?php echo $this->webroot."salaryManagements/detail/".$salary["Salary"]["id"];?>" class="btn btn-primary"><i class="wicon-eye-open"></i></a>
          	 </td>
            
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script><?php if(!empty($salaries)){?>$(document).ready(function(){$('#salary').dataTable({"sPaginationType": "full_numbers"});});<?php } ?></script>