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
        				<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3><br/>
        				<h3>Bangladesh</h3>
        			</div>
        		</div>
        	</div><!--span6-->
		</div>
		<div class="clearfix"><br /></div>
		<div class="row-fluid">
			<div class="span11"><strong>No: ARC/1-37/SALAY ACCOUNTS/89&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("j'S M, Y"); ?></strong><br/><br/></div>
        	<div class="span11 left">The Manager<br/>Agrani Bank Ltd.<br/>Farmgate Branch<br/>Dhaka<br/><br/></div>
			<div class="span11 left" style="text-align:justify"><strong>Subject:</strong> Instruction for Making Payment of Salary for the month of <?php echo date('F, Y'); ?> to the <?php if($type == 1) echo "officers"; elseif($type == 2) echo "staffs";?> of BARC transferring the listed amount shown against each name from the A/C no 009954 of BARC being operated with your bank.<br/><br/></div>
			<div class="span11 left">Dear Sir,</div>
			<div class="span11 left" style="text-align:justify">Enclosed please find herewith a statement of monthly salary along-with Bank A/C numbers shown against each <?php if($type == 1) echo "officer"; elseif($type == 2) echo "staff";?> of BARC for the month of <strong><?php echo date('F, Y'); ?></strong> to be paid on the 1st working day of <strong><?php echo date('F, Y', strtotime(date('Y-m')." +1 month")); ?></strong>.<br/><br/></div>
			<div class="span11 left" style="text-align:justify">Please arrange to make payment on the said date by crediting to the bank account nos. of the <?php if($type == 1) echo "officers"; elseif($type == 2) echo "staffs";?> shown in the enclosed statement but the total amount should not be over and above <strong>Tk.<?php echo $total."/-";?> (<?php echo $inWord;?>) only.</strong><br/><br/></div>
			<div class="span11 left" style="text-align:justify">Please also make arrangement to send credit advice to the individual <?php if($type == 1) echo "officers"; elseif($type == 2) echo "staffs";?> as early as possible.</div>
			<div class="span11 left"><br/><br/><br/>Thanking you.<br/><br/></div>
			<div class="span11 left">Yours faithfully,<br/><br/><br/><br/><br/>1.	Director (Finance), BARC<br/><br/><br/><br/><br/><br/>2.	Member Director (A/&F), BARC<br/><br/><br/><br/><br/><br/>Enclosed: ............ Sheet.</div>
        </div>
        <p style="page-break-before: always">&nbsp;</p>
		<table class="table table-bordered table-invoice-full">
			<thead>
				<tr>
					<th class="head0" style="text-align:center">Sl</th>
					<th class="head1" style="text-align:center">PSN</th>
					<th class="head0" style="text-align:center">Name</th>
					<th class="head1" style="text-align:center">Designation</th>
					<th class="head0" style="text-align:center">Bank A/C</th>
					<th class="head1 right">Payable Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php  $i = 1; $total = 0; foreach($salaries as $salary){ ?>
				<tr>
					<td text-align="center"><?php echo $i; ?></td>
					<td text-align="center"><?php echo $salary["Employee"]["employee_code"]; ?></td>
					<td class="left">
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
					<td text-align="center"><?php echo $designations[$salary["Employee"]["designation_id"]]; if($salary["Employee"]["status"] == 2) echo " (AC)"; elseif($salary["Employee"]["status"] == 3) echo " (CC)";?></td>
					<td text-align="center"><?php echo $salary["EmployeePersonal"]["account"]; ?></td>
					<td class="right"><?php echo number_format($salary["GeneratedSalary"]["payable"])."/-";?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
		<table class="table invoice-table"><tbody><tr><td class="msg-invoice"><h3><?php echo "IN WORD: ".$inWord;?></h3></td></tr></tbody></table>
	</div>
	<?php } ?>
</div>