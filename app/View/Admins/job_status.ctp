<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<p id="status"><label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Job Status</label>
	<span class="field">
		<?php echo $this->Form->input('job_status',array("id"=>"jobStatus","type"=>"select",'error' => false,"onchange"=>"jobCodeChange()","data-placeholder"=>"Choose an employee...","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"2","options"=>$jobStatus,"empty"=>"Select One"));?>
		<?php if(!empty($errors["emp_id"])){?>
		<span class="par control-group error"><span class="help-inline"><?php echo $errors["emp_id"][0];?></span></span>
		<?php } ?>
	</span>
</p>