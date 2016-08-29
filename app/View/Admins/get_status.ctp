<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<p><label>Grade</label>
	<span class="field">
		<?php echo $this->Form->input('Employee.grade',array("id"=>"gradeId", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$empStatus["Employee"]["grade"]));?>
	</span>
</p>
<p><label>Status</label>
	<span class="field">
		<?php echo $this->Form->input('Employee.status',array("id"=>"status", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$empStatus["Employee"]["status"]));?>
	</span>
</p>
<p id="service_status"><label>Service Status</label>
	<span class="field">
		<?php echo $this->Form->input('Employee.service_status',array("id"=>"serviceStatus", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$empStatus["Employee"]["service_status"]));?>
	</span>
</p>
<p><label>Children</label>
	<span class="field">
		<?php echo $this->Form->input('EmployeePersonal.children',array("id"=>"children", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$empStatus["EmployeePersonal"]["children"]));?>
	</span>
</p>
<p><label>House Rent</label>
	<span class="field">
		<?php echo $this->Form->input('EmployeePersonal.house_rent',array("id"=>"houseRent", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$empStatus["EmployeePersonal"]["house_rent"]));?>
	</span>
</p>