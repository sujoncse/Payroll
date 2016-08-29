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
<style>
.table-bordered th,.table-bordered td { border-: 1px solid #000000;}
</style>

	<table class="table table-bordered" id="salary" border="1" style="border-collapse:collapse">
				<thead>
				  <tr>
					<th rowspan="2">PSN</th>
					<th rowspan="2">Nmae of <?php if($type == 1) echo "Employee"; elseif($type == 2) echo "Employee";?></th>		
					<th rowspan="2">Basic Salary</th>
					<th colspan="5">Provident Fund Loan 1</th>
					<th colspan="5">Provident Fund Loan 2</th>
				  </tr>
				  <tr>
					<th>LOAN-1</th>
					<th>TINS</th>		
					<th>PINS</th>
					<th>DEDUCT</th>
					<th>BALANCE</th>		
					<th>LOAN-2</th>
					<th>TINS</th>		
					<th>PINS</th>
					<th>DEDUCT</th>
					<th>BALANCE</th>	
				  </tr>
				</thead>
				<tbody>
				  
					<?php foreach($temps AS $tmp){
						if(isset($tmp['loan_data1']) || isset($tmp['loan_data2'])){
							echo '<tr>';
							echo '<td>'. $tmp['Employee']['employee_code'] .'</td>';
							echo '<td>'. $tmp['Employee']['first_name'] .' '. $tmp['Employee']['middle_name'] .' '. $tmp['Employee']['last_name'] .'<br>'. $designations[$tmp["Employee"]["designation_id"]] .'</td>';
							echo '<td>'. $tmp['GeneratedSalary']['basic'] .'.00</td>';
							if(isset($tmp['loan_data1'])){
								echo '<td style="text-align: right;">'. $tmp['loan_data1']['loan'] .'.00</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data1']['total_installment'] .'</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data1']['paid_installment'] .'</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data1']['deduct'] .'.00</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data1']['balance'] .'.00</td>';
							}
							else{
								?>
								<td style="text-align: right;">0.00</td>
								<td style="text-align: right;">0</td>
								<td style="text-align: right;">0</td>
								<td style="text-align: right;">0.00</td>
								<td style="text-align: right;">0.00</td>
								<?php
							}
							if(isset($tmp['loan_data2'])){
								echo '<td style="text-align: right;">'. $tmp['loan_data2']['loan'] .'.00</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data2']['total_installment'] .'</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data2']['paid_installment'] .'</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data2']['deduct'] .'.00</td>';
								echo '<td style="text-align: right;">'. $tmp['loan_data2']['balance'] .'.00</td>';
							}
							else{
								?>
								<td style="text-align: right;">0.00</td>
								<td style="text-align: right;">0</td>
								<td style="text-align: right;">0</td>
								<td style="text-align: right;">0.00</td>
								<td style="text-align: right;">0.00</td>
								<?php
							}
							echo '</tr>';
						}
					}
					?>
				</tbody>  
				  
				</table>
			

<script>
<?php if(!empty($temps)){ ?>
$(document).ready(function() {
    $('#salary').dataTable( {
    	"sPaginationType": "full_numbers",
        "aaSorting": [[3 , "asc" ]]
    } );
} );
<?php } ?>
</script>