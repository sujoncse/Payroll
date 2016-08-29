<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<body onload="calcTotal">
<p id = "basic">
	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Basic Salary</label>
    <span class="field">
    	<?php echo $this->Form->input('basic',array("id"=>"add_basic", 'error' => false,"type"=>"text","class"=>"input-xlarge","onfocus"=>"calcTotal()",'label'=>false,'div'=>false, "tabindex"=>"3","value"=>$basic));?>
    	<?php if(!empty($errors["basic"])){?>
		<span class="par control-group error"><span class="help-inline"><?php echo $errors["basic"][0];?></span></span>
		<?php } ?>
    </span>
</p>
<p id="grade" style="display:none"><label>Grade</label>
	<span class="field">
		<?php echo $this->Form->input('Employee.grade',array("id"=>"gradeId", 'error' => false,"type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$grade));?>
	</span>
</p>
<p id="children" style="display:none"><label>Children</label>
	<span class="field">
		<?php echo $this->Form->input('EmployeePersonal.children',array("id"=>"childrenId", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$children));?>
	</span>
</p>
<p id="houseRent" style="display:none"><label>House Rent</label>
	<span class="field">
		<?php echo $this->Form->input('EmployeePersonal.house_rent',array("id"=>"hr", "type"=>"text","data-placeholder"=>"Employee grade","class"=>"chzn-select","style"=>"width:300px",'label'=>false,'div'=>false,"value"=>$house_rent));?>
	</span>
</p>
<script>
	var $val=$("input[id^=add_basic]").keyup(calcTotal);
</script>
</body>