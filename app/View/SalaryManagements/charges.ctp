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
<h4 class="widgettitle"><?php if($chargeType == 1) echo "Aditional "; elseif($chargeType == 2) echo "Current ";?> Charge List for the month of <?php echo date('F, Y', strtotime(date('Y-m')."+0 month")); ?></h4>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
          	<th class="head0" style="text-align:center">Employee</th>
            <th class="head1" style="text-align:center">Charged Designation</th>
            <th class="head0" style="text-align:center">Taken</th>
            <th class="head1" style="text-align:center">Released</th>
            <th class="head0" style="text-align:center">On Charge</th>
            <th class="head1" style="text-align:center">Amount</th>
            <th class="head1" style="text-align:center">Status</th>
            <th class="head1" style="text-align:center">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($charges)){ 
        		foreach($charges as $charge){
        ?>
        <tr class="gradeA">
          	<td style="text-align:center">
          		<?php 
          			if(!empty($charge["Employee"]["middle_name"])) 
          				echo $charge["Employee"]["first_name"]." ".$charge["Employee"]["middle_name"]." ".$charge["Employee"]["last_name"];
          			else
          				echo $charge["Employee"]["first_name"]." ".$charge["Employee"]["last_name"];
          			echo "<br/>(".$designations[$charge["Employee"]["designation_id"]].")";
          		?>
          	</td>
          	<td style="text-align:center"><?php echo $designations[$charge["Charge"]["charged_designation"]];?></td>
          	<td style="text-align:center"><?php echo date("j'S M, Y",$charge["Charge"]["taken"]);?></td>
          	<td style="text-align:center"><?php if(!empty($charge["Charge"]["released"])) echo date("j'S M, Y",$charge["Charge"]["released"]); else echo "Continued"; ?></td>
          	<td style="text-align:center"><?php echo $charge["Charge"]["on_charge"];?></td>
          	<td style="text-align:center"><?php echo $charge["Charge"]["amount"];?></td>
          	<td style="text-align:center"><?php if($charge["Charge"]["status"] == 1) echo "Received"; elseif($charge["Charge"]["status"] == 0) echo "Not Permited Yet"; elseif($charge["Charge"]["status"] == 2) echo "Payment Continued";?></td>
          	<td style="text-align:center">
          		<?php if(empty($charge["Charge"]["released"])){?>
          		<a href="<?php echo $this->webroot."salaryManagements/chargeRelease/".$charge["Charge"]["id"];?>" class="btn btn-primary"><i class="wicon-pencil"></i>Released</a>
          		<?php } if($charge["Charge"]["status"] == 0){?>
          		<a href="<?php echo $this->webroot."salaryManagements/changeAlowance/".$charge["Charge"]["id"];?>" class="btn btn-primary"><i class="wicon-eye-open"></i>Approved</a>
          		<?php } ?>
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