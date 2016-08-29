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
	<?php if(!empty($fas)){ ?>
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
			<div class="span12 left">The Manager<br/>Agrani Bank Ltd.<br/>Farmgate Branch<br/>Dhaka<br/><br/></div>
			<div class="span12 left"><strong>Subject:</strong> Instruction for Making Payment of Festival Allowance of <?php echo $festivals[$fas[0]["FestivalAllowance"]["festival"]].",".date("F, Y");?> to the <?php if($type == 1) echo "officers"; elseif($type == 2) echo "staffs";?> of BARC transfering the listed amount shown agains each name <u>from the A/C # 009954 of BARC being operated with your bank</u>.<br/><br/></div>
			<div class="span12 left">Dear Sir,</div>
			<div class="span12 left">Enclosed please find herewith a statement of Festival Allowance of <?php echo $festivals[$fas[0]["FestivalAllowance"]["festival"]];?>, along-with Bank A/C numbers shown against each <?php if($type == 1) echo "officer"; elseif($type == 2) echo "staff";?> of BARC to be paid on <strong><?php echo date("j'S M, Y",$fas[0]["FestivalAllowance"]["payment_date"]); ?></strong>.<br/><br/></div>
			<div class="span12 left">Please arrange to make payment on the said date by crediting to the bank account nos. of the <?php if($type == 1) echo "officers"; elseif($type == 2) echo "staffs";?> shown in the enclosed statement but the total amount should not be over and above <strong>Tk.<?php echo $total; ?> (<?php echo $inWord; ?>) </strong>only.<br/><br/></div>
			<div class="span12 left">Please also make arrangement to send credit advice to the individual <?php if($type == 1) echo "officer"; elseif($type == 2) echo "staff";?> as early as possible.</div>
			<div class="span12 left">Thanking you.<br/><br/></div>
			<div class="span11 left">Yours faithfully,<br/><br/><br/><br/><br/>1.	Director (Finance), BARC<br/><br/><br/><br/><br/><br/>2.	Member Director (S.S), BARC<br/><br/><br/><br/><br/><br/>Enclosed: ............ Sheet.</div>
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
				<?php  $i = 1; foreach($fas as $fa){ ?>
				<tr>
					<td text-align="center"><?php echo $i; ?></td>
					<td text-align="center"><?php echo $fa["Employee"]["employee_code"]; ?></td>
					<td class="left">
					<strong>
	          			<?php 
	      					if(!empty($fa["Employee"]["middle_name"])) 
	      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["middle_name"]." ".$fa["Employee"]["last_name"];
	      					else
	      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["last_name"];
	      					echo $name;
	      				?>
	      				</strong>
					</td>
					<td text-align="center"><?php echo $designations[$fa["FestivalAllowance"]["designation_id"]]; if($salary["FestivalAllowance"]["status"] == 4) echo " (AC)"; elseif($salary["FestivalAllowance"]["status"] == 5) echo " (CC)";?></td>
					<td text-align="center"><?php echo $fa["EmployeePersonal"]["account"]; ?></td>
					<td class="right"><?php echo number_format($fa["FestivalAllowance"]["payable"])."/-";?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
		<br/>
		<table class="table table-bordered table-invoice-full">
			<tbody>
				<tr>
					<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><b>Total</b></td><td style="text-align:right"><b><?php echo $total."/-";?></b></td>
				</tr>
				<tr><td colspan="6"><h3><?php echo "IN WORD: ".$inWord;?></h3></td></tr>
			</tbody>
		</table>
	</div>
	<?php } ?>
</div>