<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<p id="nextDes"><label><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/>New Designation</label>
	<span class="field">
		<?php echo $this->Form->input('new_designation_id',array("id"=>"desId","type"=>"select",'error' => false,"data-placeholder"=>"Choose a designation","class"=>"chzn-select","style"=>"width:280px",'label'=>false,'div'=>false,"tabindex"=>"9","options"=>$designations));?>
		<?php if(!empty($errors["new_designation_id"])){?>
		<span class="par control-group error"><span class="help-inline"><?php echo $errors["new_designation_id"][0];?></span></span>
		<?php } ?>
	</span>
</p>