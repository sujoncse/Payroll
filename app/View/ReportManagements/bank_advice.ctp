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
//pr($commonSetting);
 ?>
<div class="pagetitle">
	<h1><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?><span> Bank Advice </span></h1>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
		<?php if(!empty($salaries)){ ?>
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<!--<div class="span12" style="text-align:center">
        				<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3><br/>
        				<h3>Bangladesh</h3>
        			</div>-->
        		</div>
        	</div><!--span6-->
		</div>
		<div class="clearfix"><br /></div>
		<div class="row-fluid">
			<div class="span12">
	        	<div class="span6"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No: <?php if($type == 1) echo $commonSetting['commonSetting']['officer_file_no']; elseif($type == 2) echo $commonSetting['commonSetting']['staff_file_no'];?></strong></div>
	        	<div class="span6" style="text-align:right"><strong><?php if($type == 1) echo $commonSetting['commonSetting']['officer_bank_date']; elseif($type == 2) echo $commonSetting['commonSetting']['staff_bank_date'];?></strong></div>
	        </div>
        	<div class="span12 left">The Manager<br/>Agrani Bank Ltd.<br/>Farmgate Branch<br/>Dhaka<br/><br/></div>
			<div class="span12 left"><strong>Subject:</strong> Instruction for Making Payment of Salary for the month of <?php echo date('F, Y', $curdate); ?> to the <?php if($type == 1) echo "Employees (Grade 1-10)"; elseif($type == 2) echo "Employees (Grade 11-20)";?> of BARC transferring the listed amount shown against each name from the A/C no 0200001187970 of BARC being operated with your bank.<br/><br/></div>
			<div class="span12 left">Dear Sir,</div>
			<div class="span12 left">Enclosed please find herewith a statement of monthly salary along-with Bank A/C numbers shown against each officer of BARC for the month of <strong><?php echo date('F, Y', $curdate); ?></strong> to be paid on the <strong><?php if($type == 1) echo $commonSetting['commonSetting']['officer_salary_date']; elseif($type == 2) echo $commonSetting['commonSetting']['staff_salary_date'];?>.</strong>.<br/><br/></div>
			<div class="span12 left">Please arrange to make payment on the said date by crediting to the bank account nos. of the <?php if($type == 1) echo "Employees (Grade 1-10)"; elseif($type == 2) echo "Employees (Grade 11-20)";?> shown in the enclosed statement but the total amount should not be over and above <strong>Tk.<span id="total"></span> (<span id="inWord"></span>) only.</strong><br/><br/></div>
			<div class="span12 left">Please also make arrangement to send credit advice to the individual officer as early as possible.</div>
			<div class="span12 left">Thanking you.<br/><br/></div>
			<div class="span12 left">Yours faithfully,<br/>1.	Director (Finance), BARC<br/>2.	Member Director (A/&F), BARC<br/>Enclosed: ............ Sheet.</div>
        </div>
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
					<td text-align="center"><?php echo $designations[$salary["Employee"]["designation_id"]]; /*if($salary["Employee"]["status"] == 2) echo " (AC)"; elseif($salary["Employee"]["status"] == 3) echo " (CC)";*/?></td>
					<td text-align="center"><?php echo $salary["EmployeePersonal"]["account"]; ?></td>
					<td class="right"><?php echo number_format($salary["GeneratedSalary"]["payable"])."/-"; $total = $total + $salary["GeneratedSalary"]["payable"];?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
		<table class="table invoice-table"><tbody><tr><td class="msg-invoice"><h3><?php echo "IN WORD: ";?><span id="inWord1"></span></h3></td></tr></tbody></table>
		<div class="amountdue">
			<h1><span>Net Payable:</span> <?php echo number_format($total)."/-";?></h1> <br />
			<a href="<?php echo $this->webroot."reportManagements/generateBankAdvice/".$type."/BA_".date('F, Y', $curdate).".pdf"; ?>" class="btn btn-primary btn-large">PDF</a>
		</div>
		<div class="clearfix">&nbsp;</div>
		<?php }else{ ?>
		<div class="row-fluid"><div class="span12">No data found.</div></div>
		<?php } ?>
	</div>
</div>
<script>
	var total = <?php echo $total; ?>;
	total = total+"/-";
	var inWord = toWords('<?php echo $total; ?>'); 
	$('#inWord').html(inWord);
	$('#inWord1').html(inWord);
	$('#total').html(total);
</script>