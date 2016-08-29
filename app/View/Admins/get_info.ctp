<?php
/**
 * @Developed By  :  Mahmud IT Limited
 * @Copyright     :  Copyright 2012-2013, Mahmud IT Limited. (http://mahmudit.com)
 * @Link          :  http://mahmudit.com
 * @Since         :  July 2012
 */
?>
<p id = "increment" style="display:none">
	<label><span class="rad_star"><img src="<?php echo $this->webroot."img/admin/star.png"; ?>"/></span>Increment</label>
    <span class="field">
    	<?php echo $this->Form->input('increment_number',array("id"=>"incrementNum",'error' => false,"type"=>"text","class"=>"input-xlarge",'label'=>false,'div'=>false, "tabindex"=>"3","disabled"=>"true","value"=>$incrementNum));?>
    </span>
</p>