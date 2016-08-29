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
 echo $this->Html->script(array("admin/jquery.dataTables"));
 ?>
<h4 class="widgettitle"><?php echo $settings["pay_scale"]; ?></h4>
<table class="table table-bordered" id="payScale">
    <thead>
        <tr>
			<th>Sl.</th>
          	<th scope="col">Grade</th>
            <th scope="col">Scale</th>
            <!--<th scope="col">Increment</th>
            <th scope="col">Increment Iteration</th>
            <th scope="col">Efficiency Bar</th>
            <th scope="col">EB Iteration</th>-->
            <th class="head0"><a class="btn btn-info btn-rounded" href="<?php echo $this->webroot."settings/addScale/";?>"><i class="iconfa-plus"></i>Add Scale</a></th>
        </tr>
    </thead>
    <tbody>
    	 <?php $j=1;
        	if(!empty($payScales)){
        		foreach($payScales as $payScale){
        ?>
        <tr class="gradeA">
			<td><?php echo $j;?></td>
          	<td><?php echo $grades[$payScale["PayScale"]["grade"]];?></td>
            <td><?php echo $payScale["PayScale"]["scale"];?></td>
            <!--<td><?php echo $payScale["PayScale"]["increment"]; ?></td>
            <td><?php echo $payScale["PayScale"]["increment_iteration"]; ?></td>
            <td><?php echo $payScale["PayScale"]["eb"]?></td>
            <td><?php echo $payScale["PayScale"]["eb_iteration"]?></td>-->
           	<td><a href="<?php echo $this->webroot."settings/editScale/".$payScale["PayScale"]["id"];?>" class="btn btn-primary" title="Edit Scale"><i class="iconsweets-create iconsweets-white"></i>Edit Scale</a></td>
        </tr>
        <?php $j++; } }else{ ?>
        	<td><?php echo "No data found";?></td>
        <?php } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
jQuery('#payScale').dataTable({
	"sPaginationType": "full_numbers",
	
});
</script>