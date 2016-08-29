<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables","admin/toword"));
 ?>
<div class="maincontent">
	<?php if(!empty($salaries)){ ?>
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<div class="span12" style="text-align:center">
        				<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3>
        				<h3>Bangladesh</h3>
        			</div><br/>
        			<div class="span12" style="text-align:center"><h3><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> benevolent fund Information for the month of <?php echo date('F, Y', strtotime(date('Y-m')."+0 month")); ?></h3></div>
        		</div>
        	</div><!--span6-->
		</div>
		<table class="table table-bordered table-invoice-full">
			<thead>
				<tr>
					<th class="head0" style="text-align:center">Sl</th>
					<th class="head1" style="text-align:center">PSN</th>
					<th class="head0" style="text-align:left" class="width40">Name</th>
					<th class="head1" style="text-align:left">Designation</th>
					<th class="head0" style="text-align:center">Basic</th>
					<th class="head1" style="text-align:center">Benevolent Fund</th>
					<th class="head0 right">Remarks</th>
				</tr>
			</thead>
			<tbody>
				<?php  $i = 1; foreach($salaries as $salary){ ?>
				<tr>
					<td style="text-align:center"><?php echo $i; ?></td>
					<td style="text-align:center"><?php echo $salary["Employee"]["employee_code"]; ?></td>
					<td style="text-align:left">
					<strong>
	          			<?php 
	      					if(!empty($salary["Employee"]["middle_name"])) 
	      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
	      					else
	      						$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
	      					echo $name;
	      				?>
	      				</strong>
					</td>
					<td style="text-align:left"><?php echo $designations[$salary["Employee"]["designation_id"]]; if($salary["Employee"]["status"] == 2) echo " (AC)"; elseif($salary["Employee"]["status"] == 3) echo " (CC)";?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedSalary"]["basic"]; ?></td>
					<td style="text-align:center"><?php echo $salary["GeneratedDeduction"]["benevolent_fund"]; ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
	</div>
	<?php } ?>
</div>