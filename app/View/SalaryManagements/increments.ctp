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
<h4 class="widgettitle">Increments for the month of <?php echo date('F, Y', $currentTime); ?></h4>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
        	<th class="head1">PNO</th>
          	<th class="head0">Employee</th>
            <th class="head0">Basic</th>
            <th class="head1">Execution Date</th>
            <th class="head0">Increment Rate</th>
            <th class="head1"># of Days</th>
            <th class="head0">Fractional Amount</th>
            <th class="head1">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($increments)){ 
        		foreach($increments as $increment){ //pr($increment);  die();
        ?>
        <tr class="gradeA">
        	<td><?php echo $increment["Employee"]["employee_code"];?></td>
          	<td>
          		<?php 
          			if(!empty($increment["Employee"]["middle_name"])) 
          				echo $increment["Employee"]["first_name"]." ".$increment["Employee"]["middle_name"]." ".$increment["Employee"]["last_name"];
          			else
          				echo $increment["Employee"]["first_name"]." ".$increment["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo $increment["Salary"]["basic"];?></td>
          	<td><?php echo date("j'S M, Y",$increment["Increment"]["increment_date"]);?></td>
          	<td><?php if($increment["Employee"]["increment_number"] <= $increment["PayScale"]["increment_iteration"]) echo $increment["PayScale"]["increment"]; else echo $increment["PayScale"]["eb"]; ?></td>
          	<td><?php echo $increment["Increment"]["days"];?></td>
          	<td><?php echo $increment["Increment"]["amount"] - $increment["Increment"]["previous_total"];?></td>
          	<td>
          		<a href="<?php echo $this->webroot."salaryManagements/updateIncrement/".$increment["Employee"]["id"]."/".$type."/".$increment["Increment"]["id"];?>" class="btn btn-primary"><i class="wicon-pencil"></i></a>
          	 </td>
            
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script><?php if(!empty($increments)){?>$(document).ready(function(){$('#salary').dataTable({"sPaginationType": "full_numbers"});});<?php } ?></script>