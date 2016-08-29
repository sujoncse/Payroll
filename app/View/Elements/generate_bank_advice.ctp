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
<!-- <style>
/*.amountdue {text-align: right;}*/
.amountdue h1 {
    background: #fcfcfc none repeat scroll 0 0;
    border: 1px solid #ddd;
    display: inline-block;
    line-height: normal;
    padding: 0;
    text-align: center;
    width: 200px;
}
.table {
    margin-bottom: 0;
}

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {
    background: transparent none repeat scroll 0 0;
    border: 0 none;
    margin: 0;
    padding: 0;
    vertical-align: baseline;
}
.table-invoice-full tr td {
    background: #f7f7f7 none repeat scroll 0 0;
}
.table-invoice tr td, .table-invoice-full tr td {
    border-color: #ddd;
}
.table th, .table td {
    border-top: 1px solid #dddddd;
    line-height: 20px;
    padding: 5px;
    text-align: left;
    vertical-align: top;
}
.table th, .table td {
    line-height: 20px;
    text-align: left;
}
.invoice-table {
    border: 0 none;
    margin-top: 15px;
    width: 100%;
}
.main_cnt{font-size:7px;}
 </style>-->
<div class="maincontent">
	<div class="contentinner">
		<?php if(!empty($salaries)){ ?>
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<!--<div class="span12" style="text-align:center">
        				<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3><br/>
        				<h3><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?><span> Bank Advice </span></h3>
        			</div>-->
        		</div>
        	</div><!--span6-->
		</div>
		<div class="clearfix"><br /></div>
		<div class="row-fluid">
			<div class="span12">
	        	<strong>No:<strong><?php if($type == 1) echo $commonSetting['commonSetting']['officer_file_no']; elseif($type == 2) echo $commonSetting['commonSetting']['staff_file_no'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				DATE: <?php if($type == 1) echo $commonSetting['commonSetting']['officer_bank_date']; elseif($type == 2) echo $commonSetting['commonSetting']['staff_bank_date'];?><?php //echo date("j'S M, Y"); ?></strong>
	        </div><br>
        	<div class="span12 left">The Manager<br/>Agrani Bank Ltd.<br/>Farmgate Branch, Dhaka-1215<br/><br/></div>
			<div class="span12 left" style="text-align: justify;"><strong>Subject:</strong> Instruction for Making Payment of Salary for the month of <?php echo date('F, Y', $curdate); ?> to the <?php if($type == 1) echo "Employees (Grade 1-10)"; elseif($type == 2) echo "Employees (Grade 11-20)";?> of BARC transferring the listed amount shown against each name from the A/C no 0200001187970 of BARC being operated with your bank.<br/><br/></div>
			<div class="span12 left">Dear Sir,</div>
			<div class="span12 left" style="text-align: justify;">Enclosed please find herewith a statement of monthly salary along-with Bank A/C numbers shown against each <?php if($type == 1) echo "Employee (Grade 1-10)"; elseif($type == 2) echo "Employee (Grade 11-20)";?> of BARC for the month of <strong><?php echo date('F, Y', $curdate); ?></strong> to be paid on the <strong><?php echo date('F, Y', $curdate); ?></strong> to be paid on the <strong><?php if($type == 1) echo $commonSetting['commonSetting']['officer_salary_date']; elseif($type == 2) echo $commonSetting['commonSetting']['staff_salary_date'];?>.<br/><br/></div>
			<div class="span12 left" style="text-align: justify;">Please arrange to make payment on the said date by crediting to the bank account numbers of the <?php if($type == 1) echo "Employees (Grade 1-10)"; elseif($type == 2) echo "Employees (Grade 11-20)";?> shown in the enclosed statement but the total amount should not be over and above <strong>Tk.<span id="total"><?php echo $total; ?></span> (<span id="inWord"><?php echo $inWord; ?></span>) only.</strong><br/><br/></div>
			<div class="span12 left" style="text-align: justify;">Please also make arrangement to send credit advice to the individual <?php if($type == 1) echo "Employee (Grade 1-10)"; elseif($type == 2) echo "Employee (Grade 11-20)";?> as early as possible.</div>
			<div class="span12 left"><br/><br/>Thanking you.<br/><br/></div><br/>
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
				---------------------------------------------------<br/>
				Enclosed: ............ Sheet.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
				Director(Finance)<br/><br/><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				----------------------------------------------------<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Director(Support Service)
			</div>
			<!--<div class="span12 left">Yours faithfully,<br/>1.	Director (Finance), BARC<br/>2.	Member Director (A/&F), BARC<br/><br/><br/>Enclosed: ............ Sheet.</div>-->
        </div>
		
		<?php
		$splited_salary = array_chunk($salaries,27);
		
		$j = 1; 
		foreach($splited_salary AS $sals){
			?>
			<pagebreak />
			<div class="row-fluid">
				<div class="span12">
					<div class="invoice_logo" style="text-align:center;"> <strong>
						Bangladesh Agriculture Research Council<br>
						<?php if($type == 1) echo "Employee (Grade 1-10)"; elseif($type == 2) echo "Employee (Grade 11-20)";?> Paybill<br>
						For the month of <?php echo date('F, Y', $curdate); ?>
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
			foreach($sals AS $salary){
			?>
				<tr>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php echo $j; ?></td>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php echo $salary["Employee"]["employee_code"]; ?></td>
					<td style="height: 30px;font-size:12px;" class="left">
						
							<?php 
								if(!empty($salary["Employee"]["middle_name"])) 
									$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
								else
									$name = $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
								echo $name;
							?>
						
					</td>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php echo $designations[$salary["Employee"]["designation_id"]]; /*if($salary["Employee"]["status"] == 2) echo " (AC)"; elseif($salary["Employee"]["status"] == 3) echo " (CC)";*/?></td>
					<td style="height: 30px;font-size:12px;" text-align="center"><?php echo $salary["EmployeePersonal"]["account"]; ?></td>
					<td style="height: 30px;font-size:12px;" class="right" style="text-align:right"><?php echo number_format($salary["GeneratedSalary"]["payable"]).".00"; //$total = $total + $salary["GeneratedSalary"]["payable"];?></td>
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
		<table align="right" style="margin-right:50px;">
			<tbody>
				<tr>
					<td style="height: 30px;font-size:12px;text-align:right" colspan="5" ><strong>Net Payable</strong></td>
					<td style="height: 30px;font-size:14px;text-align:right"><strong><?php echo $total; ?></strong></td>
				</tr>
			</tbody>
		</table>
		<table class="table invoice-table"><tbody><tr><td class="msg-invoice"><h4><?php echo "IN WORD: " . $inWord;?><span id="inWord1"></span></h4></td></tr></tbody></table>
		
		<div class="clearfix">&nbsp;</div>
		<?php }else{ ?>
		<div class="row-fluid"><div class="span12">No data found.</div></div>
		<?php } ?>
	</div>
</div>