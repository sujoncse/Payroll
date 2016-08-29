<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	31st Dec 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables","admin/toword"));
 $festivals = Configure::read("festivals");
 
 $festives = array();
 foreach($fas AS $fab){
	 array_push($festives,$fab['FestivalAllowance']['festival']);
 }
 $fabs = array_unique($festives);
 $name_of_fest = '';
 $f = 1;
 foreach($fabs AS $fest){
	$name_of_fest .= $festivals[$fest];
	if(count($fabs) != $f){
		$name_of_fest .= ' and ';
	}
	$f++;
 }
 ?>
<div class="pagetitle">
	<h1><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> Bank Advice <span>of Festival Allowance <?php if(!empty($fas)){ echo $name_of_fest.",".date("F, Y",$fas[0]["FestivalAllowance"]["payment_date"]); } ?> </span></h1>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
		<?php if(!empty($fas)){ ?>
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			
        		</div>
        	</div><!--span6-->
		</div>
		<div class="clearfix"><br /></div>
		<div class="row-fluid">
			<div class="span12">
	        	<div class="span6"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No: <?php echo $commonSetting['commonSetting']['festival_file_no']; ?></strong></div>
	        	<div class="span6" style="text-align:right"><strong><?php echo $commonSetting['commonSetting']['festival_bank_date']; ?></strong></div>
	        </div>
        	<div class="span12 left">The Manager<br/>Agrani Bank Ltd.<br/>Farmgate Branch<br/>Dhaka<br/><br/></div>
			<div class="span12 left"><strong>Subject:</strong> Instruction for Making Payment of Festival Allowance of <?php echo $name_of_fest.",".date("F, Y",$fas[0]["FestivalAllowance"]["payment_date"]);?> to the <?php if($type == 1) echo "officers"; elseif($type == 2) echo "staffs";?> of BARC transfering the listed amount shown agains each name <u>from the A/C # 0200001187970 of BARC being operated with your bank</u>.<br/><br/></div>
			<div class="span12 left">Dear Sir,</div>
			<div class="span12 left">Enclosed please find herewith a statement of Festival Allowance of <?php echo $name_of_fest;?>, along-with Bank A/C numbers shown against each <?php if($type == 1) echo "Employee (Grade 1-10)"; elseif($type == 2) echo "Employee (Grade 11-20)";?> of BARC to be paid on <strong><?php echo date("j'S M, Y",$fas[0]["FestivalAllowance"]["payment_date"]); ?></strong>.<br/><br/></div>
			<div class="span12 left">Please arrange to make payment on the said date by crediting to the bank account nos. of the <?php if($type == 1) echo "officers"; elseif($type == 2) echo "staffs";?> shown in the enclosed statement but the total amount should not be over and above <strong>Tk.<span id="total"></span> (<span id="inWord"></span>) </strong>only.<br/><br/></div>
			<div class="span12 left">Please also make arrangement to send credit advice to the individual <?php if($type == 1) echo "officer"; elseif($type == 2) echo "staff";?> as early as possible.</div>
			<div class="span12 left">Thanking you.<br/><br/></div>
			<div class="span12 left">Yours faithfully,<br/>1.	Director (Finance), BARC<br/>2.	Member Director (S.S), BARC<br/><br/>Enclosed: ............ Sheet.</div><br>
        </div>
		<br><br>
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
				<?php  $i = 1; $total = 0; foreach($fas as $fa){ ?>
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
					<td text-align="center"><?php echo $designations[$fa["FestivalAllowance"]["designation_id"]]; if($fa["FestivalAllowance"]["status"] == 4) echo " (AC)"; elseif($fa["FestivalAllowance"]["status"] == 5) echo " (CC)";?></td>
					<td text-align="center"><?php echo $fa["EmployeePersonal"]["account"]; ?></td>
					<td class="right"><?php echo number_format($fa["FestivalAllowance"]["payable"])."/-"; $total = $total + $fa["FestivalAllowance"]["payable"];?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
		<table class="table invoice-table"><tbody><tr><td class="msg-invoice"><h3><?php echo "IN WORD: ";?><span id="inWord1"></span></h3></td></tr></tbody></table>
		<div class="amountdue">
			<h1><span>Net Payable:</span> <?php echo number_format($total)."/-";?></h1> <br />
			<a href="<?php echo $this->webroot."reportManagements/generateFaBankAdvice/".$type."/BA_FA_".date("F, Y",$fas[0]['FestivalAllowance']['payment_date']).".pdf"; ?>" class="btn btn-primary btn-large">PDF</a>
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