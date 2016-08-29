<?php
/**
 * @Developed By	:	BARC
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
<h4 class="widgettitle">Festival Allowance</h4>
<table class="table table-bordered" id="fas">
    <thead>
        <tr>
          	<th class="head0">Employee</th>
            <th class="head1">Designation</th>
            <th class="head0">Allowance</th>
            <th class="head1">Net Payable</th>
            <th class="head0">Date</th>
            <th class="head1 right">
            	<a href="<?php echo $this->webroot."salaryManagements/approveFa/".$type;?>" class="btn btn-primary">Approve Allowance</a>
            	<a href="<?php echo $this->webroot."salaryManagements/generateFa/". $type ."/FA_".str_replace(" ","_",strtoupper(date('F Y', strtotime(date('Y-m')."+0 month")))).".pdf"; ?>" class="btn btn-primary">Generate PDF</a>
			</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
    		if(!empty($fas)){
    			foreach($fas as $fa){ 
        ?>
        <tr class="gradeA">
          	<td>
          		<?php 
          			if(!empty($fa["Employee"]["middle_name"])) 
          				echo $fa["Employee"]["first_name"]." ".$fa["Employee"]["middle_name"]." ".$fa["Employee"]["last_name"];
          			else
          				echo $fa["Employee"]["first_name"]." ".$fa["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo $designations[$fa["Employee"]["designation_id"]]; if($fa["Employee"]["status"] == 2) echo " (AC)"; elseif($fa["Employee"]["status"] == 3) echo " (CC)";?></td>
          	<td><?php echo $fa["FestivalAllowance"]["basic"];?></td>
          	<td><?php echo $fa["FestivalAllowance"]["payable"];?></td>
          	<td><?php echo date("M, Y",$fa["FestivalAllowance"]["updated"]);?></td>
          	<td><a href="<?php echo $this->webroot."salaryManagements/detailFa/".$fa["FestivalAllowance"]["id"];?>" class="btn btn-primary"><i class="wicon-eye-open"></i>Detail</a></td>
            
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
<?php if(!empty($fas)){ ?>
$(document).ready(function() {
    $('#fas').dataTable( {
    	"sPaginationType": "full_numbers",
        "aaSorting": [[4 , "asc" ]]
    } );
} );
<?php } ?>
</script>