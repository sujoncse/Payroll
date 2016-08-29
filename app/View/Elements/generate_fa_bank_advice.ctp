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
<div class="maincontent">
	<?php if(!empty($fas)){ ?>
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<div class="span12" style="text-align:center">
        			</div>
        		</div>
        	</div><!--span6-->
		</div>
		<div class="clearfix"><br /></div>
		<div class="row-fluid">
			<div class="span12">
	        	<strong>No: <strong><?php echo date('F, Y', $curdate); ?></strong> to be paid on the <strong><?php if($type == 1) echo $commonSetting['commonSetting']['festival_file_no']; elseif($type == 2) echo $commonSetting['commonSetting']['festival_file_no'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				DATE: <?php echo $commonSetting['commonSetting']['festival_bank_date']; ?></strong>
	        </div><br>
			<div class="span12 left">The Manager<br/>Agrani Bank Ltd.<br/>Farmgate Branch<br/>Dhaka<br/><br/></div>
			<div class="span12 left"><strong>Subject:</strong> Instruction for Making Payment of Festival Allowance of <?php echo $name_of_fest.",".date("F, Y",$fas[0]["FestivalAllowance"]["payment_date"]);?> to the <?php if($type == 1) echo "Employee Grade( 1-10 )"; elseif($type == 2) echo "Employee Grade( 11-20 )";?> of BARC transfering the listed amount shown agains each name from the A/C # 0200001187970 of BARC being operated with your bank.<br/><br/></div>
			<div class="span12 left">Dear Sir,</div>
			<div class="span12 left">Enclosed please find herewith a statement of Festival Allowance of <?php echo $name_of_fest;?>, along-with Bank A/C numbers shown against each <?php if($type == 1) echo "Employee Grade( 1-10 )"; elseif($type == 2) echo "Employee Grade( 11-20 )";?> of BARC to be paid on <strong><?php echo date("j'S M, Y",$fas[0]["FestivalAllowance"]["payment_date"]); ?></strong>.<br/><br/></div>
			<div class="span12 left">Please arrange to make payment on the said date by crediting to the bank account nos. of the <?php if($type == 1) echo "Employee Grade( 1-10 )"; elseif($type == 2) echo "Employee Grade( 11-20 )";?> shown in the enclosed statement but the total amount should not be over and above <strong>Tk.<?php echo $total; ?> (<?php echo $inWord; ?>) </strong>only.<br/><br/></div>
			<div class="span12 left">Please also make arrangement to send credit advice to the individual <?php if($type == 1) echo "Employee Grade( 1-10 )"; elseif($type == 2) echo "Employee Grade( 11-20 )";?> as early as possible.</div>
			<div class="span12 left">Thanking you.<br/><br/></div>
			<div class="span12">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Yours faithfully,<br/><br/><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				----------------------------------------<br/>
				Enclosed: ............ Sheet.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
				Director(Finance)<br/><br/><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				-----------------------------------------<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Director(Support Service)
			</div>
        </div>
		
		<?php
		$splited_salary = array_chunk($fas,27);
		
		$j = 1; 
		foreach($splited_salary AS $sals){
			?>
			<pagebreak />
			<div class="row-fluid">
				<div class="span12">
					<div class="invoice_logo" style="text-align:center;"> <strong>
						Bangladesh Agriculture Research Council<br>
						<?php if($type == 1) echo "Employee (Grade 1-10)"; elseif($type == 2) echo "Employee (Grade 11-20)";?> Paybill<br>
						For the Festival Allowance of <?php echo $name_of_fest; ?>
						</strong>
					</div>
				</div>
			</div>
			<br>
			<table class="table table-bordered table-invoice-full" border="1" style="border-collapse:collapse" align="center">
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
			<?php
			foreach($sals AS $fa){
			?>
				<tr>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php echo $i; ?></td>
					<td style="height: 30px;font-size:12px;" -align="center"><?php echo $fa["Employee"]["employee_code"]; ?></td>
					<td style="height: 30px;font-size:12px;" class="left">
					
	          			<?php 
	      					if(!empty($fa["Employee"]["middle_name"])) 
	      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["middle_name"]." ".$fa["Employee"]["last_name"];
	      					else
	      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["last_name"];
	      					echo $name;
	      				?>
	      			
					</td>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php echo $designations[$fa["FestivalAllowance"]["designation_id"]];?></td>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php echo $fa["EmployeePersonal"]["account"]; ?></td>
					<td style="height: 30px;font-size:12px;" class="right" style="text-align:right"><?php echo number_format($fa["FestivalAllowance"]["payable"])."/-";?></td>
				</tr>
			<?php
			$j++; 
			}
			?>
			</tbody>
		</table>
		
		<?php		
		}
		?>
		<table class="table table-bordered table-invoice-full">
			<tbody>
				<tr>
					<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><b>Total</b></td><td style="text-align:right"><b><?php echo $total."/-";?></b></td>
				</tr>
				<tr><td colspan="6"><h3><?php echo "IN WORD: ".$inWord;?></h3></td></tr>
			</tbody>
		</table>
		
		<!--
        <p style="page-break-before: always">&nbsp;</p>
		<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php //echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<div class="span12" style="text-align:center">
        			</div>
        		</div>
        	</div>
		</div>
		<br>
		<table class="table table-bordered table-invoice-full" border="1" style="border-collapse:collapse" width="100%">
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
				<?php // $i = 1; foreach($fas as $fa){ ?>
				<tr>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php //echo $i; ?></td>
					<td style="height: 30px;font-size:12px;" -align="center"><?php //echo $fa["Employee"]["employee_code"]; ?></td>
					<td style="height: 30px;font-size:12px;" class="left">
					
	          			<?php 
	      					/*if(!empty($fa["Employee"]["middle_name"])) 
	      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["middle_name"]." ".$fa["Employee"]["last_name"];
	      					else
	      						$name = $fa["Employee"]["first_name"]." ".$fa["Employee"]["last_name"];
	      					echo $name;*/
	      				?>
	      			
					</td>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php //echo $designations[$fa["FestivalAllowance"]["designation_id"]];?></td>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php //echo $fa["EmployeePersonal"]["account"]; ?></td>
					<td style="height: 30px;font-size:12px;" class="right" style="text-align:right"><?php //echo number_format($fa["FestivalAllowance"]["payable"])."/-";?></td>
				</tr>
				<?php //$i++; } ?>
			</tbody>
		</table>
		<br/>
		<table class="table table-bordered table-invoice-full">
			<tbody>
				<tr>
					<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><b>Total</b></td><td style="text-align:right"><b><?php //echo $total."/-";?></b></td>
				</tr>
				<tr><td colspan="6"><h3><?php //echo "IN WORD: ".$inWord;?></h3></td></tr>
			</tbody>
		</table>-->
	</div>
	<?php } ?>
</div>