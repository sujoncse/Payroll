<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables"));
 ?>
 <?php $msg = $this->Session->read("Message");  if(!empty($msg["flash"]["message"])){ ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	<button data-dismiss="alert" class="close" type="button">×</button>
  	<strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<h4 class="widgettitle"><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> Schedule of Contriburory Provident Fund information for the month of <?php echo date('F, Y', strtotime(date('Y-m')."+0 month")); ?></h4>
<table class="table table-bordered" id="salary">
    <thead>
        <tr>
        	<th class="head0" style="text-align:center">Emp. Code</th>
          	<th class="head0" style="text-align:center">Name</th>
            <th class="head1" style="text-align:center">Designation</th>
            <th class="head0" style="text-align:center">Basic</th>
            <th class="head1" style="text-align:center">CPF Contribution <br/>(8.33%)<br/>(1)</th>
            <th class="head0" style="text-align:center">Aditional CPF Contribution <br/>(2.50%)<br/>(2)</th>
            <th class="head1" style="text-align:center">1st CPF Advance<br/>(3)</th>
            <th class="head0" style="text-align:center">2nd CPF Advance<br/>(4)</th>
            <th class="head1" style="text-align:center">CPF Interest<br/>(5)</th>
            <th class="head0" style="text-align:center">Arrear CPF<br/>(6)</th>
            <th class="head1" style="text-align:center">Total<br/>(1+2+3+4+5+6)</th>
            <?php if($type == 1){?>
            <th class="head0 right"><a href="<?php echo $this->webroot."reportManagements/cpfsPdf/1/Officers_CPF_".date('F, Y').".pdf";;?>" class="btn btn-primary"><img src="<?php echo $this->webroot."img/pdf2.png";?>" width="50px"/></a></th>
            <?php }else{ ?>
            <th class="head0 right"><a href="<?php echo $this->webroot."reportManagements/cpfsPdf/2/Staffs_CPF_".date('F, Y').".pdf";;?>" class="btn btn-primary"><img src="<?php echo $this->webroot."img/pdf2.png";?>" width="50px"/></a></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    	<?php 
    		if(!empty($salaries)){
    			foreach($salaries as $salary){ 
        ?>
        <tr class="gradeA">
        	<td style="text-align:center"><?php echo $salary["Employee"]["employee_code"];?></td>
          	<td>
          		<?php 
          			if(!empty($salary["Employee"]["middle_name"])) 
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
          			else
          				echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
          		?>
          	</td>
          	<td><?php echo $designations[$salary["Employee"]["designation_id"]]; if($salary["Employee"]["status"] == 2) echo " (AC)"; elseif($salary["Employee"]["status"] == 3) echo " (CC)";?></td>
          	<td style="text-align:right"><?php echo $salary["GeneratedSalary"]["basic"];?></td>
          	<td style="text-align:right"><?php echo $salary["GeneratedDeduction"]["cpf1"];?></td>
          	<td style="text-align:right"><?php if(!empty($salary["GeneratedDeduction"]["cpf2"])) echo $salary["GeneratedDeduction"]["cpf2"]; else echo "0";?></td>
          	<td style="text-align:right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan1"])) echo $salary["GeneratedDeduction"]["cpf_loan1"]; else echo "0";?></td>
          	<td style="text-align:right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_loan2"])) echo $salary["GeneratedDeduction"]["cpf_loan2"]; else echo "0";?></td>
          	<td style="text-align:right"><?php if(!empty($salary["GeneratedDeduction"]["cpf_interest"])) echo $salary["GeneratedDeduction"]["cpf_interest"]; else echo "0"; ?></td>
          	<td style="text-align:right"><?php if(!empty($salary["GeneratedDeduction"]["arrear_cpf"])) echo $salary["GeneratedDeduction"]["arrear_cpf"]; else echo "0";?></td>
          	<td style="text-align:right"><?php echo $salary["GeneratedDeduction"]["cpf1"]+$salary["GeneratedDeduction"]["cpf2"]+$salary["GeneratedDeduction"]["cpf_loan1"]+$salary["GeneratedDeduction"]["cpf_loan2"]+$salary["GeneratedDeduction"]["cpf_interest"]+$salary["GeneratedDeduction"]["arrear_cpf"];?></td>
          	<td style="text-align:center"><a href="<?php echo $this->webroot."salaryManagements/generatedDetail/".$salary["GeneratedSalary"]["id"];?>" class="btn btn-primary"><i class="icon-eye-open"></i></a></td>
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
<?php if(!empty($salaries)){ ?>
$(document).ready(function() {
    $('#salary').dataTable( {
    	"sPaginationType": "full_numbers",
        "aaSorting": [[0 , "asc" ]]
    } );
} );
<?php } ?>
</script>