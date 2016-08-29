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
<h4 class="widgettitle">Salary Calculation for the month of <?php echo date('F, Y', strtotime(date('Y-m')."+0 month")); ?></h4>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
          	<th class="head0">Employee</th>
            <th class="head1">Designation</th>
            <th class="head0">Basic</th>
            <th class="head1">Gross Salary</th>
            <th class="head0">Total Deduction</th>
            <th class="head1">Net Payable</th>
            <th class="head1">Date</th>
            <th class="head1">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($salaries)){ //pr($salaries);
        		foreach($salaries as $salary){ 
        ?>
        <tr class="gradeA">
          	<td>
          		<?php 
          			if(!empty($salary["Employee"]["middle_name"])) 
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
          			else
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo $designations[$salary["Salary"]["designation_id"]]; if($salary["Salary"]["status"] == 4) echo " (AC)"; elseif($salary["Salary"]["status"] == 5) echo " (CC)";?></td>
          	<td><?php echo $salary["Salary"]["basic"];?></td>
          	<td><?php echo $salary["Salary"]["total_add"];?></td>
          	<td><?php echo $salary["Deduction"]["total_sub"];?></td>
          	<td><?php echo $salary["Salary"]["payable"];?></td>
          	<td><?php echo date("M, Y",$salary["Salary"]["updated"]);?></td>
          	<td>
          		<a href="<?php echo $this->webroot."salaryManagements/detail/".$salary["Salary"]["id"];?>" class="btn btn-primary"><i class="icon-eye-open"></i>Detail</a>
          	 </td>
            
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
jQuery('#salary').dataTable({
	"sPaginationType": "full_numbers",
	"aaSortingFixed": [[0,'desc']],
	"fnDrawCallback": function(oSettings) {
		jQuery.uniform.update();
	}
});
</script>