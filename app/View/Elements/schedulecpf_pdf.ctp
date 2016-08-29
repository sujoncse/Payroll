<?php
/**
 * @Developed By	:	BARC
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables","admin/toword"));
 ?>

<div class="row-fluid">
		<div class="span12">
				<div class="invoice_logo"><img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
		</div><!--span6-->
		<div class="span12" style="text-align:center;margin-bottom:25px">
		
		<b><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's"; echo ' Schudule of CPF of '. date('F, Y', $curdate);	?></b>
			
		</div>
</div> 
<br><br><br><br><br>
<table class="table table-bordered" border="1" style="border-collapse:collapse" align="center">
	<thead>
		<tr>
			<th >PAGE NUMBER</th>
			<th >C.P.F. (10%)</th>
			<th >C.P.F. (2.5%)</th>
			<th >C.P.F. 1st Advance</th>
			<th >C.P.F. 2nd Advance</th>
			<th >C.P.F. Interest</th>
			<th >C.P.F. ARREAR</th>
			<th>TOTAL</th>
		</tr>
				 
	</thead>
	<tbody>
				  
		<?php 
		$k = 2;
		foreach($page_details AS $details){
			echo '<tr>';
			echo '<td> Page no = '. $k .'</td>';
			echo '<td style="text-align:right;">'. $details['cpf1_total'] .'</td>';
			echo '<td style="text-align:right;">'. $details['cpf2_total'] .'</td>';
			echo '<td style="text-align:right;">'. $details['cpf_loan1_total'] .'</td>';
			echo '<td style="text-align:right;">'. $details['cpf_loan2_total'] .'</td>';
			echo '<td style="text-align:right;">'. $details['cpf_interest_total'] .'</td>';
			echo '<td style="text-align:right;">'. $details['arrear_cpf_total'] .'</td>';
			echo '<td style="text-align:right;">'. $details['all_total'] .'</td>';
			echo '</tr>';
			$k++;
		}?>
		<tr>
		<td>GRAND TOTAL</td>
		<td style="text-align:right;"><?php echo $grand_total_by_page['cpf1_grand_total']; ?></td>
		<td style="text-align:right;"><?php echo $grand_total_by_page['cpf2_grand_total']; ?></td>
		<td style="text-align:right;"><?php echo $grand_total_by_page['cpf_loan1_grand_total']; ?></td>
		<td style="text-align:right;"><?php echo $grand_total_by_page['cpf_loan2_grand_total']; ?></td>
		<td style="text-align:right;"><?php echo $grand_total_by_page['cpf_interest_grand_total']; ?></td>
		<td style="text-align:right;"><?php echo $grand_total_by_page['arrear_cpf_grand_total']; ?></td>
		<td style="text-align:right;"><?php echo $grand_total_by_page['grand_total']; ?></td>
		</tr>
	</tbody>  
				  
</table>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PASSED FOR PAYMENT TK <?php echo $grand_total_by_page['grand_total']; ?></b><br><br>
<div style="margin-left:600px;">------------------------------------<br>
DIRECTOR (FINANCE)<br>
BARC</div>

<?php 
$k = 1;
foreach ($divide_data AS $data){?>
	<pagebreak /> 
	<div class="row-fluid">
		<div class="span12">
				<div class="invoice_logo"><img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/></div>
		</div><!--span6-->
		<div class="span12" style="text-align:center;margin-bottom:25px">
		
		<b><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's"; echo ' Schudule of CPF of '. date('F, Y', $curdate);	?></b>
			
		</div>
	</div>
	<table class="table table-bordered" id="salary" border="1" style="border-collapse:collapse">
	<thead>
		<tr>
			<th >PNo</th>
			<th >Nmae of <?php if($type == 1) echo "Officer"; elseif($type == 2) echo "Staff";?></th>		
			<th >Designation</th>
			<th >Basic Pay</th>
			<th >C.P.F.1 (10%)</th>
			<th >C.P.F.2 (2.5%)</th>
			<th >C.P.F. 1st Advance</th>
			<th >C.P.F. 2nd Advance</th>
			<th >C.P.F. Interest</th>
			<th >C.P.F. ARREAR</th>
			<th>TOTAL</th>
		</tr>
				 
	</thead>
	<tbody>
				  
	<?php 
	$i=1;
	foreach($data AS $tmp){
		echo '<tr>';
		echo '<td>'. $tmp['Employee']['employee_code'] .'</td>';
		echo '<td>'. $tmp['Employee']['first_name'] .' '. $tmp['Employee']['middle_name'] .' '. $tmp['Employee']['last_name'] .'</td>';
		echo '<td>'. $designations[$tmp["Employee"]["designation_id"]] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['GeneratedSalary']['basic'] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['GeneratedDeduction']['cpf1'] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['GeneratedDeduction']['cpf2'] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['GeneratedDeduction']['cpf_loan1'] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['GeneratedDeduction']['cpf_loan2'] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['GeneratedDeduction']['cpf_interest'] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['GeneratedDeduction']['arrear_cpf'] .'</td>';
		echo '<td style="text-align:right;">'. $tmp['total'].'</td>';
		echo '</tr>';
		
	$i++;
	}?>
	<tr>
	<td></td>
	<td>SUB TOTAL</td>
	<td></td>
	<td></td>
	<td style="text-align:right;"><?php echo $page_details[$k]['cpf1_total'];?></td>
	<td style="text-align:right;"><?php echo $page_details[$k]['cpf2_total'];?></td>
	<td style="text-align:right;"><?php echo $page_details[$k]['cpf_loan1_total'];?></td>
	<td style="text-align:right;"><?php echo $page_details[$k]['cpf_loan2_total'];?></td>
	<td style="text-align:right;"><?php echo $page_details[$k]['cpf_interest_total'];?></td>
	<td style="text-align:right;"><?php echo $page_details[$k]['arrear_cpf_total'];?></td>
	<td style="text-align:right;"><?php echo $page_details[$k]['all_total'];?></td>
	</tr>
	</tbody>  
				  
	</table>
	
<?php $k++;
} 
?>