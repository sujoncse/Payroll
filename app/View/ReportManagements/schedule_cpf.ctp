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
<h4 class="widgettitle"><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> Schedule of CPF Loan Statement of <?php echo date('F, Y', $curdate); ?></h4>		
<div style="width:100%;text-align:right;margin-bottom:15px;">
	<a href="<?php echo $this->webroot."reportManagements/schedulecpfPdf/". $type ."/schedule_cpf_statement_".date('F, Y', $curdate).".pdf";;?>" class="btn btn-primary">Generate Report</a>
</div>
<table class="table table-bordered" id="salary">
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
				  
					<?php foreach($temps AS $tmp){
						echo '<tr>';
						echo '<td>'. $tmp['Employee']['employee_code'] .'</td>';
						echo '<td>'. $tmp['Employee']['first_name'] .' '. $tmp['Employee']['middle_name'] .' '. $tmp['Employee']['last_name'] .'</td>';
						echo '<td>'. $designations[$tmp["Employee"]["designation_id"]] .'</td>';
						echo '<td>'. $tmp['GeneratedSalary']['basic'] .'</td>';
						echo '<td>'. $tmp['GeneratedDeduction']['cpf1'] .'</td>';
						echo '<td>'. $tmp['GeneratedDeduction']['cpf2'] .'</td>';
						echo '<td>'. $tmp['GeneratedDeduction']['cpf_loan1'] .'</td>';
						echo '<td>'. $tmp['GeneratedDeduction']['cpf_loan2'] .'</td>';
						echo '<td>'. $tmp['GeneratedDeduction']['cpf_interest'] .'</td>';
						echo '<td>'. $tmp['GeneratedDeduction']['arrear_cpf'] .'</td>';
						echo '<td>'. $tmp['total'].'</td>';
						
						echo '</tr>';
					}?>
				</tbody>  
				  
				</table>
			

<script>
<?php if(!empty($temps)){ ?>
$(document).ready(function() {
    $('#salary').dataTable( {
    	"sPaginationType": "full_numbers",
        "aaSorting": [[0 , "asc" ]]
    } );
} );
<?php } ?>
</script>