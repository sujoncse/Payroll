<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	16th Dec 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 echo $this->Html->script(array("admin/jquery.dataTables"));
 $loanType = Configure::read("loanType");
 ?>
<h4 class="widgettitle">Loan Management</h4>
<table class="table table-bordered" id="loans">
    <thead>
        <tr>
			<th class="head0">PNo</th>
          	<th class="head0">Employee</th>
            <th class="head1">Designation</th>
            <th class="head0">Loan Type</th>
            <th class="head1">Total</th>
            <th class="head0">Balance</th>
            <th class="head1"><a class="btn btn-info btn-rounded" href="<?php echo $this->webroot."loanManagements/addLoan/";?>"><i class="iconfa-plus"></i>Add Loan</a></th>
        </tr>
    </thead>
    <tbody>
    	 <?php 
        	if(!empty($loans)){
        		foreach($loans as $loan){
					if($loan["Employee"]["first_name"] != ''){
        ?>
        <tr class="gradeA">
			<td><?php echo $loan["Employee"]["employee_code"]; ?></td>
          	<td><?php if(!empty($loan["Employee"]["middle_name"])) echo $loan["Employee"]["first_name"]." ".$loan["Employee"]["middle_name"]." ".$loan["Employee"]["last_name"]; else echo $loan["Employee"]["first_name"]." ".$loan["Employee"]["last_name"]; ?></td>
            <td><?php echo $designations[$loan["Employee"]["designation_id"]];?></td>
            <td><?php echo $loanType[$loan["Loan"]["type"]];?></td>
            <td><?php echo $loan["Loan"]["total"];?></td>
            <td><?php echo $loan["Refund"]["0"]["balance"];?></td>
           	<td><a href="<?php echo $this->webroot."loanManagements/updateLoan/".$loan["Loan"]["id"];?>" class="btn btn-primary" title="Edit user"><i class="icon-pencil"></i>Update</a></td>
        </tr>
        <?php } } }else{ ?>
        <tr class="gradeA"><td colspan="6" style="text-align:center"><b><?php echo "No data found";?></b></td></tr>
        <?php } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
jQuery('#loans').dataTable({
	"sPaginationType": "full_numbers"
});
</script>