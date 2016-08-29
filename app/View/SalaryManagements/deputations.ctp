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
<h4 class="widgettitle"><?php if($type == 1) echo "Deputate list from other organization"; elseif($type == 2) echo "Deputate list to other organization"; elseif($type == 3) echo "Deputate list for education";?> </h4>
<table class="table table-bordered" id="deputaton">
    <thead>
        <tr>
          	<th class="head0">Employee</th>
            <th class="head1">Deputate Designation</th>
            <th class="head0">Taken</th>
            <th class="head1">Released</th>
            <th class="head0">On Deputation</th>
            <th class="head1">Amount</th>
            <th class="head1">Status</th>
            <th class="head1">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($deputations)){ 
        		foreach($deputations as $deputation){
        ?>
        <tr class="gradeA">
          	<td>
          		<?php 
          			if(!empty($deputation["Employee"]["middle_name"])) 
          				echo $deputation["Employee"]["first_name"]." ".$deputation["Employee"]["middle_name"]." ".$deputation["Employee"]["last_name"];
          			else
          				echo $deputation["Employee"]["first_name"]." ".$deputation["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo $designations[$deputation["Deputation"]["deputate_designation"]];?></td>
          	<td><?php echo date("j'S M, Y",$deputation["Deputation"]["taken"]);?></td>
          	<td><?php if(!empty($deputation["Deputation"]["released"])) echo date("j'S M, Y",$deputation["Deputation"]["released"]); else echo "Continued"; ?></td>
          	<td><?php echo $deputation["Deputation"]["on_charge"];?></td>
          	<td><?php echo $deputation["Deputation"]["amount"];?></td>
          	<td><?php if($deputation["Deputation"]["status"] == 1) echo "Not Payment Yet & Not Released"; elseif($deputation["Deputation"]["status"] == 0) echo "Released & Paid"; elseif($deputation["Deputation"]["status"] == 2) echo "Payment Continued"; elseif($deputation["Deputation"]["status"] == 3) echo "Released but not payment yet";?></td>
          	<td>
          		<?php if(empty($deputation["Deputation"]["released"])){ ?>
          			<a href="<?php echo $this->webroot."salaryManagements/deputationRelease/".$deputation["Deputation"]["id"];?>" class="btn btn-primary"><i class="wicon-pencil"></i>Released</a>
          		<?php } if($deputation["Deputation"]["status"] == 1 OR $deputation["Deputation"]["status"] == 3){ ?>
          	 		<a href="<?php echo $this->webroot."salaryManagements/deputationAlowance/".$deputation["Deputation"]["id"];?>" class="btn btn-primary"><i class="wicon-eye-open"></i>Approved</a>
          	 	<?php } ?>
          	 </td>
            
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
jQuery('#deputation').dataTable({
	"sPaginationType": "full_numbers",
	"aaSortingFixed": [[0,'desc']],
	"fnDrawCallback": function(oSettings) {
		jQuery.uniform.update();
	}
});
</script>