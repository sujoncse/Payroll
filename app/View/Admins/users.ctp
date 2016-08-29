<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	1st Nov 2013
 * @Last Update		:	15th Nov 2013
 * @Copyright     	:  	Mahmud IT Limited
 * @Link          	:  	http://www.mahmudit.com
 * */
 $settingInfo = $this->Session->read("SETTING_INFO");
 $grades = Configure::read("grades");
 echo $this->Html->script(array("admin/jquery.dataTables"));
 $msg = $this->Session->read("Message");
 if(!empty($msg)){
 ?>
<div class="alert <?php echo $msg["flash"]["params"]["class"];?>">
  <button data-dismiss="alert" class="close" type="button">×</button>
  <strong><?php echo $msg["flash"]["message"]["0"];?></strong> <?php echo $msg["flash"]["message"]["1"];?>
</div>
<?php } ?>
<h4 class="widgettitle">User Management</h4>
<table class="table table-bordered" id="projects">
    <thead>
        <tr>
          	<th class="head0">Name</th>
          	<th class="head0">User Name</th>
			<th class="head1">Email</th>
            <th class="head0">Status</th>
            <th class="head1"><a class="btn btn-primary" href="<?php echo $this->webroot."admins/createUser/1";?>"><i class="iconfa-plus"></i>&nbsp; Create Officer</a><a class="btn btn-primary" href="<?php echo $this->webroot."admins/createUser/2";?>"><i class="iconfa-plus"></i>&nbsp; Create Staff</a></th>
        </tr>
    </thead>
    <tbody>
    	<?php 
        	if(!empty($users)){
        		foreach($users as $user){
        ?>
        <tr class="gradeA">
          	<td><?php if(!empty($user["User"]["middle_name"])) echo $user["User"]["first_name"]." ".$user["User"]["middle_name"]." ".$user["User"]["last_name"]; else echo $user["User"]["first_name"]." ".$user["User"]["last_name"]; ?></td>
          	<td><?php echo $user["User"]["username"];?></td>
            <td><?php echo $user["User"]["email"]; ?></td>
            <td><?php echo $user["User"]["status"]; ?></td>
            <td><a class="btn btn-primary" href="<?php echo $this->webroot."admins/createProfile";?>"><i class="icon-pencil"></i>Update</a></td>
        </tr>
        <?php } } ?>
    </tbody>
</table>
<div class="divider15"></div>
<script>
jQuery('#projects').dataTable({
	"sPaginationType": "full_numbers",
	"aaSortingFixed": [[1,'desc']],
	"fnDrawCallback": function(oSettings) {
		jQuery.uniform.update();
	}
});
</script>