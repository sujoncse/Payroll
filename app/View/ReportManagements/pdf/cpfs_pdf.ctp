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
 <pagebreak orientation="landscape" />
<div class="maincontent">
	<?php if(!empty($salaries)){ ?>
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span12">
        		<div class="invoice_logo">
        			<img src="<?php echo $this->webroot;?>img/logo.png" alt="" class="img-polaroid" width="940px"/>
        			<div class="span12" style="text-align:center">
        				<h3>Farm Gate, New Airport Road, Dhaka – 1215</h3>
        				<h3>Bangladesh</h3>
        			</div><br/>
        			<div class="span12" style="text-align:center"><h3><?php if($type == 1) echo "Officer's"; elseif($type == 2) echo "Staff's";?> benevolent fund Information for the month of <?php echo date('F, Y', strtotime(date('Y-m')."+0 month")); ?></h3></div>
        		</div>
        	</div><!--span6-->
		</div>
		<table class="table table-bordered table-invoice-full">
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
        </tr>
			</thead>
			<tbody>
				<?php $i = 1; foreach($salaries as $salary){ ?>
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
        		<?php $i++; if($i %25 == 0){ ?><p style="page-break-before: always">&nbsp;</p> <?php } } ?>
			</tbody>
		</table>
	</div>
	<?php } ?>
</div>