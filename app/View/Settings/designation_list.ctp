<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	16th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 $settings = $this->Session->read("SETTING_INFO");
 $grades = Configure::read("grades");
 $status = Configure::read("status");
 $desType = Configure::read("desType");
 echo $this->Html->script(array("admin/jquery.dataTables"));
 ?>
<h4 class="widgettitle">Employee Designations</h4>
<table class="table table-bordered" id="designations">
    <thead>
        <tr>
          	<th class="head1">Designation</th>
          	<th class="head0">Grade</th>
          	<th class="head1">Status</th>
          	<th class="head1">Type</th>
            <th class="head0"><a class="btn btn-info btn-rounded" href="<?php echo $this->webroot."settings/addDesignation/";?>"><i class="iconfa-plus"></i>Add Designation</a></th>
        </tr>
    </thead>
    <tbody>
    	 <?php 
        	if(!empty($designations)){
        		foreach($designations as $designation){
        ?>
        <tr class="gradeA">
          	<td><?php echo $designation["Designation"]["title"];?></td>
            <td><?php echo $grades[$designation["Designation"]["grade"]];?></td>
            <td><?php echo $status[$designation["Designation"]["status"]];?></td>
            <td><?php echo $desType[$designation["Designation"]["type"]];?></td>
           	<td>
           		<a href="<?php echo $this->webroot."settings/editDesignation/".$designation["Designation"]["id"];?>" class="btn btn-primary" title="Edit user"><i class="iconsweets-create iconsweets-white"></i></a>
           		<?php if($designation["Designation"]["status"] != 0){?>
           		<a href="<?php echo $this->webroot."settings/statusChange/1/0/".$designation["Designation"]["id"];?>" class="btn btn-primary" title="Status Change"><i class="iconfa-remove iconfa-white"></i></a>
           		<?php }else{ ?>
           		<a href="<?php echo $this->webroot."settings/statusChange/1/1/".$designation["Designation"]["id"];?>" class="btn btn-primary" title="Status Change"><i class="iconfa-ok iconfa-white"></i></a>
           		<?php } ?>
           	</td>
        </tr>
        <?php } }else{ ?>
        	<td><?php echo "No data found";?></td>
        <?php } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
<?php if(!empty($designations)){?>
jQuery('#designations').dataTable({
	"sPaginationType": "full_numbers",
	"aaSortingFixed": [[0,'asc']],
	"fnDrawCallback": function(oSettings) {
		jQuery.uniform.update();
	}
});
<?php } ?>
</script>