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
<h4 class="widgettitle"><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> benevolent fund information for the month of <?php echo date('F, Y', strtotime(date('Y-m')."+0 month")); ?></h4>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
          	<th class="head0">Employee</th>
            <th class="head1">Designation</th>
            <th class="head0">Basic</th>
            <th class="head1">Benevolent Fund</th>
            <th class="head0 right"><a href="<?php echo $this->webroot."reportManagements/bfPdf/1/BF_".date('F, Y').".pdf";;?>" class="btn btn-primary">Generate Report</a></th>
        </tr>
    </thead>
    <tbody>
    	<?php 
    		if(!empty($salaries)){
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
          	<td><?php echo $designations[$salary["Employee"]["designation_id"]]; if($salary["Employee"]["status"] == 2) echo " (AC)"; elseif($salary["Employee"]["status"] == 3) echo " (CC)";?></td>
          	<td><?php echo $salary["GeneratedSalary"]["basic"];?></td>
          	<td><?php echo $salary["GeneratedDeduction"]["benevolent_fund"];?></td>
          	<td><a href="<?php echo $this->webroot."salaryManagements/generatedDetail/".$salary["GeneratedSalary"]["id"];?>" class="btn btn-primary"><i class="icon-eye-open"></i>Detail</a></td>
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
<?php if(!empty($salaries)){ ?>
$(document).ready(function() {
    $('#salary').dataTable( {
    	"sPaginationType": "full_numbers",
        "aaSorting": [[4 , "asc" ]]
    } );
} );
<?php } ?>
</script>