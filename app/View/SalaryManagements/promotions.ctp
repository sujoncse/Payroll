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
<h4 class="widgettitle">Promotions for the month of <?php echo date('F, Y', strtotime(date('Y-m')."+0 month")); ?></h4>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
        	<th class="head1">PNO</th>
          	<th class="head0">Employee</th>
            <th class="head1">Execution Date</th>
            <th class="head0">Promotion from</th>
            <th class="head1"># of Days</th>
            <th class="head1">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($promotions)){ 
        		foreach($promotions as $promotion){
        ?>
        <tr class="gradeA">
        	<td><?php echo $promotion["Employee"]["employee_code"];?></td>
          	<td>
          		<?php 
          			if(!empty($promotion["Employee"]["middle_name"])) 
          				echo $promotion["Employee"]["first_name"]." ".$promotion["Employee"]["middle_name"]." ".$promotion["Employee"]["last_name"];
          			else
          				echo $promotion["Employee"]["first_name"]." ".$promotion["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo date("j'S M, Y",$promotion["Promotion"]["promotion_date"]);?></td>
          	<td><?php echo $designations[$promotion["Promotion"]["previous_designation"]];?></td>
          	<td><?php echo $promotion["Promotion"]["days"];?></td>
          	<td>
          		<a href="<?php echo $this->webroot."salaryManagements/updatePromotion/".$promotion["Employee"]["id"]."/".$type."/".$promotion["Promotion"]["id"];?>" class="btn btn-primary"><i class="wicon-pencil"></i></a>
          	 </td>
            
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script><?php if(!empty($increments)){?>$(document).ready(function(){$('#salary').dataTable({"sPaginationType": "full_numbers"});});<?php } ?></script>