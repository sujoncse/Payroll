<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 echo $this->Html->script(array("admin/jquery.dataTables"));
 $serviceStatus = Configure::read("serviceStatus");
 $grades = Configure::read("grades");
 
 ?>
 <?php $msg = $this->Session->read("Message");  if(!empty($msg["flash"]["message"])){ ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
	<button data-dismiss="alert" class="close" type="button">×</button>
  	<strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<h4 class="widgettitle">Employee Information</h4>
<table class="table table-bordered" id="employees">
	<colgroup>
    	<col class="con0" style="align: center; width: 4%"/>
        <col class="con1" style="align: center; width: 5%"/>
        <col class="con0" style="align: center; width: 25%"/>
        <col class="con1" style="align: center; width: 20%"/>
        <col class="con0" style="align: center; width: 10%"/>
        <col class="con1" style="align: center; width: 10%"/>
        <col class="con1" style="align: center; width: 6%"/>
        <col class="con1" style="align: center; width: 20%"/>
	</colgroup>
    <thead>
	    <tr>
	      	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
	        <th class="head1" style="text-align:center">Employee Code</th>
	        <th class="head1">Name</th>
	        <th class="head0">Designation</th>
	        <th class="head1">Grade</th>
	        <th class="head0">Basic</th>
	        <th class="head1" style="text-align:center">A/C</th>
	        <th class="head0"><a class="btn btn-primary" href="<?php echo $this->webroot."employeeManagements/addEmployee/".$type;?>"><i class="iconfa-plus"></i>&nbsp;Add</a></th>
	    </tr>
	</thead>
    <tbody>
    	<?php 
	    	if(!empty($employees)){
	    		foreach($employees as $employee){
	    ?>
    	<tr class="gradeX">
        	<td class="aligncenter"><span class="center"><input type="checkbox" /></span></td>
        	<td style="text-align:center"><?php echo $employee["Employee"]["employee_code"]?></td>
			<td><?php if(!empty($employee["Employee"]["middle_name"])) echo $employee["Employee"]["first_name"]." ".$employee["Employee"]["middle_name"]." ".$employee["Employee"]["last_name"]; else echo $employee["Employee"]["first_name"]." ".$employee["Employee"]["last_name"]; ?></td>
			<td><?php echo $designations[$employee["Employee"]["designation_id"]]; if($employee["Employee"]["status"] == 2) echo " (AC)"; elseif($employee["Employee"]["status"] == 3) echo " (CC)"; ?></td>
			<td><?php echo $grades[$employee["Employee"]["grade"]];?></td>
            <td><?php echo $employee["PayScale"]["scale"]+$employee["Employee"]["total_increment"];?></td>
            <td style="text-align:center"><?php echo $employee["EmployeePersonal"]["account"]?></td>
            <td>
                <div class="right">
                    <a class="btn btn-primary" href="<?php echo $this->webroot."employeeManagements/editEmployee/".$type."/".$employee["Employee"]["id"];?>"><i class="wicon-pencil"></i>&nbsp;Edit</a>
                    <?php if($employee["Employee"]["status"] != 0){ ?>
                    	<a class="btn btn-primary" href="<?php echo $this->webroot."employeeManagements/statusChange/".$employee["Employee"]["id"]."/0";?>"><i class="wicon-remove"></i>&nbsp;Inactive</a>
                    <?php }else{ ?>
                    	<a class="btn btn-primary" href="<?php echo $this->webroot."employeeManagements/statusChange/".$employee["Employee"]["id"]."/1";?>"><i class="wicon-plus"></i>&nbsp;Active</a>
                    <?php } ?>
                </div>
            </td>
        </tr>
       	<?php } }else{ ?>
       	<tr><td colspan="8" style="text-align:center"><b><?php echo "No data found."; ?></b></td></tr>
       	<?php } ?>
	</tbody>
</table>
<div class="divider15"></div>
<script><?php if(!empty($employees)){?>$(document).ready(function(){$('#employees').dataTable({"sPaginationType": "full_numbers", "aaSorting": [[1,'asc']]});});<?php } ?></script>